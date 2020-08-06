<?php 
    if(isset($_GET['id'])){
        $idConvocatoria = $_GET['id'];
        require_once('../modelo/convocatoria.php');
        $convocatoria = new Convocatoria();
        $resultado = $convocatoria->mostrarConvocatoriaUnica($idConvocatoria);
    }else{
        header("Location:CRUD_publicaciones.php?error=x;");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body class=" alert alert-primary" role="alert">
        <main class="container-fluid">
        <h1>Lista de postulante</h1>
        <?php 
            //echo var_dump($resultado);
            echo  "<h6>Nombre Convocatoria: ".$resultado['nombre_convocatoria']."</h6>
            <h6>Gestion: ".$resultado['gestion_convocatoria']."</h6> <br><br>";
            $listaDeMaterias = $convocatoria->mostrarMateriasDisponibles($idConvocatoria);
            //echo var_dump($listaDeMaterias);
            foreach($listaDeMaterias as $materia){
                if(strcasecmp($resultado['tipo_convocatoria'],'Auxiliatura de laboratorio')==0){
                    echo "<h4 class='text-center'>".$materia['nombre_auxiliatura']."</h4>";
                    require_once('../modelo/postulante.php');
                    $postulante = new Postulante();
                    $listaPostulante = $postulante->mostrarPostulantesInscritos($materia['id_requerimiento']);
                    if(empty($listaPostulante)){
                        echo "No existe postulantes inscritos";
                    }
                    foreach($listaPostulante as $postulante){
                        echo   "<table class='table'>
                                <thead>
                                    <tr>
                                        <th>Nombre Postulante</th>
                                        <th>Carnet de identidad</th>
                                        <th>Estado</th>
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>".$postulante['nombre_postulante']."</td>
                                        <td>".$postulante['ci_postulante']."</td>
                                        <td><button class='btn btn-primary buttonEditDocumento' id='idDoc_".$postulante['id_postulante']."_".$materia['id_requerimiento']."' type='submit'>Documentos presentados</button></td>
                                        <td>Observacion 1</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4 class='text-center'>Comision de evaluadores</h4>
                            <div class='row'>
                                <div class='col-6 p-5'>
                                    <table class='table text-center'>
                                    <theah>
                                        <tr>
                                            <th>Evaluadores de merito</th>
                                        </tr>
                                    </thead>
                                        <tbody>";
                                            $NewPostulante = new Postulante();
                                            $tipo = 'merito';
                                            $listaDeEvaluadores = $NewPostulante->listaDeEvaluadores($materia['id_requerimiento'],$tipo);
                                            if(empty($listaDeEvaluadores)){
                                                echo "<tr><td>No existe evaluadores designados</td></tr>";
                                            }else{
                                                foreach($listaDeEvaluadores as $evaluador){
                                                    echo "<tr>
                                                        <td><b>Nombre: </b>".$evaluador['nombre_evaluador']."</td>
                                                    </tr>";
                                                    echo "<tr>
                                                        <td><b>Cargo: </b>".$evaluador['cargo_evaluador']."</td>
                                                    </tr>";
                                                }
                                            }
                                        echo    "<tr>
                                                <td><a href='EvaluadoresMeritos.php?id=".$materia['id_requerimiento']."&idTipo=".$tipo."' class='btn btn-primary'>Editar comision</a></td>
                                            </tr>
                                        <tbody>    
                                    </table>
                                </div>
                                <div class='col-6 p-5'>
                                <table class='table text-center'>
                                <theah>
                                    <tr>
                                        <th>Evaluadores de Conocimiento</th>
                                    </tr>
                                </thead>
                                    <tbody>";
                                        $NewPostulante = new Postulante();
                                        $tipoC = 'conocimiento';
                                        $listaDeEvaluadoresConocimiento = $NewPostulante->listaDeEvaluadores($materia['id_requerimiento'],$tipoC);
                                        if(empty($listaDeEvaluadoresConocimiento )){
                                            echo "<tr><td>No existe evaluadores designados</td></tr>";
                                        }else{
                                            foreach($listaDeEvaluadoresConocimiento  as $evaluador){
                                                echo "<tr>
                                                    <td><b>Nombre: </b>".$evaluador['nombre_evaluador']."</td>
                                                </tr>";
                                                echo "<tr>
                                                    <td><b>Cargo: </b>".$evaluador['cargo_evaluador']."</td>
                                                </tr>";
                                            }
                                        }
                                        echo    "<tr>
                                            <td><a href='EvaluadoresMeritos.php?id=".$materia['id_requerimiento']."&idTipo=".$tipoC."' class='btn btn-primary'>Editar comision</a></td>
                                        </tr>
                                    <tbody>    
                                </table>        
                                </div>
                            </div>
                            <br>
                            <hr>";
                    }
                }else{
                    echo "<h4 class='text-center'>".$materia['destino_requerimiento']."</h4>";
                    require_once('../modelo/postulante.php');
                    $postulante = new Postulante();
                    $listaPostulante = $postulante->mostrarPostulantesInscritos($materia['id_requerimiento']);
                    if(empty($listaPostulante)){
                        echo "No existe postulantes inscritos";
                    }
                    foreach($listaPostulante as $postulante){
                        echo   "<table class='table'>
                                <thead>
                                    <tr>
                                        <th>Nombre Postulante</th>
                                        <th>Carnet de identidad</th>
                                        <th>Estado</th>
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>".$postulante['nombre_postulante']."</td>
                                        <td>".$postulante['ci_postulante']."</td>
                                        <td><button class='btn btn-primary buttonEditDocumento' id='idDoc_".$postulante['id_postulante']."_".$materia['id_requerimiento']."' type='submit'>Documentos presentados</button></td>
                                        <td>Observacion 1</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4 class='text-center'>Comision de evaluadores</h4>
                            <div class='row'>
                                <div class='col-6 p-5'>
                                    <table class='table text-center'>
                                    <theah>
                                        <tr>
                                            <th>Evaluadores de merito</th>
                                        </tr>
                                    </thead>
                                        <tbody>";
                                            $NewPostulante = new Postulante();
                                            $tipo = 'merito';
                                            $listaDeEvaluadores = $NewPostulante->listaDeEvaluadores($materia['id_requerimiento'],$tipo);
                                            if(empty($listaDeEvaluadores)){
                                                echo "<tr><td>No existe evaluadores designados</td></tr>";
                                            }else{
                                                foreach($listaDeEvaluadores as $evaluador){
                                                    echo "<tr>
                                                        <td><b>Nombre: </b>".$evaluador['nombre_evaluador']."</td>
                                                    </tr>";
                                                    echo "<tr>
                                                        <td><b>Cargo: </b>".$evaluador['cargo_evaluador']."</td>
                                                    </tr>";
                                                }
                                            }
                                        echo    "<tr>
                                                <td><a href='EvaluadoresMeritos.php?id=".$materia['id_requerimiento']."&idTipo=".$tipo."' class='btn btn-primary'>Editar comision</a></td>
                                            </tr>
                                        <tbody>    
                                    </table>
                                </div>
                                <div class='col-6 p-5'>
                                <table class='table text-center'>
                                <theah>
                                    <tr>
                                        <th>Evaluadores de Conocimiento</th>
                                    </tr>
                                </thead>
                                    <tbody>";
                                        $NewPostulante = new Postulante();
                                        $tipoC = 'conocimiento';
                                        $listaDeEvaluadoresConocimiento = $NewPostulante->listaDeEvaluadores($materia['id_requerimiento'],$tipoC);
                                        if(empty($listaDeEvaluadoresConocimiento )){
                                            echo "<tr><td>No existe evaluadores designados</td></tr>";
                                        }else{
                                            foreach($listaDeEvaluadoresConocimiento  as $evaluador){
                                                echo "<tr>
                                                    <td><b>Nombre: </b>".$evaluador['nombre_evaluador']."</td>
                                                </tr>";
                                                echo "<tr>
                                                    <td><b>Cargo: </b>".$evaluador['cargo_evaluador']."</td>
                                                </tr>";
                                            }
                                        }
                                        echo    "<tr>
                                            <td><a href='EvaluadoresMeritos.php?id=".$materia['id_requerimiento']."&idTipo=".$tipoC."' class='btn btn-primary'>Editar comision</a></td>
                                        </tr>
                                    <tbody>    
                                </table>        
                                </div>
                            </div>
                            <br>
                            <hr>";
                    }
                }
            }
        ?>
        <!--Ventana Model estudiant Administrador-->
        <div id="ex1" class="modal">
                    <form id="formActualizarDocumentos">
                    <h1 class="text-center mb-4">Estado estudiante</h1>
                    <h4 class="text-center" id="nombrePostulante"></h4>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="cantDocumentos">Cantidad de documentos presentados</label>
                                <input class="text-center p-1" type="text" name="cantDocumentos" id="cantDocumentos">
                            </div>
                            <div class="w-100 mb-2">
                                <h5 class="text-center"> Observaciones</h5>
                                <textarea name="addObservaciones" id="addObservaciones" style="width:100%; resize: none;"></textarea>
                            </div>
                        </div>
                        <h6><span id="spanHora"></span></h6>
                        <h6>Hora Actual : <span id="horaActual"></span></h6>
                        <div class="text-center pt-3">
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                            <a href="#" class="btn btn-danger" rel="modal:close" id="cerrarModalPostulante">Close</a>
                        </div>
                    </form>
                </div>
                <p><a href="#ex1" rel="modal:open" id="modalPostulante"></a></p>
        </main>
    </body>
</html>