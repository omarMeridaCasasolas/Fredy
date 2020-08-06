/*  Librería slick utilizada /web/js/slick.js
 *  Estilos empleados /web/css/slick.css y /web/css/slick-theme.css
 *  Contenido html para avisos en /web/index_central_avisos.jsp
 */

$(document).ready(function(){
  $('.slider-avisos').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      arrows: true,
      dots: false,
      pauseOnHover: false,
      responsive: [{
          breakpoint: 768,
          settings: {
              slidesToShow: 2
          }
      }, {
          breakpoint: 520,
          settings: {
              slidesToShow: 1
          }
      }]
  });

  $('#next').slick('slickNext');
  
    // Ajuste de tamaño de cards (misma altura) contenidas dentro del slider
    
    ajustarAvisosCards();
    
    $(window).resize( function() {
        ajustarAvisosCards ();
    });
    
});

// Funciones de ajuste de cards avisos

function ajustarAvisosCards() {
    var mayor_card = 0;
    $(".aviso-card").each(function() {
        $( this ).find( $('.card-footer') ).css( { "margin-top": "0px" } );
        if( mayor_card < $(this).height() ) {
            mayor_card = $(this).height();
        }
    });
    $(".aviso-card").each(function() {
        var altura_para_aumentar = mayor_card - $(this).height();
        if( altura_para_aumentar > 0 ) {
            $( this ).find( $('.card-footer') ).css( { "margin-top": altura_para_aumentar+"px" } );
        }
    });
}