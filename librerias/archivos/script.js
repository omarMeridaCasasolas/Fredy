/*
Funcion para mostrar la Fecha Actual.
*/

$( document ).ready(function() {
    
    /* actualizar posición de footer al redimensionar la pantalla si el bosy es demasiado pequeño */
    $(window).resize(function() {
        ajustarFooter();
    });
    
});

function fecha()
{
	var days=new Array(8);
	days[1]="Domingo";
	days[2]="Lunes";
	days[3]="Martes";
	days[4]="Mi&eacute;coles";
	days[5]="Jueves";
	days[6]="Viernes";
	days[7]="S&aacute;bado";
	var months=new Array(13);
	months[1]="Enero";
	months[2]="Febrero";
	months[3]="Marzo";
	months[4]="Abril";
	months[5]="Mayo";
	months[6]="Junio";
	months[7]="Julio";
	months[8]="Agosto";
	months[9]="Septiembre";
	months[10]="Octubre";
	months[11]="Noviembre";
	months[12]="Diciembre";
	var time=new Date();
	var lmonth=months[time.getMonth() + 1];
	var ldays=days[time.getDay() + 1];
	var date=time.getDate();
	var year=time.getYear();
	if (year < 2000)
	year = year + 1900;
        document.write("Cochabamba - Bolivia " + ldays + " " + date + " " + lmonth + " " + year);
}

/*
    Funcion para Imprimir la Pagina Actual.
*/
function imprimir() 
{
    window.print();  
}

/*
    Funcion para Retornar a la Pagina Anterior.
*/
function atras() 
{
    history.back();
}

/* 
   Funcion para los menus - Abri o cerrar, cuando sea el caso
*/
function accionMenu( cual )
{
	obj = document.getElementById( cual );
	if( obj.style.visibility == "visible" ){
		obj.style.visibility = "hidden";
		obj.style.position = "absolute";
	}
	else{
		obj.style.visibility = "visible";
		obj.style.position = "relative";	
	}
}

/*
   Funcion para los menus - Abrir con el Mouse Automaticamente
*/
function entroMenu( cual ){
  	document.getElementById(cual).style.visibility = 'visible'
	document.getElementById(cual).style.position = 'relative'
}

/*
   Funcion para los menus - Cerrar con el Mouse Automaticamente
*/
function salioMenu( cual ){
	document.getElementById(cual).style.visibility = 'hidden'
	document.getElementById(cual).style.position = 'absolute'
}

/* 
   Funcion que verifica todo el formulario
   que tengan datos en sus campos     
*/

 function check(form) {
	for (i=0; i<form.elements.length; i++ ) { 
	  if ( form.elements[i].value=="" ) {
		alert(	"Favor de llenar el campo #"+(i+1)+
			" ("+form.elements[i].name+")");
		return false;
	  }
	}
        return true;
}

/*
   Funcion que valida si el parametro enviado es
   un numero 
*/
function validarNumero(e,longi) {
   var charCode
    if (navigator.appName == "Netscape") // Veo si es Netscape o Explorer (mas adelante lo explicamos)
        charCode = e.which // leo la tecla que ingreso
    else
        charCode = e.keyCode // leo la tecla que ingreso
    status = charCode 
    if (charCode > 31 && (charCode < 48 || charCode > 57)) { // Chequeamos que sea un numero comparandolo con los valores ASCII
       alert("Los datos deben ser numericos!!")
       return false
       }
    if (longi.length > 6) 
   {
   alert("El parametro es muy grande !!")
   return false
    }
   return true
}
/*
   Funcion que verifica si el parametro enviado 
   es un correo valido 
*/

