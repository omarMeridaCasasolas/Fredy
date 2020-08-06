<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Error al autentificar";
        header("Location:../index.php?error=x");
    }
    $fechaExpiracion=$_POST['fechaDeExpiracion'];
    echo $fechaExpiracion."<br>";
                $horaExpiracion=$_POST['horaDeExpiracion'];
                echo $horaExpiracion."<br>";
                $FechaHoraExpiracion= $fechaExpiracion." ".$horaExpiracion;
                echo $FechaHoraExpiracion."<br>";
                date_default_timezone_set('America/La_Paz');
                $fechaActual=date("Y-m-d H:i:s");
                if(empty($fechaExpiracion) || empty($horaExpiracion)){
                    $FechaHoraExpiracion=date("Y-m-d H:i:s",strtotime($fechaActual."+ 1 year"));
                }
                echo "=============================";
                echo $FechaHoraExpiracion."<br>";
    // Agregar a Amazon Aws3
    include_once('../vendor/autoload.php');
    // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
    $s3 = new Aws\S3\S3Client([
        'version'  => '2006-03-01',
        'region'   => 'us-east-2',
    ]);
    
    //$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
            // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
            try {
                // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
                //$upload = $s3->upload($bucket, $_FILES['archivo']['name'], fopen($_FILES['archivo']['tmp_name'], 'rb'), 'public-read');
                //Mi Codigo

                //$enlace= htmlspecialchars($upload->get('ObjectURL'));
                $nombreDeConvocatoria=$_POST['titulo'];
                $descripcionConvocatoria=$_POST['descripcion'];
                $fechaExpiracion=$_POST['fechaDeExpiracion'];
                $horaExpiracion=$_POST['horaDeExpiracion'];
                $FechaHoraExpiracion= $fechaExpiracion." ".$horaExpiracion;
		        $tipoConvocatoria=$_POST['lista1'];
                $departamento=$_POST['lista2'];
                $gestion=$_POST['lista3'];

                $autor=$_SESSION['sesion'];

                date_default_timezone_set('America/La_Paz');
                $fechaActual=date("Y-m-d H:i:s");
                if(empty($fechaExpiracion) || empty($horaExpiracion)){
                    $FechaHoraExpiracion=date("Y-m-d H:i:s",strtotime($fechaActual."+ 1 year"));
                }
                $codigoFecha=date("Ymdhis");

                $direccionBaseDeDatos=$enlace;
                include_once("../modelo/convocatoria.php");
                $convocatoria = new Convocatoria();
                $res=$convocatoria->agregarConvocatoria($nombreDeConvocatoria,$fechaActual,$direccionBaseDeDatos,$descripcionConvocatoria,$FechaHoraExpiracion,$tipoConvocatoria,$departamento,$gestion,$autor);
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
        }



function eliminar_acentos($cadena){

		//Reemplazamos la A y a
		$cadena = str_replace(
		array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
		array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
		$cadena
		);

		//Reemplazamos la E y e
		$cadena = str_replace(
		array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
		array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
		$cadena );

		//Reemplazamos la I y i
		$cadena = str_replace(
		array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
		array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
		$cadena );

		//Reemplazamos la O y o
		$cadena = str_replace(
		array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
		array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
		$cadena );

		//Reemplazamos la U y u
		$cadena = str_replace(
		array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
		array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
		$cadena );

		//Reemplazamos la N, n, C y c
		$cadena = str_replace(
		array('Ñ', 'ñ', 'Ç', 'ç'),
		array('N', 'n', 'C', 'c'),
		$cadena
		);

		return $cadena;
	}
    
?>
