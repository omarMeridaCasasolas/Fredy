<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:../index.php?error=x");
    }
?>

<!-- CONEXION--->

<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
    $host = 'localhost';
    $basededatos = 'sdiprueba';
    $usuario = 'root';
    $contraseña = '1234';



    //$conexion_pdo = new PDO("pgsql:host=localhost;port=5432;dbname=sdiprueba","postgres","1234");//error
    //$conexion = pg_connect("host=localhost dbname=sdiprueba3 user=postgres password=1234")or die ('No se ha podido conectar: '.pg_last_error());
    //$conexion = pg_connect("host=localhost dbname=sdiprueba3 user=postgres password=1234")or die ('No se ha podido conectar: '.pg_last_error());
    $conexion = pg_connect("host=ec2-52-201-55-4.compute-1.amazonaws.com dbname=ddm5k6l3g5nntm user=erpgwqxdcmmizk password=d764438378b6a33d99872ff2f4321949530f5f26e8271e10fb80ece8311e701a")or die ('No se ha podido conectar: '.pg_last_error());
    //return $conexion;
///////////////////CONSULTA DE LOS ALUMNOS///////////////////////

    //$alumnos="SELECT * FROM alumnos order by id_alumno";
    //$queryAlumnos= $conexion->query($alumnos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

    <!--<link rel="stylesheet" href="../style/bootstrap.min.css">-->
    <!-------------------<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
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

    <div id="idConvicatoria" class="mx-auto w-75 p-4 my-5 border border-primary alert alert-info" role="alert">
    <h1 class="text-center">Publicar Convocatoria</h1>