function validarEmail(email) {
 caracNoValidos = " /:,;";
 if(email == ""){ 
   alert('ï¿½Debe de ingresar un correo?');
   return false;
} // debe rellenarse
 
 for(i = 0; i < caracNoValidos.length; i++) {
// ï¿½hay algï¿½n carï¿½cter no vï¿½lido?
     caracMal = caracNoValidos.charAt(i);
    if(email.indexOf(caracMal,0) > -1) {
        alert('Debe de ingresar caracteres validos');
  	return false;
    }
}
posArroba = email.indexOf("@",1); // debe haber una @
if(posArroba == -1) {
 alert('ï¿½Debe de ingresar una @ ?');
 	return false;
}
if(email.indexOf("@",posArroba+1) != -1) {
  alert('Debe de ingresar una @ '); 
  	return false;
 }// y sï¿½lo una
posPunto = email.indexOf(".",posArroba);
if(posPunto == -1) {
  alert('Debe de ingresar al menos un . despues de la @ ');
  	return false;
 }// y al menos un . despuï¿½s de la @
if(posPunto+3 > email.length){
   alert('Debe de ingresar al menos 2 caracteres tras el . ');
   	return false;
 }// debe haber al menos 2 caracteres tras el .
return true;
}

/*
   Funcion que verifica si el parametro enviado 
   es una cadena 
*/

function validarCadena(campo,cadena) {
  var cadenaOK = "ABCDEFGHIJKLMNï¿½OPQRSTUVWXYZï¿½ï¿½ï¿½ï¿½ï¿½" + 
                "abcdefghijklmnï¿½opqrstuvwxyzï¿½ï¿½ï¿½ï¿½ï¿½ ";
  
  var allValid = true; 
  for (i = 0; i < cadena.length; i++) {
    ch = cadena.charAt(i); 
    for (j = 0; j < cadenaOK.length; j++)
      if (ch == cadenaOK.charAt(j))
        break;
    if (j == cadenaOK.length) { 
      allValid = false; 
      break; 
    }
  }
  if (!allValid) { 
    alert('Debe de escribir sï¿½lo letras en el campo '); 
	campo.focus();
	campo.select();
    return false;
  } 
  return true; 
}

/*
   Funcion que cambia el color
   de todo una fila
*/

function cambiarColor(e)
{
 if(e.checked)
  cambiarColor1(e);
 else
  cambiarColor2(e);
}

/*
   Funcion que cambia el color
   de todas las filas
*/ 
  
function cambiarColorTodos(formulario)
 {
  for (var i=0;i<formulario.elements.length;i++)
   {
   var e = formulario.elements[i];
    if ((e.name != 'checkbox0') && (e.type=='checkbox'))
     {
      e.checked = formulario.checkbox0.checked;
      if (formulario.checkbox0.checked)
       {
        cambiarColor1(e);
       }
      else
       {
        cambiarColor2(e);
       }
     }
  }
}


function cambiarColor1(E)
 {
    while (E.tagName!="TR")
     {
      E=E.parentElement;
     }
   
  E.className = "subtituloC";
}

function cambiarColor2(E)
 {
   while (E.tagName!="TR")
   {
    E=E.parentElement;
   }

 E.className = "subtituloB";
}

//------- Switch Sectores (Ocultar o Mostrar Sectores de Codigo HTML) --------

function switchSector(indice){
  var link_mostrar = document.getElementById("link_mostrar_"+indice);
  var sector = document.getElementById("sector_"+indice);
  var link_ocultar = document.getElementById("link_ocultar_"+indice);
  if( sector.style.visibility == "visible" ){
	sector.style.visibility = "hidden";
	sector.style.position = "absolute";
	link_mostrar.style.visibility = "visible";
	link_mostrar.style.position = "relative";
	link_ocultar.style.visibility = "hidden";
	link_ocultar.style.position = "absolute";
        sector.style.display = "none";
        link_mostrar.style.display = "";
   }
   else{
	link_mostrar.style.visibility = "hidden";
	link_mostrar.style.position = "absolute";
	sector.style.visibility = "visible";
	sector.style.position = "relative";
	link_ocultar.style.visibility = "visible";
	link_ocultar.style.position = "relative";
        sector.style.display = "";
        link_mostrar.style.display = "block";
   }
}

