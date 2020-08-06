$(document).ready(function() {
    var activarReloj = false;
    publicarHora();
    $(document).on('click','.buttonEditDocumento',function(e){
        let tmp = this.id;
        let idPostulante = tmp.split("_"); 
        console.log(idPostulante[2]);
        let postulanteActual = {
            clase: "Postulante",
            metodo: "obtenerPostulanteEspecifico",
            clave: idPostulante[1],
            idMateria: idPostulante[2]
        }
        $.ajax({
            type: "POST",
            url: "../modelo/interprete.php",
            data: postulanteActual,
            success: function (response) {
                console.log(response);
                let res = JSON.parse(response);
                let obj = res[0];
                console.log(obj.nombre_postulante);
                console.log(obj.telefono_postulante);
                console.log(obj.documentos_postulante);
                console.log(obj.observaciones_postulante);
                console.log(obj.fecha_entrega);
                $('#cantDocumentos').val(obj.documentos_postulante);
                $('#addObservaciones').val(obj.observaciones_postulante);
                $('#spanHora').html("Fecha entregada anteriormente: "+obj.fecha_entrega);
                $('#nombrePostulante').html(obj.nombre_postulante);
                $('#modalPostulante').click();
                activarReloj = true;
                publicarHora();
            },
            error : function(jqXHR, status, error) {
                console.log("status: "+status+" JqXHR "+jqXHR +" Error "+error);
            }
        });
        $('#formActualizarDocumentos').submit(function(event){
            let datosEditar= {
                clase: "Postulante",
                metodo: "actualizarDocumentosPostulante",
                cantDocumentosPos: $('#cantDocumentos').val(),
                observacionesPos: $('#addObservaciones').val(),
                horaDeEntrega: $('#horaActual').html(),
                clave: idPostulante[1],
                idMateria: idPostulante[2]
            };
            console.log(datosEditar);
            $.post("../modelo/interprete.php", datosEditar,function(resp){
                let res = JSON.parse(resp);
                console.log(res);
                $('#cerrarModalPostulante').click();
                activarReloj = false;
                idPostulante = [];
            });
            event.preventDefault();
        });
    });

        function publicarHora(){
            if(activarReloj){
                let fechaHora = new Date(); 
                let x = fechaHora.getFullYear()+"-"+agregarZero(fechaHora.getMonth()+1) +"-"+agregarZero(fechaHora.getDate()) +" "
                + agregarZero(fechaHora.getHours()) +":"+ agregarZero( fechaHora.getMinutes() )+":"+agregarZero(fechaHora.getSeconds());
                $('#horaActual').html(x);
                setTimeout(publicarHora,1000);
                //console.log(x);
            }
        }

    function agregarZero(numero){
        if(numero<10){
            return "0"+numero;
        }
        return numero;
    }
})