<!---                     ---------------------------------------------------------------------------------     -------------------------------------------            -->
        
        <?php 
            $requCant = 1;
            $docCant = 1;
            $cantD = 3;
            $cantL = 3;
        ?>
    <section>
        <script>
            $(function(){
                for(ii = 0; ii < 3; ii++){
                    $("#tablaD tbody tr:eq(0)").clone().removeClass('fila-fijaD').appendTo("#tablaD");                  
                }
                for(iii = 0; iii < 7; iii++){
                    $("#tablaL tbody tr:eq(0)").clone().removeClass('fila-fijaL').appendTo("#tablaL");
                } 
                for(iiii = 0; iiii < 7; iiii++){
                    $("#tablaRequ tbody tr:eq(0)").clone().removeClass('fila-fija1').appendTo("#tablaRequ");
                    $("#tablaDoc tbody tr:eq(0)").clone().removeClass('fila-fija2').appendTo("#tablaDoc");
                } 
                if('#selectTipo' == ""){
                    //$('.fila-fijaL').hide();
                    //$('.fila-fijaD').hide();
                    
                }
                $('#selectTipo').on('change',function(){
                    var selectValor = $(this).val();
                    //alert (selectValor);
                    if (selectValor == 'ConvocatoriaDocencia') {
                        $('.tableD').show();
                        $('.btnD').show();
                        $('.tableL').hide();
                        $('.btnL').hide();
                    }
                    if (selectValor == 'ConvocatoriaLaboratorio') {
                        $('.tableL').show();
                        $('.btnL').show();
                        $('.tableD').hide();
                        $('.btnD').hide();
                    }
                    if (selectValor == '') {
                        $('.tableD').hide();
                        $('.tableL').hide();
                        $('.btnD').hide();
                        $('.btnL').hide();
                    }
                    //else {
                    //$('.fila-fija0').hide();
                    //$('.eliminar').hide();
                        //alert('esta es la opcion 2')
                    //}
                });
                $('.tableD').hide();
                $('.tableL').hide();
                $('.btnD').hide();
                $('.btnL').hide();
            });
        </script>
        <script>
        //var auxiliarL = "<?php $cantL; ?>";
        var auxiliarL = 7;
        //var auxiliarD = "<?php $cantD; ?>";
        var auxiliarD = 3;
        //var auxiliar2 = "<?php $docCant; ?>";
        var auxiliar2 = 7;
        //var auxiliar11 = "<?php $requCant; ?>";
        var auxiliar11 = 7;
            $(function(){
                $("#adicionarD").on('click', function(){
                    $("#tablaD tbody tr:eq(0)").clone().removeClass('fila-fijaD').appendTo("#tablaD");
                    auxiliarD++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminarD",function(){
                    if(auxiliarD > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliarD--;
                    }
                });
                $("#adicionarL").on('click', function(){
                    $("#tablaL tbody tr:eq(0)").clone().removeClass('fila-fijaL').appendTo("#tablaL");
                    auxiliarL++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminarL",function(){
                    if(auxiliarL > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliarL--;
                    }
                });
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional2").on('click', function(){
                    $("#tablaDoc tbody tr:eq(0)").clone().removeClass('fila-fija2').appendTo("#tablaDoc");
                    auxiliar2++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar2",function(){
                    if(auxiliar2 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliar2--;
                    }
                });
                $("#adicionall").on('click', function(){
                    $("#tablaRequ tbody tr:eq(0)").clone().removeClass('fila-fija1').appendTo("#tablaRequ");                   
                    //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').prependTo("#tabla");
                    auxiliar11++;
                    //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar1",function(){
                    if(auxiliar11 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();  
                        auxiliar11--;         
                    }
                });
            });
		</script>
        <form method="post"> <!-- [a-zA-Z0-9 ]{2,} -->
        <input type="text" name="titulo" id="titulo" style="resize:none; width:100%;" placeholder="Titulo" required autocomplete="off" 
        pattern="^[a-zA-Z0-9À-ÿ\u00f1\u00d1]+(\s*[a-zA-Z0-9À-ÿ\u00f1\u00d1]*)*[a-zA-Z0-9À-ÿ\u00f1\u00d1]+$" title="Solo puede ingresar numeros y letras"
        onkeyup="liveComment_titulo(this.value)" />
            <br>
            <br>
            <div class="form-group mx-5">
                <label for="numeroTelefonico">Descripcion: </label>
                <textarea id="descripcion" rows="5" name="descripcion" style="resize:none; width:100%;" required> </textarea>
            </div>
            </br>
            <div class="btn-der">
                <input type="submit" onclick='alerta()' name="insertarr" value="Publicar" class="btn btn-info"/>
                <!---                        --------------------------------- -------------------->
                <a href="crearPublicacionPrueba2.php"  onclick='' name="" value="Siguiente" class="btn btn-info"> Siguiente </a>
                <input onclick='sub()' name="visualizar" value="visualizar" data-toggle="modal" data-target="#miModal" class="btn btn-success"/>
                <!--<a class="btn btn-success ml-5" name="visualizarr" data-toggle="modal" data-target="#miModal" method='post'>Visualizar</a>-->
                <!--<a href="../formularios/generarPDF.php" class="btn btn-success ml-5" data-toggle="modal" data-target="#miModal">Visualizar</a>-->
                <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
            </div>

            <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#miModal">
                Abrir modal
            </button>-->
            <div id="contenedor">
			<div id="formulario" class="flotando margen-derecho">
				<form action="#" enctype="multipart/form-data">
					<label for="nombre">Su nombre</label>
					<input type="text" name="nombre" id="nombre" onkeyup="liveComment_name(this.value)" />
 
					<label for="email">Su correo electrónico</label>
					<input type="text" name="email" id="email" onkeyup="liveComment_email(this.value)" />
 
					<label for="mensaje">Su mensaje</label>
					<textarea id="mensaje" onkeyup="liveComment_text(this.value)"></textarea>
				</form>
			</div>
            <div class="modal fade bd-example-modal-lg" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <!--<h4 class="modal-title" id="myModalLabel">Esto es un modal</h4>-->
                        </div>
                            <div class="modal-body">
                                <div id="previsualizacion" class="flotando">
                                    <fieldset>
                                        <h4 class="text-center"><span id="preview_titulo" class="negrita">Anónimo</span></h4>
                                        <p class="titulo">Mensaje de <span id="preview_name" class="negrita">Anónimo</span> (<span id="preview_email"></span>)</p>
                                        <span id="preview_text"></span>
                                    </fieldset>
                                </div>
                            </div>
                            <?php 
                            if(isset($_POST['visualizar'])){
                                echo "entro";
                                //echo "?????".$nombreDeConvocatoria=($_POST['titulo']);
                                //echo $descripcionConvocatoria=($_POST['descripcion']);
                            }
                            //$nombreDeConvocatoria=($_GET['titulo']);
                            //echo $nombreDeConvocatoria;
                             //   if(isset($_POST['visualizarr'])){
                              //      $nombreDeConvocatoria=($_GET['titulo']); 
                               //     echo $nombreDeConvocatoria;
                                //}
                            ?>
                            <?php //include("../formularios/1234.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script type="text/javascript">
            function liveComment_titulo(texto)
			{
				if( texto == '' ) texto = '';
				document.getElementById('preview_titulo').innerHTML = texto;
			}
			function liveComment_name(texto)
			{
				if( texto == '' ) texto = '';
				document.getElementById('preview_name').innerHTML = texto;
			}
 
			function liveComment_email(texto)
			{
				document.getElementById('preview_email').innerHTML = texto;
			}
 
			function liveComment_text(texto)
			{
				texto = texto.replace(/n/gi,'<br />');
				document.getElementById('preview_text').innerHTML = texto;
			}
		</script>
        <script type="text/javascript">
            //variables
            var titulo = null;
            var fecha = null;
            var descripcion = null;

        //submit
        function sub(){
            product = document.getElementById("titulo").value;
            shelf = document.getElementById("descripcion").value;
            //alert(product+" "+shelf);
            <?php echo $product;?>
            return shelf;
        };
        </script>
        
        <script type="text/javascript">
            function alerta()
                {
                var mensaje;
                var opcion = confirm("Una vez publicado, no se podra editar la convocatoria, ¿esta seguro de publicarla?");
                if (opcion == true) {
                    mensaje = "Has clickado Aceptar";
                    //location.href = "crearPublicacion.php";
                    //location.href = "../formularios/form_eliminarConvocatoria.php?id=" + $x;
                    //href='../formularios/form_eliminarConvocatoria.php?id=".$elemento['id_convocatoria']."'
                } else {
                    mensaje = "cambiarEmailPassword.php";
                    location.href = "#";
                    //href='editarConvocatoria.php?id=".$elemento['id_convocatoria']."'
                }
                //document.getElementById("ejemplo").innerHTML = mensaje;
                
            }
        </script>
        <?php
        //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
        if(isset($_POST['insertarr'])){
            ///conv///
            
            date_default_timezone_set('America/La_Paz');
            $fechaHoy=date('Y-m-d');
            $fechaPublicacion=date('Y-m-d',strtotime($fechaHoy));
            $autorConv=$_SESSION['ciUsuario'];
                
            $nombreDeConvocatoria=($_POST['titulo']);
            $descripcionConvocatoria=($_POST['descripcion']);
            $notaRequerimientos=($_POST['notaRequerimientos']);
            $notaRequisitos=($_POST['notaRequisito']);
            $notaDocumentos=($_POST['notaDocumentos']);
            $formaDeEntrega=($_POST['formaDeEntrega']);
            $fechaPresentacion=($_POST['fechaLugarPresentacion']);
            $tribunalesConv=($_POST['deLosTribunales']);
            $tipoConvocatoria=($_POST['selectTipo']);
            $fechasImportantes=($_POST['fechas_imp']);

            //$nombramiento=($_POST['delNombramiento']);
            $notaFechas=($_POST['notaCronograma']);
            $departamento=($_POST['listaDepartamento']);
            $semestreConv=($_POST['selectSemestre']);
            $gestionConv=($_POST['selectGestion']);
            $nombramiento=($_POST['delNombramiento']);

            ///fechas
            $fechaExpiracion=$_POST['fechaDeExpiracion'];
            //$horaExpiracion=$_POST['horaDeExpiracion'];///aun no usado
            //$fechaPublicacion=$_POST['fechaPublicacionConvocatoria'];
            $fechaPresentacionDocumentosInicio=$_POST['fechaPresentacionDocIN'];
            $fechaPresentacionDocumentosFin=$_POST['fechaPresentacionDocFin'];
            $fechaPresentacionDocumentosLugar=$_POST['selectFechaDoc'];
            $fechaPublicacionHabilidatos=$_POST['fechaPublicacionHabilitados'];
            $fechaReclamosInicio=$_POST['fechaReclamosDesde'];
            $fechaReclamosFin=$_POST['fechaReclamosHasta'];
            $fechaReclamosLugar=$_POST['selectReclamos'];
            $fechaRolPruebas=$_POST['fechaRol'];
            $fechaPublicacionResultados=$_POST['fechaPublicacionResultados'];

            $fechaPresentacionDocumentosFin2 = "Hasta horas: ".$fechaPresentacionDocumentosFin;
            $fechaReclamosFin2 = "Hasta horas:". $fechaReclamosFin;

            //////////
            $tipoConv="ninguna";
            $gestionYsemestre="$semestreConv $gestionConv";

            //$itemsR1 = ($_POST['cantidadL']);
            //$itemsR2 = ($_POST['cantidadL']);
            //$itemsR3 = ($_POST['cantidadL']);
            //$itemsR4 = ($_POST['cantidadL']);
            //$itemsR5 = ($_POST['cantidadL']);

            if($tipoConvocatoria=="ConvocatoriaLaboratorio"){
                $tipoConv = "Auxiliatura de Laboratorio";
                $itemsR1 = ($_POST['cantidadL']);
                $itemsR2 = ($_POST['hrsAcademicasL']);
                $itemsR3 = ($_POST['nombreAuxiliatura']);
                $itemsR4 = ($_POST['codAux']);
            }else{
                if($tipoConvocatoria=="ConvocatoriaDocencia"){
                    $tipoConv = "Auxiliatura de Docencia";
                    $itemsR1 = ($_POST['cantidadD']);
                    $itemsR2 = ($_POST['hrsAcademicasD']);
                    $itemsR5 = ($_POST['destino']);
                }else{}
            }

            $idConv = '1';
            //$sqlidConv = "SELECT id_convocatoria FROM convocatorias WHERE titulo = '".$nombreDeConvocatoria."' AND descripcion = '".$descripcionConvocatoria."'";
            //$resultIdConvocatoria = pg_query($conexion, $sqlidConv);
            //$integerIDs = pg_fetch_result($resultIdConvocatoria, 0, 0);
            //$integerIDs = 0;
            pg_query($conexion,"INSERT INTO convocatoria (nombre_convocatoria, descripcion_conv, tipo_convocatoria, nota_requerimiento, nota_requisitos, nota_documentos, 
            forma_presentacion, fecha_presentacion, tribunales_convocatoria,gestion_convocatoria, nota_de_fechas, nombramiento, departamento, fecha_expiracion, fecha_subida,
            fechas_importantes, visible, autor_convocatoria) 
            VALUES ('$nombreDeConvocatoria','$descripcionConvocatoria','$tipoConv','$notaRequerimientos','$notaRequisitos','$notaDocumentos','$formaDeEntrega',
            '$fechaPresentacion','$tribunalesConv','$gestionYsemestre','$notaFechas','$nombramiento','$departamento', '$fechaExpiracion', '$fechaPublicacion', 
            '$fechasImportantes', 'TRUE', '$autorConv')");

            $idConv2= pg_query("SELECT MAX(id_convocatoria) from convocatoria");
            $idConvMax= pg_fetch_row($idConv2);                
            $idConvMaxFinal=$idConvMax[0];
            //pg_query($conexion,"INSERT INTO convocatorias (titulo, descripcion) VALUES ('$nombreDeConvocatoria','$descripcionConvocatoria')");
            pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio, fecha_final, ubicacion) 
            VALUES ('$idConvMaxFinal','Presentacion de documentos','$fechaPresentacionDocumentosInicio','$fechaPresentacionDocumentosFin2','$fechaPresentacionDocumentosLugar')");
            pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio) 
            VALUES ('$idConvMaxFinal','publicacion de habilitados','$fechaPublicacionHabilidatos')");
            pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio, fecha_final, ubicacion) 
            VALUES ('$idConvMaxFinal','Reclamos','$fechaReclamosInicio','$fechaReclamosFin2','$fechaReclamosLugar')");
            pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio) 
            VALUES ('$idConvMaxFinal','Rol de pruebas','$fechaRolPruebas')");
            pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio) 
            VALUES ('$idConvMaxFinal','Publicacion de resultados','$fechaPublicacionResultados')");


            $items0 = ($_POST['documentos']);
            $items1 = ($_POST['requisito']);
        ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
            while(true) {
                //id convocatoria///
                $idConv2= pg_query("SELECT MAX(id_convocatoria) from convocatoria");
                $idConvMax= pg_fetch_row($idConv2);                
                $idConvMaxFinal=$idConvMax[0];
                //$varConv = pg_query("INSERT INTO convocatorias (titulo, descripcion) VALUES ('$nombreDeConvocatoria','$descripcionConvocatoria')");
                //$idConv = "$idConvMax";
                //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item0 = current($items0);
                    $item1 = current($items1);
                    /////requerimientos////
                    if($tipoConvocatoria=="ConvocatoriaLaboratorio"){
                        $itemR1 = current($itemsR1);
                        $itemR2 = current($itemsR2);
                        $itemR3 = current($itemsR3);
                        $itemR4 = current($itemsR4);
                    }else{
                        if($tipoConvocatoria=="ConvocatoriaDocencia"){
                            $itemR1 = current($itemsR1);
                            $itemR2 = current($itemsR2);
                            $itemR5 = current($itemsR5);
                        }else{}
                    }
                ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id0=(( $item0 !== false) ? $item0 : ", &nbsp;");
                    $id1=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    if($tipoConvocatoria=="ConvocatoriaLaboratorio"){
                        $idR1=(( $itemR1 !== false) ? $itemR1 : ", &nbsp;");
                        $idR2=(( $itemR2 !== false) ? $itemR2 : ", &nbsp;");
                        $idR3=(( $itemR3 !== false) ? $itemR3 : ", &nbsp;");
                        $idR4=(( $itemR4 !== false) ? $itemR4 : ", &nbsp;");
                    }else{
                        if($tipoConvocatoria=="ConvocatoriaDocencia"){
                            $idR1=(( $itemR1 !== false) ? $itemR1 : ", &nbsp;");
                            $idR2=(( $itemR2 !== false) ? $itemR2 : ", &nbsp;");
                            $idR5=(( $itemR5 !== false) ? $itemR5 : ", &nbsp;");
                        }else{}
                    }
                //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                    $valores=''.$id0.',';
                    $valores1=''.$id1.',';
                    //$idRR1 = ''.$idR1.'';
                    if($tipoConvocatoria=="ConvocatoriaLaboratorio"){
                        $valoresRF1="('$idConvMaxFinal','$idR1','$idR2','$idR3','$idR4'),"; //,
                    }else{
                        if($tipoConvocatoria=="ConvocatoriaDocencia"){
                            $valoresRF1="('$idConvMaxFinal','$idR1','$idR2','$idR5'),"; //,
                        }else{}
                    }
                //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                    $valoresD= substr($valores, 0, -1);
                    $valoresQ= substr($valores1, 0, -1);
                    $valoresRFF1= substr($valoresRF1, 0, -1);
                    //$valoresR1 = "'1', " + $valoresRF1;
                ///////// QUERY DE INSERCIÓN ////////////////////////////
                    if($tipoConvocatoria =="ConvocatoriaLaboratorio"){
                        $sqlR1="INSERT INTO requerimientos (id_convocatoria, cantidad_requerimiento, cant_horas, nombre_auxiliatura, codigo_auxiliatura)
                        VALUES $valoresRFF1";
                    }else{
                        if($tipoConvocatoria =="ConvocatoriaDocencia"){
                            $sqlR1="INSERT INTO requerimientos (id_convocatoria, cantidad_requerimiento, cant_horas, destino_requerimiento)
                            VALUES $valoresRFF1";
                        }else{}
                    }
                    //$sql = "INSERT INTO requisitos (iddescripcion_requisito)
                    //VALUES $valoresQ";
                    if($valoresD !== ", &nbsp;"){
                        pg_query($conexion,"INSERT INTO documentos (id_convocatoria, descripcion_documento) VALUES ('$idConvMaxFinal','$valoresD')");
                    }
                    if($valoresQ !== ", &nbsp;"){
                        pg_query($conexion,"INSERT INTO requisitos (id_convocatoria, descripcion_requisito) VALUES ('$idConvMaxFinal','$valoresQ')");
                    }
                    if($tipoConvocatoria !== "tipoConvocatoria"){
                        pg_query($conexion,$sqlR1);
                    }
                    //pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio, fecha_final, ubicacion) 
                    //VALUES ('$idConvMaxFinal','Publicacion convocatoria','$','$','$')");
                    //pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio, fecha_final, ubicacion) 
                    //VALUES ('$idConvMaxFinal','Presentacion de documentos','$fechaPresentacionDocumentosInicio','$fechaPresentacionDocumentosFin','$fechaPresentacionDocumentosLugar')");
                    //pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio) 
                    //VALUES ('$idConvMaxFinal','publicacion de habilitados','$fechaPublicacionHabilidatos')");
                    //pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio, fecha_final, ubicacion) 
                    //VALUES ('$idConvMaxFinal','Reclamos','$fechaReclamosInicio','$fechaReclamosFin','$fechaReclamosLugar')");
                    //pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio) 
                    //VALUES ('$idConvMaxFinal','Rol de pruebas','$fechaRolPruebas')");
                    //pg_query($conexion,"INSERT INTO fechas_importantes (id_convocatoria, evento_importante, fecha_inicio) 
                    //VALUES ('$idConvMaxFinal','Publicacion de resultados','$fechaPublicacionResultados')");


                    //pg_query($conexion,"INSERT INTO documentos (id_convocatoria, descripcion_documento) VALUES ('1','$valoresD')");
                    //pg_query($conexion,"INSERT INTO requisitos (id_convocatoria, descripcion_requisito) VALUES ('1','$valoresQ')");
            
                    //$sqlRes=$conexion->query($sql) or mysql_error();
                // Up! Next Value
                    $item0 = next( $items0 );
                    $item1 = next( $items1 );
                    if($tipoConvocatoria=="ConvocatoriaLaboratorio"){
                        $itemR1 = next($itemsR1);
                        $itemR2 = next($itemsR2);
                        $itemR3 = next($itemsR3);
                        $itemR4 = next($itemsR4);
                    }else{
                        if($tipoConvocatoria=="ConvocatoriaDocencia"){
                            $itemR1 = next($itemsR1);
                            $itemR2 = next($itemsR2);
                            $itemR5 = next($itemsR5);
                        }else{}
                    }
                // Check terminator
                if($item0 === false && $item1 === false && $itemR1 === false) break;
            }    
            $convocatoria = new Convocatoria();   
            include '../formularios/generarPDF.php';
            // 
            //$guardar=$convocatoria->guardarConvocatoria($idConvMaxFinal);    
        }

        ?>
        <?php
        //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
        if(isset($_POST['visualizar'])){
        }
        ?>
    </section>
    <br>
                <!----------------------------------------------------- -->
    <!---<form action="../formularios/form_subirPublicacion2.php" method="post" enctype="multipart/form-data">
            
        <br>
        <br>
        <label for="fechaDeExpiracion"> Fecha de Expiracion</label>
                <?php
                     //date_default_timezone_set('America/La_Paz');
                     //$fechaHoy=date('Y-m-d');
                     //$fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                ?>
        <input type="date" name="fechaDeExpiracion" id="fechaDeExpiracion" min="<?php echo $fechaMinima;?>">
        <label for="horaDeExpiracion"> Hora de Expiracion</label>
        <input type="time" name="horaDeExpiracion" id="horaDeExpiracion">
        <br>
        <br>
        <div class="d-block w-25 mx-auto">
            <input class="btn btn-primary" type="submit" value="Publicar">
            <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
        </div>
    </form>-->
    <br>
        <br>

    </div>

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
