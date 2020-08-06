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
        $id=$_GET['id'];
        $resultado=$convocatoria->mostrarConvocatoriaCompleta($id);
        }else{
        echo "Error";
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

        <body class="cuerpo">
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
            <h1>Editar Convocatoria</h1>
            <form action="../formularios/form_actualizarConvocatoria.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <input type="text" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off" pattern="[a-zA-Z0-9 ]{2,100}" title="Solo puede ingresar numeros y letras" required value='<?php echo $resultado[0]['titulo'] ?>'>
                <br>
                <br>
                <textarea id="descripcion" rows="10" cols="190" name="descripcion" style="resize:none; width:100%;"><?php echo $resultado[0]['descripcion_convocatoria']; ?></textarea>
                <br>
                <br>
                <a href="<?php echo $resultado[0]['direcccion_pdf'];?>">Archivo anterior</a><span><----</span><input type="file" required name="archivo" id="archivo"  accept='.pdf'  >
                <br>
                <br>
                <select id="lista1" name="lista1" class="mr-2">
                    <?php
                    $tipoD=$resultado[0]['tipo_convocatoria'];
                    switch ($tipoD) {
                        case "Departamentos en general":
                            echo "<option value='Departamentos en general' selected>General</option>";
                            echo "<option value='Convocatoria de Docencia'>Convocatoria de Docencia</option>";
                            echo "<option value='Convocatoria de Auxiliar'>Convocatoria de Auxiliar</option>";
                            break;
                        case "Convocatoria de Docencia":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Convocatoria de Docencia' selected>Convocatoria de Docencia</option>";
                            echo "<option value='Convocatoria de Auxiliar'>Convocatoria de Auxiliar</option>";
                            break;
                        case "Convocatoria de Auxiliar":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Convocatoria de Docencia'>Convocatoria de Docencia</option>";
                            echo "<option value='Convocatoria de Auxiliar' selected>Convocatoria de Auxiliar</option>";
                            break;
                    }
                    ?>
                </select>

                <select id="lista2" name="lista2" class="mr-2">
                    <?php
                    $departamento=$resultado[0]['departamento'];
                    switch ($departamento) {
                        case "Departamentos en general":
                            echo "<option value='Departamentos en general' selected>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento De Biologia":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia' selected>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Ingeniería Eléctrica y Electrónica":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica' selected>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Química":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química' selected>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Convocatoria de fisica":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica' selected>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Sistemas/Informatica":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica' selected>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Industrias":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias' selected>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Ingeniería mecánica – electromecánica (DIME)":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)' selected >Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Matemáticas":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas' selected>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil'>Departamento de Ingeniería Civil</option>";
                            break;
                        case "Departamento de Ingeniería Civil":
                            echo "<option value='Departamentos en general'>General</option>";
                            echo "<option value='Departamento De Biologia'>Departamento De Biologia</option>";
                            echo "<option value='Departamento de Ingeniería Eléctrica y Electrónica'>Departamento de Ingeniería Eléctrica y Electrónica</option>";
                            echo "<option value='Departamento de Química'>Departamento de Química</option>";
                            echo "<option value='Convocatoria de fisica'>Departamento De Fisica</option>";
                            echo "<option value='Departamento de Sistemas/Informatica'>Departamento de Sistemas/Informatica</option>";
                            echo "<option value='Departamento de Industrias'>Departamento de Industrias</option>";
                            echo "<option value='Departamento de Ingeniería mecánica – electromecánica (DIME)'>Departamento de Ingeniería mecánica – electromecánica (DIME)</option>";
                            echo "<option value='Departamento de Matemáticas'>Departamento de Matemáticas</option>";
                            echo "<option value='Departamento de Ingeniería Civil' selected>Departamento de Ingeniería Civil</option>";
                         break;
                    }
                    ?>
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
                $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"));
                $auxiliar=explode(" ",$resultado[0]['fecha']);
		$tmpHora=explode(':',$auxiliar[1]);
                $hora=$tmpHora[0].':'.$tmpHora[1];
            ?>

            <input type="date" name="fechaDeExpiracion" id="fechaDeExpiracion" min="<?php echo $fechaMinima;?>" value="<?php echo $auxiliar[0];?>">

        <label for="horaDeExpiracion"> Hora de Expiracion</label>
        <input type="time" name="horaDeExpiracion" id="horaDeExpiracion" value=<?php echo $hora; ?>>
        <br>
        <br>
               <div class="mx-auto">
                 <button class="btn btn-primary" name="update">Actualizar</button>
                <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
               </div>
            </form>
            </div>
    <?php
        $convocatoria->cerrarConexion();
    ?>
    <!--<footer class="pieIndice">
        <div class="text-center">
            <h6 class="d-inline-block">Contacto: <a href="">correo_del_Administardor@mail.com ,</a> <a href="">  correo_de_la_Empresa@mail.com</a></h6>
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
