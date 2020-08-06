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
                <textarea id="descripcion" rows="5" name="descripcion" style="resize:none; width:100%;" onkeyup="liveComment_descripcion(this.value)" required > </textarea>
            </div>
            </br>
            <label for="requerimientos">Requerimientos: </label>
            </br>
            <select id="selectTipo" name="selectTipo" class="mr-2" onselect="liveComment_tipoConv(this.value)" required>
                <option value="">Seleccionar tipo de convocatoria</option>
				<option value="ConvocatoriaDocencia">Convocatoria de Auxiliar de Docencia</option>
				<option value="ConvocatoriaLaboratorio">Convocatoria de Auxiliar de Laboratorio</option>
		    </select>
            </br>
            </br>
        <!--</table>
            <form method="post">-->
                <table class="tableD bg-info"  id="tablaD">
                <thead>
                    <tr>
                    <th scope="col">Cantidad Auxiliares</th>
                    <th scope="col">Horas academicas (hrs/mes)</th>
                    <th scope="col">Destino</th>
                    </tr>
                </thead>
                    <tr class="fila-fijaD">
                        <td><input name="cantidadD[]" placeholder="Cantidad auxiliares"
                        pattern="[0-9]{1,2}" title="Solo puede ingresar numeros en este campo, el maximo de auxiliares que se permite es 99"/></td>
                        <td><input name="hrsAcademicasD[]" placeholder="Horas academicas"
                        pattern="[0-9]{1,2}" title="Solo puede ingresar numeros en este campo, el maximo de horas que se permite es 99"/></td>
                        <td><input name="destino[]" placeholder="Destino"/></td>
                        <td class="eliminarD"><input type="button"   value="Eliminar fila"/></td>
                    </tr>
                </table>
                <button id="adicionarD" name="adicionarD" type="button" class="btnD btn-warning"> Agregar fila </button>
                <table class="tableL bg-info"  id="tablaL">
                <thead>
                    <tr>
                    <th scope="col">Cantidad Auxiliares</th>
                    <th scope="col">Horas academicas (hrs/mes)</th>
                    <th scope="col">Nombre Auxiliatura</th>
                    <th scope="col">Codigo Auxiliatura</th>
                    </tr>
                </thead>
                    <tr class="fila-fijaL">
                        <td><input name="cantidadL[]" placeholder="Cantidad"
                        pattern="[0-9]{1,2}" title="Solo puede ingresar numeros en este campo, el maximo de auxiliares que se permite es 99"/></td>
                        <td><input name="hrsAcademicasL[]" placeholder="Horas academicas"
                        pattern="[0-9]{1,2}" title="Solo puede ingresar numeros en este campo, el maximo de horas que se permite es 99"/></td>
                        <td><input name="nombreAuxiliatura[]" placeholder="Nombre de la auxiliatura"/></td>
                        <td><input name="codAux[]" placeholder="Codigo de la auxiliatura"/></td>
                        <td class="eliminarL"><input type="button"   value="Eliminar fila"/></td>
                    </tr>
                </table>
                <button id="adicionarL" name="adicionarL" type="button" class="btnL btn-warning"> Agregar fila </button>
            <!--</form>-->
            <br>
            <label for="requerimientosNota">Nota: </label>
            <input class = "form-control input-lg" name="notaRequerimientos" id ="notaRequerimientos" placeholder="Nota de requerimientos" value=""
            onkeyup="liveComment_notaRequerimientos(this.value)"/>
            <br>
        <label for="requisitos">Requisitos: </label>
            <table class="table bg-info"  id="tablaRequ">
                <tr class="fila-fija1">
                    <td><input required class = "form-control input-lg" name="requisito[]" placeholder="Escriba su requerimiento" value=""/></td>
                    <td class="eliminar1"><input type="button"   value="Eliminar fila"/></td>
                </tr>
            </table>

            <div class="btn-der">
                <!--<input type="submit" name="insertarrr" value="Insertar Alumno" class="btn btn-info"/>-->
                <button id="adicionall" name="adicional1" type="button" class="btn btn-warning"> Agregar fila </button>
                <br>
            </div>
            <br>
            <label for="requisitosNota">Nota: </label>
            <input class = "form-control input-lg" name="notaRequisito" id="notaRequisito" placeholder="Nota de requisitos" value=""
            onkeyup="liveComment_notaRequisitos(this.value)"/>
            <br>
            <label for="documentos">Documentos a presentar: </label>
            <table class="table bg-info"  id="tablaDoc">
                <tr class="fila-fija2">
                    <td><input required class = "form-control input-lg" name="documentos[]" placeholder="Escriba los documentos a presentar"/></td>
                    <td class="eliminar2"><input type="button"   value="Eliminar fila"/></td>
                </tr>
            </table>
            <div class="btn-der">
                <button id="adicional2" name="adicional2" type="button" class="btn btn-warning"> Agregar fila </button>
                <br>
            </div>
            <br>
            <label for="documentosNota">Nota: </label>
            <input class="form-control input-lg" name="notaDocumentos" id="notaDocumentos" placeholder="Nota de documentos" value=""
            onkeyup="liveComment_notaDocumentos(this.value)"/>
            <br>
            <label for="formadeEntrega">De la forma: </label>
            <textarea id="formaDeEntrega" rows="5" name="formaDeEntrega" style="resize:none; width:100%;" required placeholder="Escriba la forma en la que se presentaran los documentos"> </textarea>
            <!--<input required class="form-control input-lg" name="formaDeEntrega" id="formaDeEntrega" placeholder="Escriba la forma en la que se presentaran los documentos" value=""/>-->
            <br>
            <label for="fechayLugarPresentacion">Fecha y lugar de la presentacion: </label>
            <input required class="form-control input-lg" name="fechaLugarPresentacion" id="fechaLugarPresentacion" placeholder="Escriba acerca de la fecha y el lugar de presentacion" value=""/>
            <br>
            <label for="delostribunales">De los tribunales: </label>
            <input required class="form-control input-lg" name="deLosTribunales" id="deLosTribunales" placeholder="Escriba acerca de los tribunales" value=""/>
            <br>
            <label for="fechas_impLb">Acerca de las fechas a prueba: </label>
            <input class="form-control input-lg" name="fechas_imp" id="fechas_imp" placeholder="Escriba acerca de las fechas de las pruebas" value=""/>
            <br>
            <label for="cronogramaLb">Cronograma: </label>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Eventos</th>
                    <th scope="col">Fechas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Publicacion convocatoria</th>
                    <td>
                        <?php
                            date_default_timezone_set('America/La_Paz');
                            $fechaHoy=date('Y-m-d');
                            $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"));
                            $fechaMinima2=date('Y-m-d',strtotime($fechaHoy));
                        ?>
                    <label for="fechaPublicacionConvocatoria"><?php echo $fechaMinima2;?></label>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">Presentacion de documentos</th>
                    <td><label for="fechaPresentacionDocIN">Desde: </label>
                        <?php
                            date_default_timezone_set('America/La_Paz');
                            $fechaHoy=date('Y-m-d');
                            $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                        ?>
                    <input type="date" name="fechaPresentacionDocIN" id="fechaPresentacionDocIN" min="<?php echo $fechaMinima;?>" required>
                    <br>
                    <label for="fechaPresentacionDocFinLb">Hasta horas: </label>
                    <input type="time" name="fechaPresentacionDocFin" id="fechaPresentacionDocFin">
                    <br>
                    <label for="selectFechaDocLb">En: </label>
                        <select id="selectFechaDoc" name="selectFechaDoc" class="mr-2" required>
                            <option value="">General</option>
                            <option value="Departamento De Biologia">Secretaria del Departamento De Biologia</option>
                            <option value="Departamento de Ingeniería Eléctrica y Electrónica">Secretaria del Departamento de Ingeniería Eléctrica y Electrónica</option>
                            <option value="Departamento de Química">Secretaria del Departamento de Química</option>
                            <option value="Convocatoria de fisica">Secretaria del Departamento De Fisica</option>
                            <option value="Departamento de Sistemas/Informatica">Secretaria del Departamento de Sistemas/Informatica</option>
                            <option value="Departamento de Industrias">Secretaria del Departamento de Industrias</option>
                            <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Secretaria del Departamento de Ingeniería mecánica – electromecánica (DIME)</option>
                            <option value="Departamento de Matemáticas">Secretaria del Departamento de Matemáticas</option>
                            <option value="Departamento de Ingeniería Civil">Secretaria del Departamento de Ingeniería Civil</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">Publicacion de habilitados</th>
                    <td>
                        <?php
                            date_default_timezone_set('America/La_Paz');
                            $fechaHoy=date('Y-m-d');
                            $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                        ?>
                    <input type="date" name="fechaPublicacionHabilitados" id="fechaPublicacionHabilitados" min="<?php echo $fechaMinima;?>" required>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">Reclamos: </th>
                    <td><label for="fechaReclamosDesdeLb">Desde: </label>
                        <?php
                            date_default_timezone_set('America/La_Paz');
                            $fechaHoy=date('Y-m-d');
                            $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                        ?>
                    <input type="date" name="fechaReclamosDesde" id="fechaReclamosDesde" min="<?php echo $fechaMinima;?>" required>
                    <br>
                    <label for="fechaReclamosHasta">Hasta horas: </label>
                    <input type="time" name="fechaReclamosHasta" id="fechaReclamosHasta">
                    <br>
                    <label for="selectReclamosLb">En: </label>
                    <select id="selectReclamos" name="selectReclamos" class="mr-2" required>
                            <option value="">General</option>
                            <option value="Departamento De Biologia">Secretaria del Departamento De Biologia</option>
                            <option value="Departamento de Ingeniería Eléctrica y Electrónica">Secretaria del Departamento de Ingeniería Eléctrica y Electrónica</option>
                            <option value="Departamento de Química">Secretaria del Departamento de Química</option>
                            <option value="Convocatoria de fisica">Secretaria del Departamento De Fisica</option>
                            <option value="Departamento de Sistemas/Informatica">Secretaria del Departamento de Sistemas/Informatica</option>
                            <option value="Departamento de Industrias">Secretaria del Departamento de Industrias</option>
                            <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Secretaria del Departamento de Ingeniería mecánica – electromecánica (DIME)</option>
                            <option value="Departamento de Matemáticas">Secretaria del Departamento de Matemáticas</option>
                            <option value="Departamento de Ingeniería Civil">Secretaria del Departamento de Ingeniería Civil</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">Rol de pruebas</th>
                    <td>
                        <?php
                            date_default_timezone_set('America/La_Paz');
                            $fechaHoy=date('Y-m-d');
                            $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                        ?>
                    <input type="date" name="fechaRol" id="fechaRol" min="<?php echo $fechaMinima;?>" required>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">Publicacion de resultados</th>
                    <td>
                        <?php
                            date_default_timezone_set('America/La_Paz');
                            $fechaHoy=date('Y-m-d');
                            $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                        ?>
                    <input type="date" name="fechaPublicacionResultados" id="fechaPublicacionResultados" min="<?php echo $fechaMinima;?>" required>
                    </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <label for="cronogramaNota">Nota: </label>
            <input class="form-control input-lg" name="notaCronograma" id="notaCronograma" placeholder="Nota del cronograma" value=""/>
            <br>
            <label for="nombramientoLb">Del nombramiento o Seleccion: </label>
            <input required class="form-control input-lg" name="delNombramiento" id="delNombramiento" placeholder="Escriba acerca de los tribunales" value=""/>
            <br>
            <label class ="departamento" for="departamento">Departamento: </label>
            <br>
            <select id="listaDepartamento" name="listaDepartamento" class="mr-2" required>
                    <option value="">Seleccione el departamento</option>
                    <option value="Departamento De Biologia">Departamento De Biologia</option>
                    <option value="Departamento de Ingeniería Eléctrica y Electrónica">Departamento de Ingeniería Eléctrica y Electrónica</option>
                    <option value="Departamento de Química">Departamento de Química</option>
                    <option value="Convocatoria de fisica">Departamento De Fisica</option>
                    <option value="Departamento de Sistemas/Informatica">Departamento de Sistemas/Informatica</option>
                    <option value="Departamento de Industrias">Departamento de Industrias</option>
                    <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Departamento de Ingeniería mecánica – electromecánica (DIME)</option>
                    <option value="Departamento de Matemáticas">Departamento de Matemáticas</option>
                    <option value="Departamento de Ingeniería Civil">Departamento de Ingeniería Civil</option>
            </select>
            <br>
            <br>
            <label for="documentosNota">Semestre: </label>
            <select id="selectSemestre" name="selectSemestre" class="mr-2">
                <option value='I-Regular'>I-Regular</option>
                <option value='II-Regular'>II-Regular</option>
                <option value='III-Invierno'>III-Invierno</option>
                <option value='IV-Verano'>IV-Verano</option>

		    </select>
            <label for="documentosNota">Gestion: </label>
            <select id="selectGestion" name="selectGestion" class="mr-2">
                <?php
                    date_default_timezone_set('America/La_Paz');
                    $year=date('Y');
                    //echo "<option value='gestion'>Gestion</option>";
                    for($i=0; $i<10 ; $i++){
                        $yearAux=$year + $i;
                        echo "<option value='$yearAux'>$yearAux</option>";
                    }

                ?>
		    </select>
            <br>
            <label for="fechaDeExpiracion"> Fecha de Expiracion</label>
                <?php
                     date_default_timezone_set('America/La_Paz');
                     $fechaHoy=date('Y-m-d');
                     $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                ?>
                <?php
                     date_default_timezone_set('America/La_Paz');
                     $fechaHoy2=date('d-m-Y');
                ?>
            <input type="date" name="fechaDeExpiracion" id="fechaDeExpiracion" min="<?php echo $fechaMinima;?>" required>
            <!--<label for="horaDeExpiracion"> Hora de Expiracion</label>
            <input type="time" name="horaDeExpiracion" id="horaDeExpiracion">-->
            <br>
            <div class="btn-der">
                <input type="submit" onclick='alerta()' name="insertarr" value="Publicar" class="btn btn-info"/>
                <!---                        --------------------------------- -------------------->
                <!--<a type="button" onclick='sub()' name="visualizar" value="visualizar" data-toggle="modal" data-target="#miModal" class="btn btn-success">Visualizar</a>-->
                <a type="button" name="visualizar" data-toggle="modal" data-target="#miModal" class="btn btn-success">Visualizar</a>
                <!--<a class="btn btn-success ml-5" name="visualizarr" data-toggle="modal" data-target="#miModal" method='post'>Visualizar</a>-->
                <!--<a href="../formularios/generarPDF.php" class="btn btn-success ml-5" data-toggle="modal" data-target="#miModal">Visualizar</a>-->
                <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
            </div>

            <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#miModal">
                Abrir modal
            </button>-->
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
                                    <h4 class="text-center"><span id="preview_titulo" class="negrita"> </span></h4>
                                    <h4 class="text-center">============</h4>
                                    <p class='text-justify'><span id="preview_descripcion"> </p>
                                    <p class='text-justify'><span id="preview_tipoConv"> </p>
                                    <h5><?php $indice = 1; echo $indice.".- "; $indice++ ;?>Requerimientos</h5>
                                    <!-- tabla para Auxiliatur a de Docencia -->

                                    <p class='text-justify'><span id=preview_notaRequerimientos> </p>

                                    <h5><?php echo $indice.".- "; $indice++ ;?>Requisitos</h5>
                                    <ol type="A">
                                        <?php
                                            foreach ($requisitos as $requisito){
                                                echo  "<li>".$requisito->descripcion_requisito."</li>";
                                            }
                                        ?>
                                    </ol>

                                    <p class='text-justify'><span id=preview_notaRequisitos> </p>

                                    <h5><?php echo $indice.".- "; $indice++ ;?>Documentos a presentar</h5>

                                    <p class='text-justify'><span id=preview_notaDocumentos> </p>

                                    <h5><?php echo $indice.".- "; $indice++ ;?>FORMA DE PRESENTACION</h5>

                                    <h5><?php echo $indice.".- "; $indice++ ;?>LUGAR Y FECHA DE PRESENTACION</h5>

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

                                    <h5><?php echo $indice.".- "; $indice++ ;?>TRIBUNALES</h5>

                                    <h5><?php echo $indice.".- "; $indice++ ;?>FECHAS DE LAS PRUEBAS</h5>

                                    <h5><?php echo $indice.".- "; $indice++ ;?>NOMBRAMIENTO</h5>
                                    <p class='text-justify'><?php echo $nombramientoConvocatoria; ?></p>
                                    <p class="text-center">Cochabamba, <?php echo $fechaHoy2 ; ?></p>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php include 'visualizarPublicacion.php'; ?>
        <script type="text/javascript">
            //function liveComment_titulo(texto)
			//{
				//document.getElementById('preview_titulo').innerHTML = texto;
			//}
            function liveComment_descripcion(texto)
			{
				document.getElementById('preview_descripcion').innerHTML = texto;
			}
            function liveComment_tipoConv(texto)
			{
				document.getElementById('preview_tipoConv').innerHTML = texto;
			}
            function liveComment_notaRequerimientos(texto)
			{
                if( texto == ''){
                    $notaR = " ";
                }else{
                    $notaR = "Nota.- "+texto;
                }
                document.getElementById('preview_notaRequerimientos').innerHTML = $notaR;
			}
            function liveComment_notaRequisitos(texto)
			{
                if( texto == ''){
                    $notaR = " ";
                }else{
                    $notaR = "Nota.- "+texto;
                }
				document.getElementById('preview_notaRequisitos').innerHTML = $notaR;
			}
            function liveComment_notaDocumentos(texto)
			{
                if( texto == ''){
                    $notaR = " ";
                }else{
                    $notaR = "Nota.- "+texto;
                }
				document.getElementById('preview_notaDocumentos').innerHTML = $notaR;
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
            //$convocatoria = new Convocatoria();
            //$guardar=$convocatoria->guardarConvocatoria($idConvMaxFinal);
            include '../formularios/generarPDF.php';
            include '../formularios/form_subirPublicacion.php';
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
