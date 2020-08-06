/* 
 * @autor: henryzrr
 * Este archivo se encarga de administrar la búsqueda dinámica en la vista de docentes.
 */

var listaDocentes;
var busquedaPreparada = false;
var tamListaDocentes;
var noEraEspacio=true;
var materiasMostradas=new Set();

var acentos = [["Á","a"],["É","e"],["Í","i"],["Ó","o"],["Ú","u"],["á","a"],["é","e"],["í","i"],["ó","o"],["ú","u"],["Ü","u"],["ä","a"], 
    ["Ä","a"],["ö","o"], ["Ö","o"], ["ü","u"],["A","a"],["B","b"],["C","c"],["D","d"],["E","e"],["F","f"],["G","g"],["H","h"],["I","i"],["J","j"],["K","k"]
    ,["L","l"],["M","m"],["N","n"],["Ñ","ñ"],["O","o"],["P","p"],["Q","q"],["R","r"],["S","s"],["T","t"],["U","u"],["V","v"],["W","w"],["X","x"],["Y","y"],["Z","z"]];
var manejadorAcentos=new Map(acentos);

//funcion que carga los docentes disponibles y sus materias
function prepararBusqueda(docentes){
    
    tamListaDocentes = docentes.length;
    listaDocentes = new Array(tamListaDocentes);
    var nombre_docente;
    var id_docente;
    var id_materias;
    var materias;
    var objeto_docente;
    var tipo;
    for(var i=0;i<tamListaDocentes;i++){
        nombre_docente  = docentes[i].titulo+" "+docentes[i].apellidoPaterno+" "+docentes[i].apellidoMaterno+" "+docentes[i].nombre;
        nombre_docente = formatear_cadenas_preparacion_busqueda(nombre_docente);
        id_docente = "doc_"+docentes[i].codigo;
        id_materias = "mat_"+docentes[i].codigo;
        tipo=docentes[i].tipo;
        materias = formatear_todas_las_materias(docentes[i].materias);
        objeto_docente = {"tipo":tipo,"nombre_docente":nombre_docente,"id_docente":id_docente,"id_materias":id_materias,"materias":materias};
        listaDocentes[i]=objeto_docente;
    }
    busquedaPreparada = true;
}
//funcion auxiliar usada para cargar las materias de cada docente
function formatear_todas_las_materias(materias){
    var nroMaterias = materias.length;;
    if(nroMaterias===0){
        return [];
    }
    var lista_materias=new Array(nroMaterias);
    for(var i=0;i<nroMaterias;i++){
        lista_materias[i]=formatear_cadenas_preparacion_busqueda(materias[i].nombre);
    }
    return lista_materias;
}
//funcion que elimina tildes y mayusculas de una cadena dada
function formatear_cadenas_preparacion_busqueda(cadena){
    var cadena_formateada="";
    var tam_cadena = cadena.length;
    for(var i=0;i<tam_cadena;i++){
        if(manejadorAcentos.has(cadena[i])){
            cadena_formateada=cadena_formateada+manejadorAcentos.get(cadena[i]);
        }else{
            cadena_formateada=cadena_formateada+cadena[i];
        }
    }
    return cadena_formateada;
}
//funcion que redirige el filtrado por docente o materia, esta funcion se llama desde el jsp
function filtrar_docente(input,opcion,event){
    var  tecla_presionada= event.keyCode;
    
    var opcionSeleccionada = opcion.value;
    if(opcionSeleccionada==="materia"){
        filtrar_docente_por_materia(input,tecla_presionada);
    }else{
        filtrar_docente_por_nombre(input,tecla_presionada);
    }
}