//********************************************************************************************
//------------------------------ Para los avisos del index -----------------------------------
//********************************************************************************************
var tamAvisos = 0;   //Tamaï¿½o por defecto para todos los avisos, sera cambiado como la primera accion
var numAvisos = 0;     //El numero de avisos tiene la pagina
var pos = 0;           //Posicion para la rotacion  
var tamAviso = 0;    //El tamaï¿½o maximo que puede tener un aviso      
var avisos_mostrados;     //Un arreglo para los nombres de los avisos existentes

var ultimoAviso;    //Una cadena con el nombre del ultimo aviso
var avisoCola;      //Es el nombre del aviso que ira a la cola del arreglo, para simular el arreglo circular
var tiempoEspera;   //El tiempo de espera que se realize la siguiente iteracion
var tiempoPausa;    //El tiempo que se espera cuando existe una pausa
var tiempoRotacion; //El tiempo que se espera para el movimiento de los avisos
var incrementoPos   //El incremento o decremento para acelerar el movimiento de los avisos

var nombre_img;     //El nombre del elemento HTML IMG que se hace menos opaco
var nombre_img_salir;   //El nombre del elemento HTML IMG que se hace mas opaco, hasta su punto inicial
var sin_control;      //Booleano que me indica si se esta ejerciendo algun control sobre la animacion o no
var arriba;         //Boolean que me indica el sentido de la rotacion, por defecto arriba
var ciclo;         //Variable que me sirve para identificar la llamada al ciclo de rotacion
var firefox         // Booleano que me sirva para saber si se esta usando navegador firefox o no



function initAvisos_mostrados(){
    for(i=0; i<numAvisos; i++ )
        avisos_mostrados[i] = "aviso"+i;

    tiempoEspera = 200;
}

function setNumAvisos( num ){
  numAvisos = num;
  avisos_mostrados = new Array( numAvisos );
  tiempoRotacion = 70;
  tiempoPausa = 5000;
  sin_control = true;
  incrementoPos = 1;
  arriba = true;
  firefox = false;
  detectBrowser();
  initAvisos_mostrados();
}

function setTamAviso( tam ){
    //alert(screen.height);
    //alert(screen.width);
  tamAviso = tam;
  tamAvisos = tamAviso*3;       //Mostrare 3 avisos como maximo
}

function moverAvisos(){  
   if( numAvisos > 3 ){ 
   if( pos == 0 || pos == (tamAviso*(-1)))
        tiempoEspera = tiempoRotacion;
   
   if( arriba ){
      pos-= incrementoPos;      
      if( pos < (tamAviso*(-1))) {
        pos = 0;
      avisoCola = avisos_mostrados[0];
      for(j=0; j<numAvisos-1; j++)
        avisos_mostrados[j] = avisos_mostrados[j+1];
      avisos_mostrados[numAvisos-1] = avisoCola;
      if(sin_control)
        tiempoEspera = tiempoPausa;
      }
   }
   else {
      pos+= incrementoPos;
      if( pos > 0 ){
        pos = (tamAviso*(-1));        
        avisoCabeza = avisos_mostrados[numAvisos-1];
        for(j=numAvisos; j>0; j--)
          avisos_mostrados[j] = avisos_mostrados[j-1];
        avisos_mostrados[0] = avisoCabeza; 
        if(sin_control)
          tiempoEspera = tiempoPausa;
      }
   }
   for(i=0; i<numAvisos; i++){
     var aviso = document.getElementById( avisos_mostrados[i] );
     aviso.style.position = "absolute";
     aviso.style.top = (pos+tamAviso*i)+"px";
   }
    ciclo = setTimeout("moverAvisos()", tiempoEspera);
   }
 }
 

