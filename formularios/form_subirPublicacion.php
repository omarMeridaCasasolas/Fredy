<?php
    // Agregar a Amazon Aws
    session_start();
    include_once('../vendor/autoload.php');
    // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'us-east-2',
    ]);
    

    $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');//////////////

        
            // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
            try {
                // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
                $upload = $s3->upload($bucket, $_SESSION['NombreArchivo'], fopen($_SESSION['NombreArchivo'], 'rb'), 'public-read');
                //$upload = $s3->upload($bucket, $_FILES['archivo']['name'], fopen($_FILES['archivo']['tmp_name'], 'rb'), 'public-read');///////////////
                
                $enlace= htmlspecialchars($upload->get('ObjectURL'));
                $direccionBaseDeDatos=$enlace;

                include_once("../modelo/convocatoria.php");
                $convocatoria = new Convocatoria();
                $res=$convocatoria->guardarDireccionPDF($idConvMaxFinal,$direccionBaseDeDatos);
                if($res){
                    echo "se subio correctamente el archivo";
                    $tituloConvocatoria="Convocatoria creada satisfactoriamente!!";
                    $color="success";
                }else{
                    echo "Error al subir los archivos";
                    $tituloConvocatoria="Problemmas al crear convocatoria!!";
                    $color="danger";
                }
                header("Location:../paginas/CRUD_publicaciones.php?tit=".$tituloConvocatoria."&color=".$color);
            }catch(Exception $e) {
                echo $e;
                $tituloConvocatoria="Problemmas al crear convocatoria!!";
                $color="danger";
                header("Location:../paginas/CRUD_publicaciones.php?tit=".$tituloConvocatoria."&color=".$color);
            }

?>