//filtrar docentes por materia de manera dinámica
function filtrar_docente_por_materia(input,ultimaTeclaPresionada){
    var filtro = formatearTextoIngresado(input.value);
    if (filtro.length===0){
        if(ultimaTeclaPresionada!==32 && noEraEspacio){
            mostrar_todos();
            noEraEspacio=false;
        }else{
           noEraEspacio = false; 
        }
        
    }else{
        noEraEspacio=true;
        var idDocente;
        var docente;
        var pintadoParcial=1;
        var pintadoTotal=1;
        for(var i=0;i<tamListaDocentes;i++){
            idDocente = listaDocentes[i].id_docente;
            docente = document.getElementById(idDocente);
            if(daLaMateria(listaDocentes[i],filtro)===true){
                docente.style.display="";
                if(listaDocentes[i].tipo==="1"){
                    pintarBarraDocenteYsusMaterias(listaDocentes[i].id_materias,docente,pintadoTotal++);                   
                }else{
                    pintarBarraDocenteYsusMaterias(listaDocentes[i].id_materias,docente,pintadoParcial++);      
                }
            }else{
                docente.style.display="none";
            }
        }
        restablecerVistaDocentes();
    }
    
}
//funcion auxiliar a busqueda de docentes por materia, sirve para ver si las materias de un docente tiene coincidencia con el filtro
function daLaMateria(docente,filtro){
    var nroMaterias = docente.materias.length;
    var i=0;
    var daMateria=false;
    while(!daMateria && i<nroMaterias){
        if(docente.materias[i++].includes(filtro)){
            daMateria=true;
        }
    }
    return daMateria;
}
//funcion para listar docentes de manera dinámica
function filtrar_docente_por_nombre(input,ultimaTeclaPresionada){
    var filtro = formatearTextoIngresado(input.value);
    if (filtro.length===0){
        if(ultimaTeclaPresionada!==32 && noEraEspacio){
            mostrar_todos();
            noEraEspacio=false;
        }else{
           noEraEspacio = false; 
        }
        
    }else{
        noEraEspacio=true;
        var nombre_docente;
        var docente;
        var pintado=1;
        var pintadoParcial=1;
        var pintadoTotal=1;
        
        for(var i=0;i<tamListaDocentes;i++){
            nombre_docente  = listaDocentes[i].nombre_docente;
            docente = document.getElementById(listaDocentes[i].id_docente);
            if(!nombre_docente.includes(filtro)){
                docente.style.display="none";
            }else{
                docente.style.display="";
                if(listaDocentes[i].tipo==="1"){
                    pintarBarraDocenteYsusMaterias(listaDocentes[i].id_materias,docente,pintadoTotal++);                   
                }else{
                    pintarBarraDocenteYsusMaterias(listaDocentes[i].id_materias,docente,pintadoParcial++);      
                }
            }
        }
        restablecerVistaDocentes();
    }
    
}
//funcion auxiliar que elimina espacios innecesarios en el input ingresado
function formatearTextoIngresado(input){
    var tamanho_input = input.length;
    var un_espacio = true;
    var input_final="";
    var fin_cadena=tamanho_input-1;
    for(var i=0;i<tamanho_input;i++){
        if(input[i]===" "){
            if(!un_espacio && i<fin_cadena){
                input_final=input_final+" ";
                un_espacio=true;
            }
        }else{
            if(manejadorAcentos.has(input[i])){
                input_final=input_final+manejadorAcentos.get(input[i]);
            }
            else{
                input_final=input_final+input[i];
            }
            un_espacio=false;
        }
    }
    if(input_final[input_final.length-1]===" "){
        input_final = input_final.substring(0,input_final.length-1);
    }
    return input_final;
}

//funcion auxiliar que sirve para mostrar todos los docentes en la vista
function mostrar_todos(){
    var docente;
    var id_docente;
  
    restablecerVistaDocentes();
    var pintadoParcial=1;
    var pintadoTotal=1;
    for(var i=0;i<tamListaDocentes;i++){
        id_docente = listaDocentes[i].id_docente;
        docente = document.getElementById(id_docente);
        docente.style.display="";
        if(listaDocentes[i].tipo==="1"){
            pintarBarraDocenteYsusMaterias(listaDocentes[i].id_materias,docente,pintadoTotal++);                   
        }else{
            pintarBarraDocenteYsusMaterias(listaDocentes[i].id_materias,docente,pintadoParcial++);      
        }
    }
    
}
//funcion que restablece a su formato original mas materias desplegadas por cada docente
function restablecerVistaDocentes(){
    var materiasDesplegadas = Array.from(materiasMostradas);
    var tamMateriasDesplegadas = materiasDesplegadas.length;
   
    for(var i=0;i<tamMateriasDesplegadas;i++){
        materiasDesplegadas[i].style.display="none";
    }
    materiasMostradas.clear();
}
//funcion que configura los parametros de busqueda, si por materia o docente 
function buscar_docente(input,contenedorOpciones,opcionSeleccionada){
    input.style.display="";
    contenedorOpciones.value=opcionSeleccionada;
    input.value="";
    mostrar_todos();
}


//funcion que pinta la barra del nombre del docente y sus materias
function pintarBarraDocenteYsusMaterias(id_sector_materia,docente,pintado){
    var sectorMaterias = document.getElementById(id_sector_materia);
    if(pintado&1){
        docente.style.backgroundColor="#eee";
        sectorMaterias.style.backgroundColor="#eee";
    }else{
        docente.style.backgroundColor="";
        sectorMaterias.style.backgroundColor="";
    }
}

//funcion para obtener json de docentes 
function cargarDocentes(docentes_tipo1,docentes_tipo2){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            docentes = JSON.parse(xhttp.responseText);
            mostrarDocentes(docentes,docentes_tipo1, docentes_tipo2);
            setEstilos();
            prepararBusqueda(docentes.docentes);
        }
    };
    xhttp.open("GET", "api/docente_materia", true);
    xhttp.send(); 
}

//dibuja docentes recibidos en json por el ajax

function mostrarDocentes(jsonDocentes, div1,div2){
    var i=0;
    var tamDocentes=jsonDocentes.docentes.length;
    añadirTitulosTipoDocente(div1,div2);
    for(i;i<tamDocentes;i++){
        setDocenteEnPantalla(div1,div2,jsonDocentes.docentes[i]);
    }
}

