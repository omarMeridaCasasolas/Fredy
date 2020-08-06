<?php
    session_start();
    if(isset($_SESSION['nombreEvaluador'])  &&  isset($_SESSION['idEvaluador'])){
        $nombreEvaluador = $_SESSION['nombreEvaluador'];
        $idEvaluador = $_SESSION['idEvaluador'];
    }else{
        header("Location:comisionEvaluadora.php?error=x");
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
      <title>index Evaluador</title>
      <link rel="stylesheet" href="../style/bootstrap.css">
      <link rel="stylesheet" href="../style/myStyle.css">
    </head>
<body>

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

    <header class='p-5 bg-primary'>
        <h3 class='text-light'>Bienvenido <?php echo $nombreEvaluador; ?></h3>
        <a href="../formularios/form_cerrarSession.php" class="float-right text-light">cerrar session</a>
    </header>
        <main class='p-3 border border-dark alert alert-primary' role="alert">
        <?php require_once("../modelo/evaluadoresMeritos.php");
            $evaluador = new Evaluador();
            $lista = $evaluador->obtenerListaMaterias($idEvaluador);
            foreach($lista as $elemento){
                $convocatoria = $evaluador->obtenerConvocatoriaParticular($elemento['id_convocatoria']);
                echo "<h3>Titulo: ".$convocatoria['nombre_convocatoria']."</h3>";
                echo "<h3>".$convocatoria['gestion_convocatoria']."</h3>";
                echo "<h3>Tipo : ".$convocatoria['tipo_convocatoria']."</h3>";
                echo "<h4>Lista de ofertas</h4>";
                $materiasAsignadas = $evaluador-> obtenerMateriasCompletas($idEvaluador,$elemento['id_convocatoria']);
                foreach($materiasAsignadas as $materia){
                    if($materia['nombre_auxiliatura']){
                        echo "<h4>Alumnos Inscritos en la materia ".$materia['destino_requerimeinto']."</h4>";
                    }else{
                        echo "<h4>Alumnos Inscritos en la materia ".$materia['nombre_auxiliatura']."</h4>";
                    }
                    $postulantesInscritos = $evaluador->listaDeAlumnosInscritos($materia['id_requerimiento']);
                    foreach($postulantesInscritos as $postulante){
                        $archivosCompletados = $evaluador->postulanteHabilitadoDocumentos($postulante['id_postulante'],$materia['id_requerimiento']);
                        echo "<div class='container'>
                        <table class='table table-warning'>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>".$postulante['nombre_postulante']."</td>
                                    <td>En proceso</td>
                                    <td><a href='evaluarDocumentosPostulante.php?idPost=".$postulante['id_postulante']."&idMat=".$materia['id_requerimiento']."&idConv=".$elemento['id_convocatoria']."' class='btn btn-primary'>Documentos</a>
                                    ";
                                    if($archivosCompletados['documentos_comp']){
                                        echo "<a href='evaluarConocimientoMeritos.php?idPost=".$postulante['id_postulante']."&idMat=".$materia['id_requerimiento']."&idConv=".$elemento['id_convocatoria']."' class='btn btn-primary'>Meritos y Conocimientos</a>";
                                    }else{
                                        echo "<a href='evaluarConocimientoMeritos.php?idPost=".$postulante['id_postulante']."&idMat=".$materia['id_requerimiento']."&idConv=".$elemento['id_convocatoria']."' class='btn disabled btn-primary'>Meritos y Conocimientos</a>";
                                    }
                                    echo "</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>";

                    }
                }
            }
        ?>
        
        </main>
</body>
</html>