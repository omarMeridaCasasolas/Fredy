<?php
    session_start();
    $var=$_SESSION['nombre_postulante'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:index.php?error=x");
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
    <title>Convocatoria UMSS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
</head>
<body class=" alert alert-primary" role="alert">

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

    <div class="row">
        <div class="col-7 p-5 border border-dark table table-warning">
            <h2 class="text-center" >CONVOCATORIAS VIGENTES</h2>
                    <?php
                        require_once("../modelo/convocatoria.php");                    
                        $convocatoria = new  Convocatoria();
                        $consulta = $convocatoria->mostrarConvocatoriaFechaDescendente();
                        foreach($consulta as $elemento){
                            echo "<h2>".$elemento['tipo_convocatoria']."</h2>";
                            echo "<h5>Descripcion del documento</h5>";
                            echo "<h6 class='w-75'>".$elemento['nombre_convocatoria']."</h6>";
                            echo "<a href='".$elemento['direccion_pdf']."' target='_blank' >Descargar convocatoria</a>";
                            echo "<p class='float-right'>".$elemento['fecha_subida']."</p>"; ?>
                            <a href="../formularios/listaDeMaterias.php?id_conv=<?php echo $elemento['id_convocatoria']?>">ver lista de materias</a>
                            <?php echo "<hr>";
                            
                        }
                    ?>
        </div>
        <div class="col-5 p-5 text-center border border-dark table table-info">
            <h2>Convocatorias inscritas</h2>
            <?php 
                //$listaDeMaterias = $convocatoria->mostrarSoloMateriasInscritas($_SESSION['id_postulante']);
                $listaConvocatoria = $convocatoria->mostrarConvocatoriaFechaDescendente();   
                foreach($listaConvocatoria as $conv){
                    //echo var_dump($conv);
                    $bandera = true;
                    $listaRequerimiento = $convocatoria->mostrarRequerimientoPostulante($conv['id_convocatoria'],$_SESSION['id_postulante']); 
                    foreach($listaRequerimiento as $requerimiento){
                        //echo var_dump($requerimiento);
                        $tmp = $requerimiento['id_requerimiento'];
                        if($tmp){
                            if($bandera){
                                $bandera = false;
                                echo "<h5>".$conv['nombre_convocatoria']."</h5>";
                            }
                            if($requerimiento['destino_requerimiento']){
                                echo "<h6 class='text-left p-3'>".$requerimiento['destino_requerimiento']."</h6>";
                            }else{
                                echo "<h6 class='text-left p-3'>".$requerimiento['nombre_auxiliatura']."</h6>";
                            }
                             ?>
                            <a href="../paginas/seguimiento.php?id_post=<?php echo $_SESSION['id_postulante'];?>&idConv=<?php echo $conv['id_convocatoria']; ?>" class='btn btn-success float-right'>Seguimiento</a> 
                            <a href="../formularios/form_imprimirRotulo.php?id_post=<?php echo $_SESSION['id_postulante'];?>&id_mat=<?php echo $requerimiento['id_requerimiento'];?>" class='btn btn-primary float-right mr-1'>Imprimir rotulo</a>
                            <br>   
                            <?php
                        }
                    }
                    //echo "<br>";
                    echo "<hr>";
                }
            ?>
        </div>               
    </div>
</body>
</html>