//funcion que pone los docentes recuperados en pantalla
function setDocenteEnPantalla(tipo1,tipo2,docente){
    var contenedor = document.createElement("div");
    contenedor.setAttribute("class","contenedor");
    contenedor.setAttribute("data-toggle","collapse");
    contenedor.setAttribute("data-target","#mat_"+docente.codigo);
       
    var contenedorDocente = document.createElement("div");
    contenedorDocente.setAttribute("class","row mt-2");
    contenedorDocente.setAttribute("id","doc_"+docente.codigo);
    var contenedorMaterias = document.createElement("div");
    contenedorMaterias.setAttribute("class","mt-2 tabla-materias");
    contenedorMaterias.style.display="none";
    contenedorMaterias.setAttribute("id","mat_"+docente.codigo);
    setDocente(contenedorDocente,docente,docente.materias.length,docente.codigo);
    setMateriasEnPantalla(contenedorMaterias,docente.materias);
    
    contenedor.appendChild(contenedorDocente);
    contenedor.appendChild(contenedorMaterias);
    
    if(docente.tipo==="1"){
        tipo1.appendChild(contenedor);
    }else{
        tipo2.appendChild(contenedor);
    }
}
//funcion que pone un dodente en pantalla
function setDocente(contenedor, docente,numeroMaterias,idContenedorMaterias){
    var contenedorNombre = document.createElement("div");
    contenedorNombre.setAttribute("class","col-sm-8 ");
    var contenedorOpciones = document.createElement("div");
    contenedorOpciones.setAttribute("class","col-sm-4");
    var nombreDocente = document.createElement("a");
    nombreDocente.innerHTML=docente.titulo+" "+docente.apellidoPaterno+" "+docente.apellidoMaterno+" "+docente.nombre;
    nombreDocente.setAttribute("href","rep_docente.jsp?codigo="+docente.codigo);
    
    contenedorNombre.appendChild(nombreDocente);
    
    if(numeroMaterias>0){
        var botonOpciones = document.createElement("a");
        botonOpciones.innerHTML="Mostrar Materias";
        botonOpciones.setAttribute("href","#");
        botonOpciones.setAttribute("onclick","mostrar_ocultarMaterias(this,event,mat_"+idContenedorMaterias+")");
        botonOpciones.setAttribute("value","1");
        contenedorOpciones.appendChild(botonOpciones);
        
    }
    contenedor.appendChild(contenedorNombre);
    contenedor.appendChild(contenedorOpciones);

}

//funcion que pone las materias para cada docente en el contenedor respectivo
function setMateriasEnPantalla(contenedor,materias){
    var numeroMaterias = materias.length;
    if(numeroMaterias>0){
       var titulo = document.createElement("h6");
        titulo.innerHTML="Materias Designadas";
        titulo.setAttribute("class","titulo-materia");
        contenedor.appendChild(titulo);
        var lista = document.createElement("td");
        lista.setAttribute("class","lista-materias");                
        for(var i=0;i<numeroMaterias;i++){
            var elem = document.createElement("tr");
            elem.innerHTML=(i+1)+".-"+"<a href=\"api/recursos?id="+materias[i].codigo_doc_mat+"\">"+materias[i].nombre+"</a>";
            lista.appendChild(elem);            
        }
        contenedor.appendChild(lista);    
    }
    
}

//funcion que pone los titulos para las secciones correspondientes
function añadirTitulosTipoDocente(div1,div2){
    //añadiendo titulo docentes de tiempo parcial
    var divTituloTipo1 = document.createElement("div");
    var tituloTipo1 = document.createElement("h5");
    tituloTipo1.innerHTML="Docentes de Tiempo Completo";
    divTituloTipo1.appendChild(tituloTipo1);
    div1.appendChild(divTituloTipo1);
    
    //añadiendo docentes de tiempo completo
    var divTituloTipo2 = document.createElement("div");
    var tituloTipo2 = document.createElement("h5");
    tituloTipo2.innerHTML="Docentes de Tiempo Parcial";
    divTituloTipo2.appendChild(tituloTipo2);
    div2.appendChild(divTituloTipo2);
}
//pone estilos en la pagina una vez cargados los docentes
function setEstilos(){
    var elementos = document.getElementsByClassName("contenedor");
    
    var numeroElementos = elementos.length;
    for(let i=0;i<numeroElementos;i++){
        if((i&1)===0){
            var docente = elementos[i].children[0];
            var materia = elementos[i].children[1];
            docente.style.backgroundColor="#eeeeee";
            materia.style.backgroundColor="#eeeeee";
        }else{
            
        }
    }
}
//funcion para mostrar y ocultar materias de cada docente
function mostrar_ocultarMaterias(boton,event,contenedor){
    event.preventDefault();
    if(boton.getAttribute("value")==="1"){
        contenedor.style.display="";
        contenedor.style.backgroundColor="#dfe2f9";
        boton.innerHTML="Ocultar Materias";
        boton.setAttribute("value","0");        
        materiasMostradas.add(contenedor);
    }else{
        contenedor.style.display="none";
        boton.innerHTML="Mostrar Materias";
        boton.setAttribute("value","1");        
        materiasMostradas.delete(contenedor);
    }
}
