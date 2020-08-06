<?php 
    if(isset($_GET['id_post']) && isset($_GET['idConv'])){
        $idPostulante= $_GET['id_post'];
        $idConv = $_GET['idConv'];
        require_once("../modelo/convocatoria.php");                    
        $convocatoria = new  Convocatoria();
        $respuesta = $convocatoria->mostrarListaDeDocumentos($idPostulante);
    }
?>
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
      <title>Document</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body class="alert alert-primary">
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
        <hr>
        <h2 class="text-center">Documentos presentados</h2>
        <table class="table table-warning" border=1>
            <thead>
                <tr>
                    <td>Descripcion</td>
                    <td>Calificacion</td>
                    <td>Observaciones</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($respuesta as $res){
                        echo "<tr>
                            <td>".$res['descripcion_documento']."</td>
                            <td>Aceptado</td>
                            <td>Sin Observaciones</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>