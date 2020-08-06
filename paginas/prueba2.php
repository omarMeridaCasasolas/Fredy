<html>
<head>

<script type="text/javascript">
function alerta()
    {
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}
</script>

</head>
<body>

<form>
<input type="button"
onclick="alerta()"
value="Activar Función">
</form>

<p>Presiona el botón y saldra una alerta contenida dentro de una función.</p>


<?php
    # La lista de nombres; por defecto vacía
    $nombres = [];
    # Si hay nombres enviados por el formulario; entonces
    # la lista es el formulario.
    # Cada que lo envíen, se agrega un elemento a la lista
    if (isset($_POST["nombres"])) {
        $nombres = $_POST["nombres"];
    }
    # Detectar cuál botón fue presionado
    # Más info: https://parzibyte.me/blog/2019/07/23/php-formulario-dos-botones/
    # En caso de que haya sido el de guardar, no agregamos más campos
    if (isset($_POST["guardar"])) {
        # Quieren guardar; no quieren agregar campos
        echo "OK se guarda lo siguiente:<br>";
        print_r($nombres);
        exit;
    }
    ?>
    <form method="post" action="prueba.php">
        <!--Comienza el ciclo que dibuja los campos dinámicos-->
        <?php foreach ($nombres as $nombre) { ?>
            <input value="<?php echo $nombre ?>" type="text" name="nombres[]">
            <br><br>
        <?php } ?>
        <!--Termina el ciclo que dibuja los campos dinámicos-->

        <!--Fuera de la lista tenemos siempre este campo, es el primero-->
        <input autocomplete="off" autofocus value="" type="text" name="nombres[]">
        <br><br>
        <button name="agregar" type="submit">Agregar campo</button>
        <button name="guardar" type="submit">Guardar lista</button>
    </form>

    <div class="form-group mx-5">             
                <?php
                    $requisitos = [];
                    $requerimientos = [];
                    # Cada que lo envíen, se agrega un elemento a la lista
                    if (isset($_POST["requerimientos"])) {
                        $requerimientos = $_POST["requerimientos"];
                    }
                    if (isset($_POST["requisitos"])) {
                        $requisitos = $_POST["requisitos"];
                    }
                ?>
                    <form method="post" action="prueba2.php">
                        <?php
                        $indicesRequerimientos = array('a)', 'b)', 'c)', 'd)', 'e)', 'f)', 'g)', 'h)', 'i)', 'j)', 'k)', 'l)', 'm)', 'n)', 'o)', 'p)', 'q)', 'r)', 's)', 't)');
                        $cantRequerimientos = -1;
                        $limiteRequerimientos = 3;
                        $idRequerimientos = 0;
                        $indicesRequisitos = array('a)', 'b)', 'c)', 'd)', 'e)', 'f)', 'g)', 'h)', 'i)', 'j)', 'k)', 'l)', 'm)', 'n)', 'o)', 'p)', 'q)', 'r)', 's)', 't)');
                        $cantRequisitos = -1;
                        $limiteRequisitos = 3;
                        $idRequisitos = 0;
                        ?>
                        <!--Comienza el ciclo que dibuja los campos dinámicos-->
                        <label for="requerimientos">Requerimientos: </label>
                        <br>
                        <?php        
                        if (isset($_POST["agregar1"])) {      
                            
                            foreach ($requerimientos as $requerimiento) { $cantRequerimientos++; $idRequerimientos++;
                                if($cantRequerimientos < $limiteRequerimientos){
                                    echo "<label for='requerimientoInd'>".$indicesRequerimientos[$cantRequerimientos]." </label>";
                                    echo "<input value='".$requerimiento."' type='text' name='requerimientos[]'>";
                                    echo "<br><br>";
                                }
                                if($cantRequerimientos >= $limiteRequerimientos){
                                    echo '<script language="javascript">';
                                    echo 'alert("La convocatoria no puede tener mas de 20 requerimientos")';
                                    echo '</script>';
                                }                              
                            }
                            echo '<input autocomplete="off" autofocus value="" type="text" name="requerimientos[]">';
                            echo '<button name="agregar1" type="submit">Agregar campo</button>';
                            echo '<br><br>';

                            echo '<label for="requisitos">Requisitos: </label>';
                            echo '<br>';
                                foreach ($requisitos as $requisito) {
                                    if($cantRequisitos>-1){
                                        echo "<label for='requisitoInd'>".$indicesRequisitos[$cantRequisitos]." </label>";
                                        echo "<input value='".$requisito."' type='text' name='requisitos[]'>";
                                        echo "<br><br>";                                
                                    }                                 
                                } 
                            //echo '<input autocomplete="off" autofocus value="" type="text" name="requisitos[]">';
                            //echo '<button name="agregar2" type="submit">Agregar campo</button>';
                            //echo "<br><br>";
                        }
                        ?>
                        <input autocomplete="off" autofocus value="" type="text" name="requerimientos[]">
                        <button name="agregar1" type="submit">Agregar campo</button>
                        <br><br>
                        
                        <label for="requisitos">Requisitos: </label>
                        <br>
                        <?php 
                        if (isset($_POST["agregar2"])) {
                            foreach ($requerimientos as $requerimiento) {
                                if($cantRequerimientos>-1){
                                    echo "<label for='requerimientoInd'>".$indicesRequerimientos[$cantRequerimientos]." </label>";
                                    echo "<input value='".$requerimiento."' type='text' name='requerimientos[]'>";
                                    echo "<br><br>";
                                }
                            }
                            echo '<input autocomplete="off" autofocus value="" type="text" name="requerimientos[]">';
                            echo '<button name="agregar1" type="submit">Agregar campo</button>';
                            echo '<br><br>';
                            
                            echo '<label for="requisitos">Requisitos: </label>';
                            echo '<br>';                          
                            foreach ($requisitos as $requisito) { $cantRequisitos++; $idRequisitos++;
                                if($cantRequisitos < $limiteRequisitos){
                                    echo "<label for='requisitoInd'>".$indicesRequisitos[$cantRequisitos]." </label>";
                                    echo "<input value='".$requisito."' type='text' name='requisitos[]'>";
                                    echo "<br><br>";
                                }
                                if($cantRequisitos >= $limiteRequisitos){
                                    echo '<script language="javascript">';
                                    echo 'alert("La convocatoria no puede tener mas de 20 requisitos")';
                                    echo '</script>';
                                }
                            }   
                            //echo '<input autocomplete="off" autofocus value="" type="text" name="requisitos[]">';
                            //echo '<button name="agregar2" type="submit">Agregar campo</button>';
                            //echo "<br><br>";
                        }                     
                        ?>
                        <input autocomplete="off" autofocus value="" type="text" name="requisitos[]">
                        <button name="agregar2" type="submit">Agregar campo</button>
                        <br><br>
                    </form>
        </div>

</body>
</html>
