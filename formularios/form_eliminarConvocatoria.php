<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:index.php?error=x");
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        require_once('../modelo/convocatoria.php');
        $convocatoria= new Convocatoria;
        $res= $convocatoria->eliminarConvocatoria($id);
        if ($res) {
            echo "Se elimino correctamente<br>";
        }else{
            echo "error al eliminar archivo";
            header("Location:../paginas/CRUD_publicaciones.php");
        }
        $convocatoria->cerrarConexion();
        header("Location:../paginas/CRUD_publicaciones.php");
    }else{
        echo "Error";
        header("Location:../paginas/CRUD_publicaciones.php");
    }


?>
