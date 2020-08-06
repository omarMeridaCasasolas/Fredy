<?php
    //$clavePrincipal = 159; // la clave de la convocatoria
    $clavePrincipal = $idConvMaxFinal;
    //$clavePrincipal = 2;
    require_once("../modelo/convocatoria.php");
    $convocatoria = new Convocatoria();
    $res=$convocatoria->mostrarConvocatoriaCompleta($clavePrincipal);
    //echo var_dump($res);
    $requerimientos = json_decode($convocatoria -> getRequerimientos($clavePrincipal)); 
    /*
        Este tipo de consultas puede ser cambiado por: 
        $requerimientos = $convocatoria -> getRequerimientos($clavePrincipal)); 
        public function getRequerimientos($identificador){
            $sql = "SELECT * from requerimientos where id_convocatoria=:id order by items_requerimiento";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $resultado = $sentenceSQL->execute(array(":id"=>$identificador));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($resultado);
            $sentenceSQL -> closeCursor();
            return $json; 
        }

        Despues

        public function getRequerimientos($identificador){
            $sql = "SELECT * from requerimientos where id_convocatoria=:id order by items_requerimiento";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $resultado = $sentenceSQL->execute(array(":id"=>$identificador));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL -> closeCursor();
            return $resultado; 
        }
    */

    $requisitos = json_decode($convocatoria -> getRequisitos($clavePrincipal));
    $documentos = json_decode($convocatoria -> mostrarDocumentos($clavePrincipal));
    $presentaciones = json_decode($convocatoria -> mostrarPresentaciones($clavePrincipal));
    //tabla de conocimeintos
    $conocimientos = json_decode($convocatoria -> mostrarConocimientos($clavePrincipal));
    //fechas Importantes
    $ListafechasImportantes = json_decode($convocatoria -> mostrarFechasImportantes($clavePrincipal));

    $meritosGenerales = json_decode($convocatoria -> mostrarMeritosGenerales($clavePrincipal));
    $meritosGenerales = array_reverse($meritosGenerales);



    $nombreConvocatoria = $res['nombre_convocatoria'];
    $gestion = $res['gestion_convocatoria'];
    $descripcion = $res['descripcion_conv'];
    $notaRequerimiento = $res['nota_requerimiento'];
    $notaRequisitos = $res['nota_requisitos'];
    $nota_doc= $res['nota_documentos'];
    $descripcion_presentacion= $res['forma_presentacion'];
    $fechaPresentacion = $res['fecha_presentacion'];
    $notaFechas = $res['nota_de_fechas'];
    $calificacionMeritos = $res['calificacion_meritos'];
    $notaMeritos = $res['nota_meritos'];
    $calificacionConocimiento = $res['calificacion_conocimiento'];
    $tribunalesConvocatoria = $res['tribunales_convocatoria'];
    $fechasImportantes = $res['fechas_importantes'];
    $nombramientoConvocatoria = $res['nombramiento'];

    $tipoConovcatoria = $res['tipo_convocatoria'];
    $indice = 1;

    $fechaActual="";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            *{ font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;}
        </style>
    </head>
    <body>
        <h4><?php echo " "."<br>" ?></h4>
        <h4 class="text-center"><?php echo $nombreConvocatoria?></h4>
        <h4 class="text-center">============</h4>
        <h4 class="text-center"><?php echo $gestion; ?></h4>
        <p class='text-justify'><?php echo $descripcion; ?></p>
        <h5><?php echo $indice.".- "; $indice++ ;?>Requerimientos</h5>
        <!-- tabla para Auxiliatur a de Docencia -->
        <?php if($tipoConovcatoria=='Auxiliatura de Docencia'){?>
            <table border=2 class="w-100">
                <thead>
                    <tr>
                        <th style='width:10%;'><u><b>Items</b></u></th>
                        <th style='width:15%;'><u><b>Cantidad</b></u></th>
                        <th style='width:50%;'><u><b>Hrs. Academicas</b></u></th>
                        <th style='width:25%;'><u><b>Destino</b></u></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        foreach ($requerimientos as $actual) {
                            $aux = explode(" ",$actual->cantidad_requerimiento);
                            $total +=$aux[0]; 
                            echo  "<tr>
                                    <td class='p-1'>".$actual->items_requerimiento."</td>
                                    <td class='p-1'>".$actual->cantidad_requerimiento."</td>
                                    <td class='p-1'>".$actual->cant_horas."</td>
                                    <td class='p-1'>".$actual->destino_requerimiento."</td>
                                </tr>";
                        }
                            echo "<tr><td>Total</td><td>".$total."</td><td colspan='2'></td></tr>";
                            //echo "<tr><td>Total</td><td>".$total."  ".$aux[1]."</td><td colspan='2'></td></tr>";
                    ?>
                </tbody>
            </table>
            <br>
        <?php }
        if($tipoConovcatoria=='Auxiliatura de Laboratorio'){ ?>
            <table border=2 class="m-1 w-100">
                <thead>
                    <tr>
                        <th style='width:10%;' class='text-center'><u><b>Items</b></u></th>
                        <th style='width:10%;' class='text-center'><u><b>Cantidad</b></u></th>
                        <th style='width:25%;' class='text-center'><u><b>Hrs. Academicas</b></u></th>
                        <th style='width:35%;' class='text-center'><u><b>Nombre de la Auxiliatura</b></u></th>
                        <th style='width:20%;' class='text-center'><u><b>Codigo de la Auxiliatura</b></u></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        foreach ($requerimientos as $actual) {
                            $aux = explode(" ",$actual->cantidad_requerimiento);
                            $total +=$aux[0]; 
                            echo  "<tr>
                                    <td class='text-center'>".$actual->items_requerimiento."</td>
                                    <td class='text-center'>".$actual->cantidad_requerimiento."</td>
                                    <td class='text-center'>".$actual->cant_horas."</td>
                                    <td>".$actual->nombre_auxiliatura."</td>
                                    <td class='text-center'>".$actual->codigo_auxiliatura."</td>
                                </tr>";
                        }
                        echo "<tr><td>Total</td><td>".$total."  ".$aux[1]."</td><td colspan='3'></td></tr>";
                    ?>
                </tbody>
            </table>
            <br>
        <?php  } ?>   
        <?php
            if(strlen($notaRequerimiento)>0){
                echo "<p><strong>Nota.- </strong>".$notaRequerimiento."</p>";
            }
        ?>      

        <!-- Requisitos-->
        <h5><?php echo $indice.".- "; $indice++ ;?>Requisitos</h5>
        <ol type="A">
            <?php
                foreach ($requisitos as $requisito){
                    echo  "<li>".$requisito->descripcion_requisito."</li>";
                }
            ?>     
        </ol>
        <?php
            if(strlen($notaRequisitos)>0){
                echo "<p><strong>Nota.- </strong>".$notaRequisitos."</p>";
            }
        ?>

        <!--Documentos a presentar-->
        <h5><?php echo $indice.".- "; $indice++ ;?>Documentos a presentar</h5>
        <ol type="a">
            <?php
                foreach ($documentos as $documento){
                    echo  "<li>".$documento->descripcion_documento."</li>";
                }
            ?>
        </ol>
        <?php
            if(strlen($nota_doc)>0){
                echo "<p><strong>Nota.- </strong>".$nota_doc."</p>";
            }
        ?>

        <!--forma de prensentacion-->    
        <h5><?php echo $indice.".- "; $indice++ ;?>FORMA DE PRESENTACION</h5>
        <p><?php echo $descripcion_presentacion; ?></p>
        <ul>
            <?php
                foreach ($presentaciones as $presentacion){
                    echo  "<li>".$presentacion->descripcion."</li>";
                }
            ?>
        </ul>

        <!--lugar y fecha de prensentacion-->         
        <h5><?php echo $indice.".- "; $indice++ ;?>LUGAR Y FECHA DE PRESENTACION</h5>
        <p class='text-justify'><?php echo $fechaPresentacion; ?></p>

        <!--calificacion de meritos-->        
        <h5><?php echo $indice.".- "; $indice++ ;?>CALIFICACACION DE  MERITOS</h5>
        <p><?php echo $calificacionMeritos; ?></p>
        <table border = 2 class='w-100'>
            <thead>
                <tr>
                    <th style='width:75%;'class='text-center' ><h5><b>Descripcion</b></h5></th>
                    <th style='width:25%;'class='text-center' ><h5><b>Porcentaje</b></h5></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($meritosGenerales as $meritoGeneral){
                        echo "<tr>
                                <td><b>".$meritoGeneral->titulo_merito."</b></td>
                                <td class='text-center'><strong>".$meritoGeneral->porcentaje_merito."</strong></td>
                            </tr>";
                            if(strlen($meritoGeneral->descripcion_merito)>0){
                                echo "<tr><td colspan='2'>".$meritoGeneral->descripcion_merito."</td></tr>";
                            }                            
                            $reglasMeritos = json_decode($convocatoria -> mostrarReglasMeritos($meritoGeneral->id_merito));
                            foreach($reglasMeritos as $reglaMerito){
                                echo "<tr>
                                    <td>".$reglaMerito->titulo_regla."</td>
                                    <td class='text-center'>".$reglaMerito->porcentaje_regla."</td>
                                </tr>";
                                $normasMeritos = json_decode($convocatoria -> mostrarNormasMeritos($reglaMerito->id_regla));
                                foreach($normasMeritos as $normaMerito){
                                    echo "<tr>
                                    <td colspan='2' class='px-4'>".$normaMerito->puntos_norma." ".$normaMerito->descripcion_norma."</td>
                                    </tr>";  
                                }
                            }
                    }
                ?>
            </tbody>
        </table>        
        <?php
            if(strlen($notaMeritos)>0){
                echo "<p class='text-justify'><strong>Nota.- </strong>".$notaMeritos."</p>";
            }
        ?>

        <!--calificacion de conocimientos--> 
        <br>
        <h5><?php echo $indice.".- "; $indice++ ;?>CALIFICACACION DE  CONOCIMIENTOS</h5>        
        <p> <?php echo $calificacionConocimiento; ?></p>
            <?php
                    if($tipoConovcatoria == 'Auxiliatura de docencia'){?>
                        <table border=2 class='w-100'>
                            <thead>
                                <tr>
                                    <td style='width:80%;'>Descripcion</td>
                                    <td style='width:20%;'>Nota</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($conocimientos as $conocimiento){
                                echo "<tr>
                                        <td>".$conocimiento->descripcion_conocimiento."</td>
                                        <td>".$conocimiento->nota_conocimiento."</td>
                                    </tr>";                                  
                                }?>
                            </tbody>
                        </table>
                        <?php
                    }else{
                        echo "Nota falta crear una tabla completa de temario";
                    }
                ?>
        <br>
        <!--Tribunales -->
        <h5><?php echo $indice.".- "; $indice++ ;?>TRIBUNALES</h5>  
        <p class='text-justify'><?php echo $tribunalesConvocatoria ?></p>  

        <!--fecha de prueba -->         
        <h5><?php echo $indice.".- "; $indice++ ;?>FECHAS DE LAS PRUEBAS</h5>  
        <p><?php echo $fechasImportantes ?></p>
        <table border=2 class='w-100'>
            <thead>
                <tr>
                    <th style='width:60%;'class='text-center'><b>Eventos</b></th>
                    <th style='width:40%;'class='text-center'><b>Fechas</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //var_dump($fechasImportantes);
                    foreach($ListafechasImportantes as $fechaImportante){
                        if(strcasecmp($fechaImportante->evento_importante,'Publicación de convocatoria')==0){
                            $fechaActual = $fechaImportante->fecha_inicio;
                        }
                        echo  "<tr>
                            <td>".$fechaImportante->evento_importante."</td>
                            <td> Desde:".$fechaImportante->fecha_inicio."<br> Hasta: ".$fechaImportante->fecha_final."<br>En secretaria del ".$fechaImportante->ubicacion."</td>
                        </tr>";
                    }
                    ?>    
                </tbody>
        </table>
        <?php
            if(strlen($notaFechas)>0){
                echo "<p><strong>Nota.- </strong>".$notaFechas."</p>";
            }
        ?>
        <br>
        <h5><?php echo $indice.".- "; $indice++ ;?>NOMBRAMIENTO</h5>  
        <p class='text-justify'><?php echo $nombramientoConvocatoria; ?></p>  
        <p class="text-center">Cochabamba, <?php echo $fechaActual ; ?></p>


    </body>
</html>