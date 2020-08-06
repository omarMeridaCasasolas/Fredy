<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:index.php?error=x");
    }
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- <link href="../css/estilos.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../style/bootstrap.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if(isset($_GET['problem'])){
            $valor=$_GET['problem'];
            echo "<script>";
            if($valor=='x'){
                echo  "alert('La contraseñas deben concidir para procesar la informacion');";
            }
            echo "</script>";
        }
    ?>
    <div>    
        <nav class="navbar navbar-expand-lg navbar-custom padding-navbar">
            <div class="container">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navegacion,#navegacion2" aria-controls="navegacion" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>     
                </button>
                <div class="collapse navbar-collapse" id="navegacion">
                    <ul id="sub-header2" class="navbar-nav mr-auto">
                    <li id="menu2" class="nav-item">
                        <a class="nav-link" href="index.php">
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
    <header class="bg-primary w-100 p-4">
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
                <a href="CRUD_publicaciones.php" class="float-right text-light">Convocatorias</a>
                <br>
                <a href="../formularios/form_cerrarSession.php" class="float-right text-light">cerrar session</a>
    </header>

    <form action="../formularios/form_actualizarDatos.php" method="post" class="border border-dark container w-50 p-3 my-5 alert alert-success text-dark md w-75 sm w-100 " role="alert">
            <h1 class="text-center">Editar datos de Usuario</h1>
            <div class="form-group mx-5">
                <label for="nuevoCorreo">Escriba su nuevo correo electronico: </label>
                <input class="form-control" type="email" name="nuevoCorreo" id="nuevoCorreo" value="<?php echo $_SESSION['correo'];?>">
            </div>
            <div class="form-group mx-5">
                <label for="numeroTelefonico">Escriba su nuevo numero telefonico: </label>
                <input class="form-control" pattern="[0-9]{7,8}" title="Ingrese un numero de celular o telefono valido" type="text" name="numeroTelefonico" id="numeroTelefonico" value="<?php echo $_SESSION['telefono'];?>">
            </div>

            <div class="from-group mx-5">
                <label for="nuevoPassword">Escriba su nueva contraseña: </label>
                <input class="form-control" type="password" pattern="[a-zA-Z0-9]{4,15}" name="nuevoPassword" id="nuevoPassword" value="<?php echo $_SESSION['passoword'];?>">
            </div>
            <div class="form-group mx-5">
                <label for="copiaNuevoPassword">Reescriba su nueva contraseña: </label>
                <input class="form-control" type="password" pattern="[a-zA-Z0-9]{4,15}" name="copiaNuevoPassword" id="copiaNuevoPassword" value="<?php echo $_SESSION['passoword']?>">
            </div>
            <div class="row justify-content-center">    
                <input class="btn btn-success mr-2" type="submit" value="ActualizarDatos" >
                <a class="btn btn-danger ml-2" href="CRUD_publicaciones"> Cancelar</a>
            </div>
        </form>

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