<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:../index.php?error=x");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="bg-info w-100 p-4">
            <h3 class="font-italic"><i class="fas fa-users"></i> 
            <?php
                    if(isset($_SESSION['sexoUsuario'])){
                        $sexo=$_SESSION['sexoUsuario'];
                        if($sexo=="Hombre"){
                            if(isset($_SESSION['cargoUsuario'])){
                                $cargo=$_SESSION['cargoUsuario'];
                                if($cargo=="Administrador"){
                                    echo "Administrador ";
                                }else{
                                    if($cargo=="Secretaria"){
                                        echo "Secretario ";                                       
                                    }else{
                                        echo "Usuario ";
                                    }
                                }
                            }
                        }else{
                            if(isset($_SESSION['cargoUsuario'])){
                                $cargo=$_SESSION['cargoUsuario'];
                                if($cargo=="Administrador"){
                                    echo "Administradora ";
                                }else{
                                    if($cargo=="Secretaria"){
                                        echo "Secretaria ";
                                    }
                                    else{
                                        echo "Usuaria ";
                                    }
                                }
                            }
                        }
                    }
                    echo $_SESSION['sesion']; 
                    ?>
            </h3>
            <a href="CRUD_publicaciones.php" class="float-right text-dark">Convocatorias</a>
            <br>
            <a href="../formularios/form_cerrarSession.php" class="float-right text-dark">cerrar session</a>
    </header>

    <div id="idConvicatoria" class="mx-auto w-75 p-4 my-5 border border-primary bg-secondary">
    <h1 class="text-center">Publicar Convocatoria</h1>
    <form action="../formularios/form_subirPublicacion.php" method="post" enctype="multipart/form-data">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" required autocomplete="off" pattern="[a-zA-Z0-9 ]{2,}" title="Solo puede ingresar numeros y letras">
        <br>
        <br>
        <textarea id="descripcion" rows="9" name="descripcion"  style="resize:none; width:100%;"> </textarea>
        <br>
        <br>
        <input type="file" name="archivo" id="archivo" required accept='.pdf'>

        <br>
        <br>
        <select id="lista1" name="lista1" class="mr-2">
                <option value="Departamentos en general">General</option>
				<option value="Convocatoria de Docencia">Convocatoria de Docencia</option>
				<option value="Convocatoria de Auxiliar">Convocatoria de Auxiliar</option>

		</select>

        <select id="lista2" name="lista2" class="mr-2">
                <option value="Departamentos en general">General</option>
                <option value="Departamento De Biologia">Departamento De Biologia</option>
                <option value="Departamento de Ingeniería Eléctrica y Electrónica">Departamento de Ingeniería Eléctrica y Electrónica</option>
                <option value="Departamento de Química">Departamento de Química</option>
                <option value="Convocatoria de fisica">Departamento De Fisica</option>
				<option value="Departamento de Sistemas/Informatica">Departamento de Sistemas/Informatica</option>
                <option value="Departamento de Industrias">Departamento de Industrias</option>
                <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Departamento de Ingeniería mecánica – electromecánica (DIME)</option>
                <option value="Departamento de Matemáticas">Departamento de Matemáticas</option>
                <option value="Departamento de Ingeniería Civil">Departamento de Ingeniería Civil</option>
		</select>

        <select id="lista3" name="lista3" class="mr-2">
            <?php
                date_default_timezone_set('America/La_Paz');
                $mes=date('m');
                $year=date('Y');
                if($mes<6){
                    $aux1="Gestion I-".$year;
                    $aux2="Gestion II-".$year;
                    echo "<option value='gestion general'>General</option>
				          <option value='$aux1'>$aux1</option>
				          <option value='$aux1'>$aux12</option>";
                }else{
                    $year_actual = date("Y");
                    $yearProx=date("Y",strtotime($fecha_actual."+ 1 year"));
                    $aux1="Gestion II-".$year;
                    $aux2="Gestion I-".$yearProx;
                    echo "<option value='gestion general'>General</option>
				          <option value='$aux1'>$aux1</option>
				          <option value='$aux2'>$aux2</option>";
                }
            ?>
		</select>
        <br>
        <br>
        <label for="fechaDeExpiracion"> Fecha de Expiracion</label>
                <?php
                     date_default_timezone_set('America/La_Paz');
                     $fechaHoy=date('Y-m-d');
                     $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                ?>
        <input type="date" name="fechaDeExpiracion" id="fechaDeExpiracion" min="<?php echo $fechaMinima;?>">
        <label for="horaDeExpiracion"> Hora de Expiracion</label>
        <input type="time" name="horaDeExpiracion" id="horaDeExpiracion">
        <br>
        <br>
        <div class="d-block w-25 mx-auto">
            <input class="btn btn-primary" type="submit" value="Publicar">
            <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
        </div>
    </form>

    </div>

    <footer class="pieIndice">
        <div class="text-center">
            <h6 class="d-inline-block">Contacto: <a  href="mailto:elcorreoquequieres@correo.com">correo_del_Administardor@mail.com ,</a> <a  href="mailto:elcorreoquequieres@correo.com">  correo_de_la_Empresa@mail.com</a></h6>
            <h6 class="d-inline-block">Telefono: (+591) 72584871 Administrador, (+591) 77581871 Secretaria</h6 >
        </div>
        <div class="text-center">
            <h6>Sitios Relacionados :
                <a href="http://www.umss.edu.bo/" target="_blank">UMSS</a>
                <a href="http://websis.umss.edu.bo/" target="_blank"> | WEBSISS</a>
                <a href="https://www.facebook.com/UmssBolOficial" target="_blank"> | facebook</a>
                <a href="https://twitter.com/UmssBolOficial" target="_blank"> | Twitter</a>
                <a href="https://www.instagram.com/umssboloficial/" target="_blank"> | Instagram</a>
                <a href="https://www.linkedin.com/school/universidad-mayor-de-san-simon/" target="_blank"> | Linkedin</a>
                <a href="https://www.youtube.com/universidadmayordesansimon" target="_blank"> | Youtube</a>
            </h6>
        </div>
        <div class="text-center">
            <h6>Derechos Reservados © 2020 · Universidad Mayor de San Simón.</h6>
        </div>
    </footer>
</body>
</html>
