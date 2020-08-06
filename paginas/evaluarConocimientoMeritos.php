<?php
if(isset($_GET['idPost']) && isset($_GET['idMat'])){
    $idPostulante = $_GET['idPost'];
    $idMateria = $_GET['idMat'];
    $idConvocatoria = $_GET['idConv'];
}else{
    echo "Error al recibir los parametros";
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
      <title>Evaluar conocimiento y meritos</title>
      <link rel="stylesheet" href="../style/bootstrap.css">
      <link rel="stylesheet" href="../style/myStyle.css">
    </head>
<body class='p-2 alert alert-primary'>

    <div>    
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
    <h2>Evaluacion de meritos</h2>
    <form action="" class="table table-warning text-dark">
        <input type="text" name="id_postulante" id="id_postulante" value="<?php echo $idPostulante;?>">
        <input type="text" name="id_materia" id="id_materia" value="<?php echo $idMateria;?>">
        <input type="text" name="id_convocatoria" id="id_convocatoria" value="<?php echo $idConvocatoria;?>">
        <section class='p-4'>
            <ol class='list-group-flush'>
            <?php
                require_once('../modelo/evaluacion.php');
                $evaluacion = new Evaluacion();
                $evaluacionMeritos = $evaluacion->obtenerTitulosPruebas($idConvocatoria);
                foreach($evaluacionMeritos as $meritoGeneral){
                    echo "<li class='p-1'>".$meritoGeneral['titulo_merito']."                          <span>".$meritoGeneral['porcentaje_merito']."</span>";
                    $evaluacionReglas = $evaluacion->obtenerReglas($meritoGeneral['id_merito']);
                    echo "<ol type='A'>";
                    foreach($evaluacionReglas as $regla){
                        echo "<li class='pl-3'>".$regla['titulo_regla']."                <span>".$regla['porcentaje_regla']."</span>";

                        $evaluacionNormas = $evaluacion->obtenerNormas($regla['id_regla']);
                        if(empty($evaluacionNormas)){
                            echo "<label for='' class='ml-5'>Escriba la nota sobre 100 --------> <input type='number'></label>";
                        }
                        echo "<ol type='a'>";
                        foreach($evaluacionNormas as $norma){
                            //echo var_dump($norma);
                            echo "<li class='pl-3'>".$norma['descripcion_norma']."                <span>".$norma['puntos_norma']."</span></li>";
                            if($evaluacionNormas){
                                echo "<label for='' class='ml-5'>Escriba la cantidad --------> <input type='number'></label>";
                            }
                        }
                        echo "</ol></li>";
                    }
                    echo "</ol></li><hr>";

                }
            ?>
            </ol> 
        </section>  
    </form>
</body>
</html>