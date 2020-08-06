<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="../img/imagenes/icon.gif" type="image/gif">
      <script src="../librerias/js/popper-1.14.7.min.js"></script>    
      <link rel="stylesheet" href="../librerias/css/bootstrap.min.css">    
      <link rel="stylesheet" href="../librerias/css/styles.css">
      <link rel="stylesheet" href="../librerias/css/slick.css">
      <link rel="stylesheet" href="../librerias/css/slick-theme.css">
      <link rel="stylesheet" href="../librerias/css/cabeceraCss.css">
      <link rel="alternate" type="application/rss+xml" title="Avisos de Inform&aacute;tica - Sistemas (UMSS)" href="../rss/index.rss">
      <script src="../librerias/js/jquery-3.3.1.min.js"></script>
      <script src="../librerias/js/bootstrap.min.js"></script>
      <script src="../librerias/archivos/script.js"></script>
      <script src="../librerias/js/slider.js"></script>
      <script src="../librerias/js/slick.js"></script>
      <script src="../librerias/archivos/jquery.snow.js"></script>
      <title>SISTEMA ADMINISTRACION DE CONVOCATORIAS DE AUXILIARES</title>
      <link rel="stylesheet" href="../style/bootstrap.css">
      <link rel="stylesheet" href="../style/myStyle.css">
      <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            if(isset($_GET['dato'])){
                $valor=$_GET['dato'];
                echo "<script>";
                if($valor=='x'){
                echo    "alert('Se ha enviado su contraseña a su correo');";
                }else{
                    if($valor=='y'){
                        echo  "alert('Usuario no encontrado');";
                    }else{
                        echo  "alert('Error al  evaluar la sentencia');";
                    }
                }
                echo "</script>";
            }
        ?>
        <?php /* include("../plantillas/header.php");*/?>

        <nav class="navbar navbar-expand-lg navbar-custom padding-navbar">
                    <div class="container">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navegacion,#navegacion2" aria-controls="navegacion" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>     
                        </button>
                        <div class="collapse navbar-collapse" id="navegacion">
                            <ul id="sub-header2" class="navbar-nav mr-auto">
                            <li id="menu2" class="nav-item">
                                <a class="nav-link" href="../index.php">
                                INICIO
                                </a>
                            </li>
                            
                            </ul>           
                            <span class="navbar-text">
                                <script> fecha(); </script>
                            </span>
                            
                        </div>
                    </div>
        </nav>

        <div>
            <div class="d-sm-none d-md-block d-none d-lg-block cabeceraCss">
                            <div class="cabeceraCssAzul"></div>
                            <div class="cabeceraCssAzulClaro"></div>
                            <div class="cabeceraCssBlanca"></div>
                            <div class="textoCabecera h3">SISTEMA DE ADMINISTRACION DE CONVOCATORIAS DE AUXILIARES</div>
                            <img class="logoUmssCss" src="../img/imagenes/LogoUMSS.png" alt="UMSS"> 
                            
            </div> 
        </div>

        <div>
    
            <div id="navbar-color" class="container-fluid">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <nav class="navbar navbar-expand-lg navbar-light navbar-guest padding-navbar">
                            <div class="collapse navbar-collapse" id="navegacion2"> 
                            <ul id="sub-header" class="nav navbar-nav nav-justified w-100">
                                
                                <li id="menus" class="nav-item">
                                    <a class="nav-link" href="../paginas/login.php">
                                    Sesi&oacute;n Administrativo
                                    </a>
                                </li> 

                                <li id="menus" class="nav-item">
                                    <a class="nav-link" href="../paginas/postulante.php">
                                    Sesi&oacute;n Postulante 
                                    </a>
                                </li>

                                <li id="menus" class="nav-item">
                                    <a class="nav-link" href="../paginas/comisionEvaluadora.php">
                                    Sesion Comision Evaluadora 
                                    </a>
                                </li>
                                
                                <li id="menus" class="nav-item">
                                    <a class="nav-link" href="../paginas/buscarConvocatorias.php">
                                    Buscar Convocatoria 
                                    </a>
                                </li>

                            </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <form action="#" method="post" class="container w-50 p-3 my-5 border border-dark alert alert-primary text-dark md w-75 sm w-100" role="alert">
            <h1 class="text-center">Buscar convotatoria</h1>
            <!--<label for="label">Nombre de la convocatoria: </label>
            <input type="text" name="titulo" id="titulo" style="resize:none; width:100%;" placeholder="Titulo" required autocomplete="off">
            <br>-->
            <br>
            <div class="form-group mx-5">
                <label for="nuevoCorreo">Seleccione el tipo de convocatoria: </label>
                <select id="tipoConv" name="tipoConv" class="mr-2">
                    <option value="">Tipo de convocatoria</option>
                    <option value="Convocatoria de Docencia">Convocatoria de Docencia</option>
                    <option value="Convocatoria de Auxiliar">Convocatoria de Auxiliar</option>
                </select>
            </div>
            <div class="form-group mx-5">
                <label for="numeroTelefonico">Departamento de la convocatoria: </label>
                <select id="departamentoConv" name="departamentoConv" class="mr-2">
                    <option value="">General</option>
                    <option value="Departamento De Biologia">Departamento De Biologia</option>
                    <option value="Departamento de Ingeniería Eléctrica y Electrónica">Departamento de Ingeniería Eléctrica y Electrónica</option>
                    <option value="Departamento de Química">Departamento de Química</option>
                    <option value="Convocatoria de fisica">Departamento De Fisica</option>
                    <option value="Departamento de Sistemas/Informatica">Departamento de Sistemas/Informatica</option>
                    <option value="Departamento de Industrias">Departamento de Industrias</option>
                    <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Departamento de Ingeniería mecánica–electromecánica</option>
                    <option value="Departamento de Matemáticas">Departamento de Matemáticas</option>
                    <option value="Departamento de Ingeniería Civil">Departamento de Ingeniería Civil</option>
                </select>
            </div>

            <div class="from-group mx-5">
                <label for="nuevoPassword">Gestion: </label>
                <select id="semestreConv" name="semestreConv" class="mr-2">
                    <option value="">Semestre</option>
                        <option value='I-Regular'>I-Regular</option>
                        <option value='II-Regular'>II-Regular</option>
                        <option value='III-Invierno'>III-Invierno</option>
                        <option value='IV-Verano'>IV-Verano</option>   
    
                </select>
                <select id="gestionConv" name="gestionConv" class="mr-2">
                    <option value="">Gestion</option>
                    <?php
                        date_default_timezone_set('America/La_Paz');
                        $year=date('Y');
                        //echo "<option value='gestion'>Gestion</option>";
                        for($i=-10; $i<10 ; $i++){
                            $yearAux=$year + $i;
                            echo "<option value='$yearAux'>$yearAux</option>";
                        }
    
                    ?>
                </select>
            </div>
            <!--<div class="form-group mx-5">
                <label for="copiaNuevoPassword">Reescriba su nueva contraseña: </label>
                <input class="form-control" type="password" name="copiaNuevoPassword" id="copiaNuevoPassword" 
                title="La contraseña debe contar con 4 caracteres como minimo, al menos un numero, una minuscula y una mayuscula"
                placeholder="" autocomplete='off' pattern="[A-Za-z0-9!?-]{4,30}" required/>
            </div>-->
            <div class="row justify-content-center">    
                <!--<input class="btn btn-primary mr-2" type="submit" value="ActualizarDatos" >-->
                <!--<a class="btn btn-primary ml-2" href=""> Buscar</a>-->
                <input type="submit" name="buscar" value="Buscar" class="btn btn-info"/>
            </div>
        </form>
        <section>
                <div class="d-block w-75 mx-auto">
                <h2 class="text-center" >Resultados</h2>
                <?php
                    if(isset($_POST['buscar'])){
                        $res= "No se encontro ninguna convocatoria";
                        //$nombre=($_POST['titulo']);
                        $tipo=($_POST['tipoConv']);
                        $departamento=($_POST['departamentoConv']);
                        $gestion0=($_POST['semestreConv']);
                        $gestion1=($_POST['gestionConv']);
                        $gestion=$gestion0.' '.$gestion1;

                        if($tipo != null &&  $departamento != null && $gestion != " "){
                            $sql = "SELECT * FROM convocatoria WHERE gestion_convocatoria = '".$gestion."' AND departamento = '".$departamento."' AND tipo_convocatoria = '".$tipo."'";
                        }else{
                            if($tipo != null ){
                                $sql = "SELECT * FROM convocatoria WHERE tipo_convocatoria = '".$tipo."'";
                            }
                            if($departamento != null ){
                                $sql = "SELECT * FROM convocatoria WHERE departamento = '".$departamento."'";
                            }
                            if($gestion != " "){
                                $sql = "SELECT * FROM convocatoria WHERE gestion_convocatoria = '".$gestion."'";
                            }
                            if($tipo != null &&  $departamento != null){
                                $sql = "SELECT * FROM convocatoria WHERE departamento = '".$departamento."' AND tipo_convocatoria = '".$tipo."'";
                            }
                            if($tipo != null && $gestion != " "){
                                $sql = "SELECT * FROM convocatoria WHERE gestion_convocatoria = '".$gestion."' AND tipo_convocatoria = '".$tipo."'";
                            }
                            if($departamento != null && $gestion != " "){
                                $sql = "SELECT * FROM convocatoria WHERE gestion_convocatoria = '".$gestion."' AND departamento = '".$departamento."'";
                            }
                            if($tipo == null &&  $departamento == null && $gestion == " "){
                                echo "<h2> No se encontraron convocatorias </h2>";
                                return $res;
                            }
                        }
                                //date_default_timezone_set('America/La_Paz');
                                //$fechaActual=date("Y-m-d H:i:s");
                                
                                include_once("../modelo/convocatoria.php");

                                $convocatoria= new  Convocatoria();
                                //$sql = "SELECT * FROM convocatorias WHERE ";
                                $consulta=$convocatoria->buscarConvocatoria($sql);
                                foreach($consulta as $elemento){
                                    echo "<h2>".$elemento['nombre_convocatoria']."</h2>";
                                    echo "<h5>Descripcion del documento</h5>";
                                    echo "<h6>".$elemento['descripcion_conv']."</h6>";
                                    echo "<a href='".$elemento['direccion_pdf']."' target='_blank' >Abrir archivo ".$elemento['nombre_convocatoria']."</a>";
                                    echo "<p class='float-right'>Fecha de subida: ".$elemento['fecha_subida']."</p>"; //fecha subida?
                                    echo "<hr>";
                                }
                                $convocatoria->cerrarConexion();
                    }       
                ?>
                </div>
            </section>

        <footer class="container-fluid text-center footer-guest">
            <!DOCTYPE html>
            <hr>
            <div class="container col-xs- col-sm- col-md-12 col-log-">
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
                        </div>
            <div><br></div>
        </footer>
        <!--La libreria jquery.snow.js es obsoleta(21-01-2012)se sugiere poner un nav especifico para estas fechas-->      
        <script>
            $(document).ready( function(){
            var date = new Date();          
            if(date.getMonth()==11){
                $.fn.snow({
                    minSize: 10, //Tamaño mínimo del copo de nieve, 10 por defecto
                    maxSize: 20, //Tamaño máximo del copo de nieve, 10 por defecto
                    newOn: 1000, //Frecuencia (en milisegundos) con la que aparecen los copos de nieve, 500 por defecto
                    flakeColor: '#FFFFFF' //Color del copo de nieve, #FFFFFF por defecto
                });
            }
            });
            ajustarFooter();
        </script>
    </body>
</html>