function control_aviso(img){    
    if( img != null ) {
        cambiar_velocidad(img);
        salir_todos();
        nombre_img = img;   
        if(ciclo > 0) {
          clearTimeout(ciclo);    
          ciclo = -1;
          moverAvisos();
        }
    }
    sin_control = false;
    
    var aviso_img = document.getElementById( nombre_img );
    if( firefox ) {
      aviso_img.style.opacity = ( Number(aviso_img.style.opacity)+0.1);        
    }
    else { 
      //document.getElementById( "pos" ).value = Number ( aviso_img.style.filter.substring(14, 16) );
      if(  Number ( aviso_img.style.filter.substring(14, 16)) + 10 < 99 ) 
          aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) +10 )+")";
      else 
          aviso_img.style.filter = "alpha(opacity=99)";
    }
    if( firefox ) {
      if( aviso_img.style.opacity < 1){        
          setTimeout("control_aviso()", 50);        
      }    
    } else {
        if( Number ( aviso_img.style.filter.substring(14, 16)) < 99 ){
          setTimeout("control_aviso()", 50);           
        } else {
          aviso_img.style.filter = "alpha(opacity=99)";
          //document.getElementById( "pos" ).value = "***********";
        }
    }
}

function control_salir_aviso(img){
    if( img != null ) {
        nombre_img_salir = img;
        if(ciclo > 0){
          clearTimeout(ciclo);        
          ciclo = -1;
          moverAvisos();
        }
    }
    sin_control = true;
    var aviso_img = document.getElementById( nombre_img_salir );
    if ( firefox ){
    aviso_img.style.opacity = ( Number(aviso_img.style.opacity)-0.1);    
    } else { 
      //document.getElementById( "pos" ).value = Number ( aviso_img.style.filter.substring(14, 16) );
      aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) -10 )+")";
    }
    if ( firefox ) {
      if( aviso_img.style.opacity > 0.3) { 
          setTimeout("control_salir_aviso()", 50);
      }
      else {
          aviso_img.style.opacity = 0.3;
      }        
    } else {
        if( Number ( aviso_img.style.filter.substring(14, 16)) > 29 ){
          setTimeout("control_salir_aviso()", 50);           
        } else {
            aviso_img.style.filter = "alpha(opacity=29)";
            //document.getElementById( "pos" ).value = "***********";
        }            
    }
}

function cambiar_velocidad( imagen ){    
switch (imagen) {
    case "masarriba": 
        tiempoRotacion = 10;
        incrementoPos = 4;
        arriba = true;
        break;
    case "arriba": 
        tiempoRotacion = 30;
        incrementoPos = 2;
        arriba = true;
        break;
    case "alto": 
        incrementoPos = 0;
        arriba = true;
        break;
    case "abajo": 
        tiempoRotacion = 30;
        incrementoPos = 2;
        arriba = false;
        break;        
    case "masabajo": 
        tiempoRotacion = 10;
        incrementoPos = 4;
        arriba = false;
        break;
    case "normal": 
        tiempoRotacion = 70;
        tiempoEspera = 70;
        tiempoPausa = 5000;
        incrementoPos = 1;
        arriba = true;
        break;
    default:
        tiempoRotacion = 70;
        tiempoEspera = 70;
        tiempoPausa = 5000;
        incrementoPos = 1;
        arriba = true;        
        break;
}
}

function normal(){
    cambiar_velocidad("normal");    
    if(document.getElementById( "masarriba" ) != null)
      salir_todos();    
}
                            
