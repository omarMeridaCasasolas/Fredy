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

<body>
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
    <section class="container border border-dark text-dark alert alert-primary w-50 mt-5 p-4" role="alert">
        <form action="../formularios/form_verificarEvaluador.php" method="post">
            <h3 class="text-center"> Autenticacion Evaluadores</h3>
            <div class="form-group">
                <label for="idCorreo">Correo Electronico</label>
                <input type="text" name="idCorreo" id="idCorreo" class="form-control">
            </div>
            <div class="form-group">
                <label for="idPass">Contraseña</label>
                <input type="password" name="idPass" id="idPass" class="form-control">
            </div>
            <div class="text-center">
                <input type="submit" class='btn btn-primary' value="Ingresar">
            </div>
        </form>
    </section>

</body>
</html>