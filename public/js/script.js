function irAnterior(elemento){
	$('#carousel-preguntas').carousel('prev');
}

function irSiguiente(elemento){
	$('#carousel-preguntas').carousel('next');
}

function irASlideID(idRecibido){
	var target = $('#' + idRecibido).index();
	$('#carousel-preguntas').carousel(target);
}

function irAPregunta(idPregunta){
	var target = $('#pregunta-' + idPregunta).index();
	$('#link-pregunta-' + idPregunta).addClass("no-pregunta-bloq");
	$('#carousel-preguntas').carousel(target);
}




function verificarDatos(elemento){
	if ( !$("#inputCedula").val() ){
		$('#errorModal').find(".txt-contenido-error").text("Ingrese cédula de identidad");
		$('#inputCedula').focus();
		$('#carousel-preguntas').carousel(1);
		$('#errorModal').modal('show');
	}else if ( !$("#inputNombre").val() ){
		$('#errorModal').find(".txt-contenido-error").text("Ingrese nombres y apellidos");
		$('#carousel-preguntas').carousel(1);
		$('#errorModal').modal('show');
		$('#inputNombre').focus();
	}else if ( !$("#inputEmail").val() ){
		$('#errorModal').find(".txt-contenido-error").text("Ingrese su email");
		$('#inputEmail').focus();
		$('#carousel-preguntas').carousel(1);
		$('#errorModal').modal('show');
	} else if ( !$("#terminos").is(':checked')  ){
		$('#errorModal').find(".txt-contenido-error").text("Debe aceptar los Términos y Condiciones.");	
		$('#carousel-preguntas').carousel(1);
		$('#errorModal').modal('show');
	}else{
		$('#carousel-preguntas').carousel('next');
	}



}

////////////////////////////////////////////////////////////////
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
////////////////////////////////////////////////////////////////

$(document).ready(function() {
	$('.no-pregunta-bloq').click(function(e) {
	    e.preventDefault();
	    //do other stuff when a click happens
	});

	$("#carousel-preguntas").carousel({
        interval: false,
        keyboard: false
    });


});

$('#carousel-preguntas').on('slide.bs.carousel', function () {
	if( $("input").is(":focus") ){
		return false;
	}
});

/*$('.no-pregunta-bloq').on('click', function () {
	e.preventDefault();
	return false;
});*/