function salir_todos(){
    sin_control = true;
    var aviso_img = document.getElementById( "masarriba" );
    if( firefox ) {
      while( aviso_img.style.opacity > 0.3) { 
        aviso_img.style.opacity = ( Number(aviso_img.style.opacity)-0.001);                
      }
    } else { 
      while ( Number ( aviso_img.style.filter.substring(14, 16)) > 29 ) {  
        aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) -1 )+")";
      }
    }
    aviso_img = document.getElementById( "arriba" );
    if( firefox ){
      while( aviso_img.style.opacity > 0.3) { 
        aviso_img.style.opacity = ( Number(aviso_img.style.opacity)-0.001);                
      }
    } else { 
      while ( Number ( aviso_img.style.filter.substring(14, 16)) > 29 ) {  
        aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) -1 )+")";
      }
    }
    aviso_img = document.getElementById( "alto" );
    if( firefox ) {
      while( aviso_img.style.opacity > 0.3) { 
        aviso_img.style.opacity = ( Number(aviso_img.style.opacity)-0.001);                
      }
    } else { 
      while ( Number ( aviso_img.style.filter.substring(14, 16)) > 29 ) {  
        aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) -1 )+")";
      }
    }
    aviso_img = document.getElementById( "abajo" );
    if( firefox ){
      while( aviso_img.style.opacity > 0.3) { 
        aviso_img.style.opacity = ( Number(aviso_img.style.opacity)-0.001);                
      }
    } else { 
      while ( Number ( aviso_img.style.filter.substring(14, 16)) > 29 ) {  
        aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) -1 )+")";
      }
    }
    aviso_img = document.getElementById( "masabajo" );
    if( firefox ){ 
      while( aviso_img.style.opacity > 0.3) { 
        aviso_img.style.opacity = ( Number(aviso_img.style.opacity)-0.001);                
      }    
    } else { 
      while ( Number ( aviso_img.style.filter.substring(14, 16)) > 29 ) {  
        aviso_img.style.filter = "alpha(opacity="+ ( Number ( aviso_img.style.filter.substring(14, 16)) -1 )+")";
      }
    }
}
function detectBrowser() {
  var browser=navigator.appName;
  var b_version=navigator.appVersion;
  var version=parseFloat(b_version);
  //alert("br: "+browser+" ver: "+version);
  if(browser=="Netscape")
      firefox = true;
  /*if ((browser=="Netscape"||browser=="Microsoft Internet Explorer") && (version>=4) ) {
    alert("Your browser is good enough!");
  } else {
    alert("It's time to upgrade your browser!");
  }*/
}

/************************* Fin de Avisos del index ************************************************/
//-------------------------***********************************************---------
//--------------------------------------------------------------------------------------
//-------------------------------- Para la ayuda ---------------------------------------

function verInstruccion(){
  linkver = document.getElementById("link_instruccion_mostrar");
  instruc2 = document.getElementById("instruccion");
  linkocu = document.getElementById("link_instruccion_ocultar");
  if( instruc2.style.visibility == "visible" ){
	instruc2.style.visibility = "hidden";
	instruc2.style.position = "absolute";
	linkver.style.visibility = "visible";
	linkver.style.position = "relative";
	linkocu.style.visibility = "hidden";
	linkocu.style.position = "absolute";
   }
   else{
	linkver.style.visibility = "hidden";
	linkver.style.position = "absolute";
	instruc2.style.visibility = "visible";
	instruc2.style.position = "relative";
	linkocu.style.visibility = "visible";
	linkocu.style.position = "relative";
   }
}

//----------------------------------------------------------------------=======


/******************* Para el rol de examenes ****************************************/
var numDivs = 6;  // El numero de div para los examenes
var actual = 1;   // La pagina actual que se muestra

function setNumDivs(num, act){
    //alert("Entre");
    actual = act;
    numDivs = num;    
}

function iniciarDivs(){
    for( i=1; i<=numDivs; i++){
        if( i == actual ){
            divi = document.getElementById("div"+i);
        //alert(divi+"  - div"+i);
            divi.style.visibility = "visible";
            divi.style.position = "relative";
            //divi.display = "block";
         } else {
            divi = document.getElementById("div"+i);
        //alert(divi+"  - div"+i);
            divi.style.visibility = "hidden";
            divi.style.position = "absolute";
            //divi.display = "none";
        }
    }    
}

function verSiguiente(){
    actual++;    
    iniciarDivs();        
    if( actual < numDivs ){        
        ant = document.getElementById("anter");        
        ant.style.visibility = "hidden";                
        setTimeout("verElemento('anter')", 100);
    } else {
        sig = document.getElementById("sigue");
        sig.style.visibility = "hidden";
    }        
    return;
}

