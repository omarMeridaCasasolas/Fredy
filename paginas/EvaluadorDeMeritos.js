$(document).ready(function() {
    //buscarEvaluador

    $('#buscadorEvaluadores').keyup(function(){
        if($('#buscadorEvaluadores').val()){
            let buscador = $('#buscadorEvaluadores').val();
            console.log(buscador);
            let datosEvaluador = {
                clase: "Evaluadores",
                metodo: "listaEvaluadoresObtenidos",
                busqueda: $('#buscadorEvaluadores').val()
            }
            $.ajax({
                type: "POST",
                url: "../modelo/interprete.php",
                data: datosEvaluador,
                success: function (response) {
                    let res = JSON.parse(response)
                    console.log(res);
                    let salida="";
                    let boton;
                    res.forEach(fila => {
                        if(fila.cargo_evaluador == "Docente"){
                            boton = `<button type='submit' class='btn btn-success asignarEvaluador' id='evaluador_${fila.id_evaluador}'>Agregar Docente</button>`;
                        }else{
                            boton = `<button type='submit' class='btn btn-success asignarEvaluador' id='evaluador_${fila.id_evaluador}'>Agregar Estudiante</button>`;
                        }
                        salida +=`<tr id='filaPostulante_${fila.id_evaluador}'>
                            <td>${fila.nombre_evaluador}</td>
                            <td>${fila.carrera_evaluador}</td>
                            <td>${fila.telefeno_evaluador}</td>
                            <td>${fila.cargo_evaluador}</td>
                            <td>${boton}</td>
                        </tr>`                    
                    });
                    //console.log(salida);
                    $('#listaComisionPosible').html(salida);
                },
                error : function(jqXHR, status, error) {
                    console.log("status: "+status+" JqXHR "+jqXHR +" Error "+error);
                }
            });

            }
    });

    mostrarListaDeEvaluadores();
    function mostrarListaDeEvaluadores(){
        $('#idMateria').hide();
        $('#tipo').hide();
        let datosEvaluadores = {
            clase: "Evaluadores",
            metodo: "listaEvaluadores",
            idMateria: $('#idMateria').val(),
            tipo: $('#tipo').val(),
        }
        $.ajax({
            type: "POST",
            url: "../modelo/interprete.php",
            data: datosEvaluadores,
            success: function (response) {
                //console.log(response);
                let tasks = JSON.parse(response);
                let template ='';
                tasks.forEach(tasks => {
                    template +=`
                        <tr>
                            <td>${tasks.nombre_evaluador}</td>
                            <td>${tasks.telefeno_evaluador}</td>
                            <td>${tasks.correo_evaluador}</td>
                            <td>${tasks.tipo_evaluador}</td>
                            <td><button class="btn btn-danger evaluador_delet" id="req_${tasks.id_evaluador}" type="submit">Eliminar</button><button class="btn btn-warning evaluador_edit" id="reqEdit_${tasks.id_evaluador}" type="submit">Editar</button></td>
                        </tr>
                    `
                });
                $("#listaEvaluadores").html(template);
            }
        });
    }

    $("#idAddEvaluador").submit(function(e){
        e.preventDefault(); 
        let datosEvaluador = {
            clase: "Evaluadores",
            metodo: "addEvaluadores",
            idName: $('#idName').val(),
            idCi: $('#idCi').val(),
            idCorreo: $('#idCorreo').val(),
            idTelefono: $('#idTelefono').val(),
            idCargo: $('#idCargo').val(),
            idDepartamento: $('#idDepartamento').val(),
            idPass: $('#idPass').val(),
            idMateria: $('#idMateria').val(),
            tipo: $('#tipo').val()
        };
        //console.log(requerimientos);
        $.post("../modelo/interprete.php", datosEvaluador,function(resp){
            //console.log(resp);
            $('#idAddEvaluador').trigger('reset');
        });
        mostrarListaDeEvaluadores();
    });

    $(document).on('click','.asignarEvaluador', function (e) {
        let idButton = this.id;
        let idUnico = idButton.split("_");
        let clavePrimaria = idUnico[1];
        let datosEvaluador = {
            clase: "Evaluadores",
            metodo: "agregarEvaluadorConvocatoria",
            idMateria: $('#idMateria').val(),
            clave: clavePrimaria
        }
        $.ajax({
            type: "POST",
            url: "../modelo/interprete.php",
            data: datosEvaluador,
            success: function (response) {
                //console.log(response);
                mostrarListaDeEvaluadores();
                $("#filaPostulante_"+clavePrimaria).remove();
            },
            error : function(jqXHR, status, error) {
                console.log("status: "+status+" JqXHR "+jqXHR +" Error "+error);
            }
        });
        
    });


    $(document).on('click','.evaluador_delet',function(e){
        let idButton = this.id;
        let idUnico = idButton.split("_");
        let clavePrimaria = idUnico[1];
        let delEvaluador = {
            clase: "Evaluadores",
            metodo: "eliminarEvaluador",
            idMateria: $('#idMateria').val(),
            clave: clavePrimaria
        };
        $.post("../modelo/interprete.php", delEvaluador ,function(resp){
            console.log(resp);
            mostrarListaDeEvaluadores();
        });
    });

    //editar Evaluador
    $(document).on('click','.evaluador_edit',function(e){
        let tmp = this.id;
        var idEvaluador = tmp.split("_");
        console.log(idEvaluador[1]);
        let evaluador = {
            clase: "Evaluadores",
            metodo: "obtenerEvaluadorEspecifico",
            clave: idEvaluador[1]
        }
        $.ajax({
            type: "POST",
            url: "../modelo/interprete.php",
            data: evaluador,
            success: function (response) {
                res = JSON.parse(response);
                obj = res[0];
                $('#modalNombre').val(obj.nombre_evaluador);
                $('#modalCI').val(obj.ci_evaluador);
                $('#modalCorreo').val(obj.correo_evaluador);
                $('#modalTelefono').val(obj.telefeno_evaluador);
                $('#modalCargo').val(obj.cargo_evaluador);
                $('#modalDepartamento').val(obj.carrera_evaluador);
                $('#modalEvaluador').click();
            },
            error : function(jqXHR, status, error) {
                console.log("status: "+status+" JqXHR "+jqXHR +" Error "+error);
            }
        });
        $('#formActualizarEvaluador').submit(function(event){
            let datosEditar= {
                clase: "Evaluadores",
                metodo: "actualizarEvaluadorEspecifico",
                idName: $('#modalNombre').val(),
                idCi: $('#modalCI').val(),
                idCorreo: $('#modalCorreo').val(),
                idTelefono: $('#modalTelefono').val(),
                idCargo: $('#modalCargo').val(),
                idDepartamento: $('#modalDepartamento').val(),
                clave: idEvaluador[1]
            };
            $.post("../modelo/interprete.php", datosEditar,function(resp){
                $('#modalNombre').val(" ");
                $('#modalCI').val(" ");
                $('#modalCorreo').val(" ");
                $('#modalTelefono').val(" ");
                $('#modalCargo').val(" ");
                $('#modalDepartamento').val(" ");
                $('#cerrarEvaluador').click();
                mostrarListaDeEvaluadores();
                idEvaluador = [];
            });
            event.preventDefault();
        });
       
   });
})