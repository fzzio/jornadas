function irAnterior(elemento){
	$('#carousel-preguntas').carousel('prev');
}

function comenzarPreguntas(elemento){
    irASlideID('no-preguntas');
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
	//$('#link-pregunta-' + idPregunta).addClass("no-pregunta-bloq");
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


function resetearVidas(){
    $.ajax({
        url: js_site_url('user/resetearVidas'),
        type: 'POST',
        async: false,
        dataType: "json",
        success: function (respuesta) {
            var txtHtml = "";
            var urlImgLife = js_site_url('../public/img/life_icon.png');
            var urlImgLifeDie = js_site_url('../public/img/life_icon-die.png');
            for (var i = 0; i < (respuesta.vidasxjuego - respuesta.vidasperdidas) ; i++) {
                txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                            + "<img src='" + urlImgLife + "' alt='' class='img-responsive obj-centrar' />"
                            + "</div>";
            };
            for (var i = 0; i < (respuesta.vidasperdidas) ; i++) {
                txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                            + "<img src='" + urlImgLifeDie + "' alt='' class='img-responsive obj-centrar' />"
                            + "</div>";
            };

            $("#div-vidas").html(txtHtml);
            console.log("Respuesta: " + respuesta);
        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });
}


function reducirVidas(){

    $.ajax({
        url: js_site_url('user/reducirVidas'),
        type: 'POST',
        async: true,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.codigo == 1) {
                var txtHtml = "";
                var urlImgLife = js_site_url('../public/img/life_icon.png');
                var urlImgLifeDie = js_site_url('../public/img/life_icon-die.png');
                for (var i = 0; i < (respuesta.vidasxjuego - respuesta.vidasperdidas) ; i++) {
                    txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                                + "<img src='" + urlImgLife + "' alt='' class='img-responsive obj-centrar' />"
                                + "</div>";
                };
                for (var i = 0; i < (respuesta.vidasperdidas) ; i++) {
                    txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                                + "<img src='" + urlImgLifeDie + "' alt='' class='img-responsive obj-centrar' />"
                                + "</div>";
                };

                $("#div-vidas").html(txtHtml);
            }else if (respuesta.codigo == 3) {
                var txtHtml = "";
                var urlImgLife = js_site_url('../public/img/life_icon.png');
                var urlImgLifeDie = js_site_url('../public/img/life_icon-die.png');
                for (var i = 0; i < (respuesta.vidasxjuego - respuesta.vidasperdidas) ; i++) {
                    txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                                + "<img src='" + urlImgLife + "' alt='' class='img-responsive obj-centrar' />"
                                + "</div>";
                };
                for (var i = 0; i < (respuesta.vidasperdidas) ; i++) {
                    txtHtml += "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center'>"
                                + "<img src='" + urlImgLifeDie + "' alt='' class='img-responsive obj-centrar' />"
                                + "</div>";
                };

                $("#div-vidas").html(txtHtml);

                $('#errorModal').modal('show');
            };            
            console.log("Respuesta: " + respuesta);
        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });
}


function verificarRespuestas1(idPregunta, slideRetorno){
    var idJuego = 1;
    var idSlideOrigen = "#pregunta-" + idPregunta;
    /*var $inputs = $(idSlideOrigen + ' :input');
    
    var values = {};
    $inputs.each(function() {
        values[this.name] = $(this).val();
    });*/

    $.extend($.expr[':'],{
        submitable: function(a){
            if($(a).is(':checkbox:not(:checked)'))
            {
                return false;
            }
            else if($(a).is(':radio:not(:checked)'))
            {
                return false;
            }
            else if($(a).is(':input'))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    });

    var $inputs = $(idSlideOrigen + ' :submitable');
    
    var dataValues = {};
    $inputs.each(function() {
        dataValues[this.name] = $(this).val();
    });

    //console.log("Enviados: " + dataValues);

    var parametros = {
        idPregunta: idPregunta,
        respuestas: dataValues
    }
    $.ajax({
        url: js_site_url('site/verificarRespuestas'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            if(respuesta.codigo == 1){
                // correcto
                $("#no-preguntas #link-pregunta-" + idPregunta + " .txt-no-pregunta").removeClass( 'error' );
                $("#no-preguntas #link-pregunta-" + idPregunta + " .txt-no-pregunta").addClass( 'okay' );

            }else if(respuesta.codigo == 2){
                // incorrecto
                $("#no-preguntas #link-pregunta-" + idPregunta + " .txt-no-pregunta").removeClass( 'okay' );
                $("#no-preguntas #link-pregunta-" + idPregunta + " .txt-no-pregunta").addClass( 'error' );

                reducirVidas();
                //resetearVidas();
            }else{
                // otro error
                $("#no-preguntas #link-pregunta-" + idPregunta + " .txt-no-pregunta").removeClass( 'okay' );
                $("#no-preguntas #link-pregunta-" + idPregunta + " .txt-no-pregunta").removeClass( 'error' );
            }
            console.log("Recibidos: " + respuesta);


        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });

    var target = $('#' + slideRetorno).index();
    $('#carousel-preguntas').carousel(target);

}

function verificarRespuestas3(idPregunta, slideRetorno){
    var idSlideOrigen = "#pregunta-" + idPregunta;
    /*var $inputs = $(idSlideOrigen + ' :input');
    
    var values = {};
    $inputs.each(function() {
        values[this.name] = $(this).val();
    });*/

    $.extend($.expr[':'],{
        submitable: function(a){
            if($(a).is(':checkbox:not(:checked)'))
            {
                return false;
            }
            else if($(a).is(':radio:not(:checked)'))
            {
                return false;
            }
            else if($(a).is(':input'))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    });

    var $inputs = $(idSlideOrigen + ' :submitable');
    
    var dataValues = {};
    $inputs.each(function() {
        dataValues[this.name] = $(this).val();
    });

    //console.log("Enviados: " + dataValues);

    var parametros = {
        idPregunta: idPregunta,
        respuestas: dataValues
    }
    $.ajax({
        url: js_site_url('site/verificarRespuestas'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            if(respuesta.codigo == 1){
                // correcto
                $('#errorModal').find(".txt-contenido-error").text("Correcto");
                $('#carousel-preguntas').carousel(0);
                var cartas = $("#cartas-3 .tipo-carta");
                $(cartas).removeClass("gradiente-inactivo");
                $(cartas).removeClass("cube");
                $(cartas).addClass("gradiente-inactivo");
        
                $('#errorModal').modal('show');
            }else if(respuesta.codigo == 2){
                // incorrecto
                $('#errorModal').find(".txt-contenido-error").text("Incorrecto! Favor revisar!");
                $('#errorModal').modal('show');

                reducirVidas();
                //resetearVidas();
            }else{
                // otro error
                $('#errorModal').find(".txt-contenido-error").text("Error!");
                $('#errorModal').modal('show');
                
            }
            console.log("Recibidos: " + respuesta);


        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });

    var target = $('#' + slideRetorno).index();
    $('#carousel-preguntas').carousel(target);

}


////////////////////////////////////////////////////////////////

$(document).ready(function() {
    resetearVidas();

    $('#btn-empezar').click(function(e) {
        e.preventDefault();
        var nivel = $("#combo-nivel").val();
        window.location.href = js_site_url('user/'+ nivel + '/') + $("#combo-materia").val(); //COLOCAR ESTA // fzzio
        //window.location.href = js_site_url('user/juegoDos/') + $("#combo-materia").val(); //ELIMINAR ESTA // fzzio
    });
    
	$('.no-pregunta-bloq').click(function(e) {
	    e.preventDefault();
	    //do other stuff when a click happens
	});

	$("#carousel-preguntas").carousel({
        interval: false,
        keyboard: false
    });



    $("#btn-pregunta-3").click(function(e){
        e.preventDefault();
        
        var cartas = $("#cartas-3 .tipo-carta");
        $(cartas).removeClass("gradiente-inactivo");
        $(cartas).removeClass("cube");
        $(cartas).addClass("gradiente-inactivo");

        var indice = Math.floor(Math.random()*cartas.length);
        $(cartas[indice]).removeClass("gradiente-inactivo");
        $(cartas[indice]).addClass("cube");


        var slides = $("#carousel-preguntas .carousel-inner .item");
        var indiceSlides = Math.floor(Math.random()*(slides.length - 1)) + 1;
        $('#carousel-preguntas').carousel(indiceSlides + 1);

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



////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
