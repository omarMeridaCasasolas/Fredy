<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:../index.php?error=x");
    }
    require_once("../modelo/convocatoria.php");
    $convocatoria= new Convocatoria;
    if(isset($_GET['id'])){
        require('../vendor/autoload.php');
        // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
        $s3 = new Aws\S3\S3Client([
            'version'  => '2006-03-01',
            'region'   => 'us-east-2',
        ]);
        $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
            try {
                $upload = $s3->upload($bucket, $_FILES['archivo']['name'], fopen($_FILES['archivo']['tmp_name'], 'rb'), 'public-read');   
                $enlace= htmlspecialchars($upload->get('ObjectURL'));
                $id=$_GET['id'];
                $fechaExpiracion=$_POST['fechaDeExpiracion'];
                $horaExpiracion=$_POST['horaDeExpiracion'];
                $fechaHoraExpiracion= $_POST['fechaDeExpiracion']." ".$_POST['horaDeExpiracion'];
                if(empty($fechaExpiracion) || empty($horaExpiracion)){
                    $fechaHoraExpiracion=date("Y-m-d H:i:s",strtotime($fechaActual."+ 1 year"));
                }else{
                    $fechaHoraExpiracion= $_POST['fechaDeExpiracion']." ".$_POST['horaDeExpiracion'];
                }
                date_default_timezone_set('America/La_Paz');
                $fechaActual=date("Y-m-d H:i:s");
                $res=$convocatoria->actualizarConvocatoria($id,$_POST['titulo'],$_POST['descripcion'],$enlace,$fechaActual,$_POST['lista1'],$_POST['lista2'],$_POST['lista3'],$fechaHoraExpiracion);
                if($var1 || $var2 || $var3 ||$var4){
                    echo "se subio correctamente el archivo";
                            $tituloConvocatoria="Los datos del usuario se actualizaron correctamente!!";
                         $color="success";
                }else{
                        $tituloConvocatoria="No se modifico ninguna dato";
                        $color="danger";
                }

                $convocatoria->cerrarConexion();

                header("Location:../paginas/CRUD_publicaciones.php?tit=".$tituloConvocatoria."&color=".$color);
            }catch(Exception $e) {
                $tituloConvocatoria="Problemmas al crear convocatoria!!";
                $color="danger";
                header("Location:../paginas/CRUD_publicaciones.php?tit=".$tituloConvocatoria."&color=".$color);
            }
        }
    }else{
        $convocatoria->cerrarConexion();
        echo "Error al procesar la actualizacion";
    }
?>