function verAnterior(){
    actual--;    
    iniciarDivs();                
    if( actual > 1 ){
        sig = document.getElementById("sigue");        
        sig.style.visibility = "hidden";   
        setTimeout("verElemento('sigue')", 100);
    } else {
        ant = document.getElementById("anter");
        ant.style.visibility = "hidden";
    }
    return;
}

function verElemento(nombre){
   elem = document.getElementById(nombre);        
   elem.style.visibility = "visible";        
}

/************************ Para las Busquedas  tesis **************************************/

/* Para mostrar y ocultar la informacion con las pestaï¿½as de los 
 * resultados de las busquedas de tesis */
function activar(el) {
        if(el.className == "tab-active") return;
                       
        var elements = document.getElementById("navlist").childNodes;        
        for(var i=0; i<elements.length; i++) {
            if(elements[i].className == "tab-active") {
                elements[i].className = "";
                elements[i].firstChild.className = "nav-link";
                
                var panel = document.getElementById(elements[i].getAttribute("dato"));
                panel.style.display = "none";
                break;
            }
        }
        
	el.className = "tab-active";    
	//el.className = "nav-item";	
        el.firstChild.className = "tab-current nav-link active";
	//el.firstChild.className = "nav-link active";
        
        var panel1 = document.getElementById(el.getAttribute("dato"));
        panel1.style.display="block";

        
 }
 
function validarBusqueda(){
    //alert("entre");
    var texto_busqueda = document.getElementById("texto_busqueda");
    if( texto_busqueda.value == "" ) {
        alert("Debe escribir algo para buscar ");
        texto_busqueda.focus();
        return false;
    } else {
        if( /[<>=&{}%'"ï¿½`ï¿½?ï¿½!]+/.test(texto_busqueda.value)){
            alert("La busqueda contiene caracteres no permitidos "+ "\n" + "(<, >, =, ,, [, ], {, }, ï¿½, ?, !, ï¿½, &, %, ` y ï¿½)");
            texto_busqueda.focus();
            return false;
        } else {            
            return true;
        }            
    }
    return false;
}

function limpiarBusqueda(){
    document.form1.tipo_tesis.options[1].selected = true;
    document.form1.bus_por.options[0].selected = true;
    document.form1.anio.options[0].selected = true;
    document.form1.periodo.options[0].selected = true;
    document.form1.texto_busqueda.value = "";
}

/* Asignando margin-top al footer para llevarlo al fondo cuando el body es demasiado pequeño */
function ajustarFooter() {
    $('footer').css( { "margin-top": "0px" } );
    let bottom_footer = $('footer').offset().top + $('footer').height() - $(window).height();
    if( bottom_footer < 0 ) {
        var margin_top_footer = $(window).height() - $('footer').offset().top - $('footer').height();
        $('footer').css( { "margin-top": margin_top_footer + 15 + "px" } );
    }
}

// ESTE SCRIPT ES PARA LA VALIDACION DEL FORMULARIO
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.getElementsByClassName('needs-validation');
	// Loop over them and prevent submission
	var validation = Array.prototype.filter.call(forms, function(form) {
	    form.addEventListener('submit', function(event) {
		if (form.checkValidity() === false) {
		    event.preventDefault();
		    event.stopPropagation();
		}
		form.classList.add('was-validated');
	    }, false);
	});
    }, false);
})();

function verSubareas(codigo){
  var linkver = document.getElementById("link_subarea_mostrar"+codigo);
  var subarea = document.getElementById("subarea"+codigo);
  var linkocu = document.getElementById("link_subarea_ocultar"+codigo);
  if( subarea.style.visibility == "visible" ){
	subarea.style.visibility = "hidden";
	subarea.style.position = "absolute";
	linkver.style.visibility = "visible";
	linkver.style.position = "relative";
	linkocu.style.visibility = "hidden";
	linkocu.style.position = "absolute";
   }
   else{
	linkver.style.visibility = "hidden";
	linkver.style.position = "absolute";
	subarea.style.visibility = "visible";
	subarea.style.position = "relative";
	linkocu.style.visibility = "visible";
	linkocu.style.position = "relative";
   }
}