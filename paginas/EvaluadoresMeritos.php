<?php 
   if(isset($_GET['id']) && isset($_GET['idTipo'])){
       $idMateia = $_GET['id'];
       $tipo = $_GET['idTipo'];
   }else{
       header("Location:../listaPostulantes.php?error=y");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar comision de evaluadores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="alert alert-primary" role="alert">
   <?php
        if($tipo=="merito"){
            echo "<h3 class='text-center'>Lista de evaluadores de meritos</h3>";
        }else{
            echo "<h3 class='text-center'>Lista de evaluadores de conocimiento</h3>";
        }
   ?>
    <input type="text" name="" id="idMateria" value="<?php echo $idMateia?>" stke>
    <input type="text" name="" id="tipo" value="<?php echo $tipo?>">
    <table class='table table-warning' border=1>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Cargo Evaluador</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="listaEvaluadores">
        </tbody>
    </table>

        <hr>
            <div class="container bg-dark p-5">
                <h3 class='text-white'>Lista de evaluadores disponibles</h3>
                <div class="form-group">
                    <input type="search" name="buscadorEvaluadores" id="buscadorEvaluadores" class='form-control' placeholder='Buscar evaluador'>
                </div>
            </div>
            <table class='container table table-hover' >
                <thead>
                    <tr>
                        <th>Nombre: </th>
                        <th>Departamento:</th>
                        <th>Telefono:</th>
                        <th>Cargo:</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody id="listaComisionPosible">
                </tbody>
            </table>
        <hr>
    <!-- Ventana model de actualizar usuario-->
                <div id="ex1" class="modal">
                    <form id="formActualizarEvaluador">
                    <h1 class="text-center mb-4">Editar Evaluador</h1>
                        <div class="row">
                            <div class="col-12 mb-2 form-group">
                                <label for="modalNombre">Nombre </label>
                                <input class="form-control" type="text" name="modalNombre" id="modalNombre">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="modalCI">Carnet de Identidad</label>
                                <input class="text-center p-1" type="text" name="modalCI" id="modalCI">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="modalCorreo">Correo Electronico</label>
                                <input class="text-center p-1" type="text" name="modalCorreo" id="modalCorreo">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="modalTelefono">Telefono</label>
                                <input class="text-center p-1" type="text" name="modalTelefono" id="modalTelefono">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="modalCargo">Cargo actual </label>
                                <select class="form-control" id="modalCargo">
                                    <option>Docente</option>
                                    <option>Estudiante</option>
                                </select>
                            </div>
                            <div class="col-12 mb-2 form-group">
                                <label for="modalDepartamento">Departamento</label>
                                <select class="form-control" id="modalDepartamento">
                                    <option>Departamento de ingenieria Informatica</option>
                                    <option>Departamento de Fisica</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center pt-3">
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                            <a href="#" class="btn btn-danger" rel="modal:close" id="cerrarEvaluador">Close</a>
                        </div>
                    </form>
                </div>
                <p><a href="#ex1" rel="modal:open" id="modalEvaluador"></a></p>


    <div class="container " id="idAddEvaluador">
        <form method="post" class="table table-warning border border-dark p-3">
            <h1 class='text-center'>Crear nuevo evaluador de <?php echo $tipo?></h1>
            <div class="form-group">
                <label for="idName">Nombre completo :</label>
                <input type="text" name="idName" id="idName" class='form-control'>
            </div>
            <div class="form-group">
            <label for="idCi">Carnet de identidad :</label>
                <input type="text" name="idCi" id="idCi" class='form-control'>
            </div>
            <div class="form-group">
            <label for="idCorreo">Correo Electronico</label>
                <input type="email" name="idCorreo" id="idCorreo" class='form-control'>
            </div>
            <div class="form-group">
            <label for="idTelefono">Telefono :</label>
                <input type="text" name="idTelefono" id="idTelefono" class='form-control'>
            </div>
            <div class="form-group"> 
            <label for="">Cargo en la convocatoria</label>
                <select class="form-control" id="idCargo">
                    <option>Docente</option>
                    <option>Estudiante</option>
                </select>
            </div>
            <div class="form-group"> 
            <label for="idDepartamento">Seleccione departamento:</label>
                <select class="form-control" id="idDepartamento">
                    <option>Departamento de ingenieria Informatica</option>
                    <option>Departamento de Fisica</option>
                </select>
            </div>

            <div class="form-group">
            <label for="idPass">Ingrese contraseña:</label>
                <input type="password" name="idPass" id="idPass" class='form-control'>
            </div>

            <div class="form-group">
            <label for="copyPass">Reingrese Contraseña :</label>
                <input type="password" name="copyPass" id="copyPass" class='form-control'>
            </div>

            <div class="text-center">
            <input type="submit"  class='btn btn-primary' value="Crear evaluador">
            <a href="" class='btn btn-danger'>Cancelar</a>
            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="EvaluadorDeMeritos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</body>
</html>