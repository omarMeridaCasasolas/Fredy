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
    </head>
    <body>
        <?php /* include("../plantillas/header.php"); */?>

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
                                    Sesion Postulante 
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
        <div class="container p-2 border border-dark text-dark alert alert-primary w-50 mt-5 p-3" role="alert">
            <form action="../formularios/form_verificarPostulante.php" method="post" class="form-horizontal">
                <h3 class="text-center"> Autenticacion Postulante</h3>
                <div class="form-group">
                    <label for="correoPostulante">Correo Electronico: </label>
                    <input type="email" name="correoPostulante" id="correoPostulante" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="passPostulante">Contraseña: </label>
                    <input type="password" name="passPostulante" id="passPostulante" class="form-control" required pattern="^(?=.{4,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Recordar usuarios</label>
                </div>
                <div class='text-center'>
                    <input type="submit" class='btn btn-primary' value="Ingresar">
                </div>
            </form>
            <a href="crearNuevaCuenta.php">Crear una cuenta de postulante</a>
        </div>

        <?php /* include("../plantillas/footer.php");*/?>

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
    <?php
            if(isset($_GET['problem'])){
                $valor=$_GET['problem'];
                echo "<script>";
                if($valor=='x'){
                echo    "alert('No existe el postulante');";
                echo "</script>";
                }
            }
    ?>
</html>
