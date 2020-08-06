<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Error al autentificar";
        header("Location:../index.php?error=x");
    }
    require_once("../modelo/administrativo.php");
    $administrativo= new Administrativo();
    $nuevoCorreo=$_POST['nuevoCorreo'];
    $nuevoTelefono=$_POST['numeroTelefonico'];
    $nuevoPass=$_POST['nuevoPassword'];
    $CpyNuevoPass=$_POST['copiaNuevoPassword'];
    $bandera=true;

    $var1=false;
    $var2=false;
    $var3=false;
    $var4=false;;
    if($nuevoPass!=$CpyNuevoPass){
        $bandera=false;
        header("Location:../paginas/cambiarEmailPassword.php?problem=x");        
    }else{
        if($nuevoPass!=$_SESSION['passoword']){
            $var1=$administrativo->actualizarPasswordAdministrativo($nuevoPass,$_SESSION['correo']);
            $hash = password_hash($nuevoPass, PASSWORD_DEFAULT, ['cost' => 10]);
            echo $hash;
            $var2=$administrativo->actualizarPasswordCodificadoAdministrativo($hash,$_SESSION['correo']);
        }
    }
    if($nuevoTelefono!=$_SESSION['telefono']){
        $var3=$administrativo->actualizarTelefonoAdministrativo($nuevoTelefono,$_SESSION['correo']);
    }
    if($nuevoCorreo!=$_SESSION['correo']){
        $var4=$administrativo->actualizarCorreoAdministrativo($nuevoCorreo,$_SESSION['correo']);
    }

    $administrativo->cerrarConexion();

    if($var1 || $var2 || $var3 ||$var4){
        echo "se subio correctamente el archivo";
        $tituloConvocatoria="Convocatoria creada satisfactoriamente!!";
        $color="success";
    }else{
        echo "Error al subir los archivos";
        $tituloConvocatoria="No se modifico ninguna";
        $color="danger";
    }

    if($bandera){
        //header("Location:../paginas/CRUD_publicaciones.php");
        header("Location:../paginas/CRUD_publicaciones.php?tit=".$tituloConvocatoria."&color=".$color);
    }
        
    
?>