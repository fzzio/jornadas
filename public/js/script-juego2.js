var idCurrent = 0;
var idJuego = 0; //cambiar a 1


function girarRuleta(){
    $("#canvas").click();
}

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

                //$('#errorModal').modal('show'); en JQuery 1.6 no sirve
                alert("Se ha quedado sin vidas");
                location.reload();
            };            
            console.log("Respuesta: " + respuesta);
        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });
}


function verificarRespuestas2(idPregunta){
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

    var $inputs = $('#ruletaContenedorPreguntas :submitable');
    
    var dataValues = {};
    $inputs.each(function() {
        dataValues[this.name] = $(this).val();
    });

    //console.log("Respuestas enviadas: " + dataValues);

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

                $("#ruletaPreguntaRespuestasOM").html("");
                $("#ruletaPreguntaRespuestasVF").html("");
                $("#ruletaPreguntaID").text("Correcto");
                $("#ruletaPreguntaTitular").text("");


            }else if(respuesta.codigo == 2){
                // incorrecto
                $("#ruletaPreguntaRespuestasOM").html("");
                $("#ruletaPreguntaRespuestasVF").html("");
                $("#ruletaPreguntaID").text("Incorrecto");
                $("#ruletaPreguntaTitular").text("");

                reducirVidas();
                //resetearVidas();
            }else{
                // otro error
                $("#ruletaPreguntaRespuestasOM").html("");
                $("#ruletaPreguntaRespuestasVF").html("");
                $("#ruletaPreguntaID").text("");
                $("#ruletaPreguntaTitular").text("Error desconocido.");
            }
            console.log("Recibidos: " + respuesta);

            var htmlBoton = "<div class='btn btn-lg btn-okay' onclick='girarRuleta();'>Girar Ruleta</div>";
            htmlBoton += "<br /><br />";
            
            $("#ruletaPreguntaBoton").html(htmlBoton);


        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });

    /*var target = $('#' + slideRetorno).index();
    $('#carousel-preguntas').carousel(target);*/

}



function mostrarPregunta(idPregunta){
    var parametros = {
        idPregunta: idPregunta
    }
    $.ajax({
        url: js_site_url('site/obtenerPreguntaRespuesta'),
        type: 'POST',
        async: true,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            //$("#ruletaPreguntaID").text("--- # " + respuesta.dataPregunta.id + " ---");
            $("#ruletaPreguntaID").text("");
            $("#ruletaPreguntaTitular").text(respuesta.dataPregunta.texto);

            var htmlPregunta = "";
            $("#ruletaPreguntaRespuestasOM").html("");
            $("#ruletaPreguntaRespuestasVF").html("");

            if (respuesta.dataPregunta.tipo == 1) {
                //opcion multiple
                htmlPregunta = "";
                var opcionNombre = "";
                for (var i = 0; i < respuesta.dataRespuestas.length; i++) {
                    opcionNombre = "om-" + respuesta.dataPregunta.id + "-" + respuesta.dataRespuestas[i].id;

                    htmlPregunta += "<div class='checkbox checkbox-jornada'>";
                    htmlPregunta += "<label class='txt-contenido espaciado-a'>";
                    htmlPregunta += "<input type='checkbox' name='" + opcionNombre + "' id='" + opcionNombre + "' value='" + respuesta.dataRespuestas[i].id + "'>" + respuesta.dataRespuestas[i].texto + "";
                    htmlPregunta += "</label>";
                    htmlPregunta += "</div>";
                };                
                $("#ruletaPreguntaRespuestasOM").html(htmlPregunta);

            }else if (respuesta.dataPregunta.tipo == 2) {
                //verdadero y falso
                htmlPregunta = "";
                var opcionNombre = "";
                var opcionID = "";
                for (var i = 0; i < respuesta.dataRespuestas.length; i++) {
                    opcionNombre = "vf-" + respuesta.dataPregunta.id;
                    opcionID = "vf-" + respuesta.dataPregunta.id + "-" + respuesta.dataRespuestas[i].id;

                    htmlPregunta += "<label class='radio'>";
                    htmlPregunta += "<input type='radio' name='" + opcionNombre + "' id='" + opcionID + "' value='" + respuesta.dataRespuestas[i].id + "'>" + respuesta.dataRespuestas[i].id + "";
                    htmlPregunta += "</label>";
                    
                };
                $("#ruletaPreguntaRespuestasVF").html(htmlPregunta);
            }

            var htmlBoton = "<div class='btn btn-lg btn-okay' onclick='verificarRespuestas2(" + respuesta.dataPregunta.id + ");'>Aceptar</div>";
            htmlBoton += "<br /><br />";
            
            $("#ruletaPreguntaBoton").html(htmlBoton);
            

            console.log("Recibidos: " + respuesta);


        }, 
        error: function (error) {
            console.log("ERROR: " + error);
        }
    });
}


// Helpers
shuffle = function(o) {
    for (var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};

String.prototype.hashCode = function() {
    // See http://www.cse.yorku.ca/~oz/hash.html        
    var hash = 5381;
    for (i = 0; i < this.length; i++) {
        char = this.charCodeAt(i);
        hash = ((hash << 5) + hash) + char;
        hash = hash & hash; // Convert to 32bit integer
    }
    return hash;
}

Number.prototype.mod = function(n) {
    return ((this % n) + n) % n;
}



$(function() {

    var venueContainer = $('#venues ul');
    $.each(venues, function(key, item) {
        venueContainer.append(
        $(document.createElement("li")).append(
        $(document.createElement("input")).attr({
            id: 'venue-' + key,
            name: item,
            value: item,
            type: 'checkbox',
            checked: true
        }).change(function() {
            var cbox = $(this)[0];
            var segments = wheel.segments;
            var i = segments.indexOf(cbox.value);

            if (cbox.checked && i == -1) {
                segments.push(cbox.value);

            } else if (!cbox.checked && i != -1) {
                segments.splice(i, 1);
            }

            segments.sort();
            wheel.update();
        })

        ).append(
        $(document.createElement('label')).attr({
            'for': 'venue-' + key
        }).text(item)))
    });

    $('#venues ul>li').tsort("input", {
        attr: "value"
    });
});

// WHEEL!
var wheel = {

    timerHandle: 0,
    timerDelay: 33,

    angleCurrent: 0,
    angleDelta: 0,

    size: 225,

    canvasContext: null,

    colors: ['#ffff00', '#ffc700', '#ff9100', '#ff6301', '#ff0000', '#c6037e',
             '#713697', '#444ea1', '#2772b2', '#0297ba', '#008e5b', '#8ac819'],

    segments: [],

    seg_colors: [],
    // Cache of segments to colors
    maxSpeed: Math.PI / 16,

    upTime: 1000,
    // How long to spin up for (in ms)
    downTime: 17000,
    // How long to slow down for (in ms)
    spinStart: 0,

    frames: 0,

    centerX: 250,
    centerY: 250,

    spin: function() {

        // Start the wheel only if it's not already spinning
        if (wheel.timerHandle == 0) {
            wheel.spinStart = new Date().getTime();
            wheel.maxSpeed = Math.PI / (16 + Math.random()); // Randomly vary how hard the spin is
            wheel.frames = 0;
            wheel.sound.play();

            wheel.timerHandle = setInterval(wheel.onTimerTick, wheel.timerDelay);
        }
    },

    onTimerTick: function() {

        wheel.frames++;

        wheel.draw();

        var duration = (new Date().getTime() - wheel.spinStart);
        var progress = 0;
        var finished = false;

        if (duration < wheel.upTime) {
            progress = duration / wheel.upTime;
            wheel.angleDelta = wheel.maxSpeed * Math.sin(progress * Math.PI / 2);
        } else {
            progress = duration / wheel.downTime;
            wheel.angleDelta = wheel.maxSpeed * Math.sin(progress * Math.PI / 2 + Math.PI / 2);
            if (progress >= 1) finished = true;
        }

        wheel.angleCurrent += wheel.angleDelta;
        while (wheel.angleCurrent >= Math.PI * 2)
        // Keep the angle in a reasonable range
        wheel.angleCurrent -= Math.PI * 2;

        if (finished) {
            clearInterval(wheel.timerHandle);
            wheel.timerHandle = 0;
            wheel.angleDelta = 0;

            $("#counter").html((wheel.frames / duration * 1000) + " FPS");

            //alert(idCurrent);
            //console.log(wheel);
            mostrarPregunta(idCurrent);
        }

/*
        // Display RPM
        var rpm = (wheel.angleDelta * (1000 / wheel.timerDelay) * 60) / (Math.PI * 2);
        $("#counter").html( Math.round(rpm) + " RPM" );
         */
    },

    init: function(optionList) {
        try {
            wheel.initWheel();
            wheel.initAudio();
            wheel.initCanvas();
            wheel.draw();

            $.extend(wheel, optionList);

        } catch (exceptionData) {
            alert('Wheel is not loaded ' + exceptionData);
        }

    },

    initAudio: function() {
        var sound = document.createElement('audio');
        sound.setAttribute('src', 'http://bramp.net/javascript/wheel.mp3');
        wheel.sound = sound;
    },

    initCanvas: function() {
        var canvas = $('#wheel #canvas').get(0);

        if ($.browser.msie) {
            canvas = document.createElement('canvas');
            $(canvas).attr('width', 1000).attr('height', 600).attr('id', 'canvas').appendTo('.wheel');
            canvas = G_vmlCanvasManager.initElement(canvas);
        }

        canvas.addEventListener("click", wheel.spin, false);
        wheel.canvasContext = canvas.getContext("2d");
    },

    initWheel: function() {
        shuffle(wheel.colors);
    },

    // Called when segments have changed
    update: function() {
        // Ensure we start mid way on a item
        //var r = Math.floor(Math.random() * wheel.segments.length);
        var r = 0;
        wheel.angleCurrent = ((r + 0.5) / wheel.segments.length) * Math.PI * 2;

        var segments = wheel.segments;
        var len = segments.length;
        var colors = wheel.colors;
        var colorLen = colors.length;

        // Generate a color cache (so we have consistant coloring)
        var seg_color = new Array();
        for (var i = 0; i < len; i++)
        seg_color.push(colors[segments[i].hashCode().mod(colorLen)]);

        wheel.seg_color = seg_color;

        wheel.draw();
    },

    draw: function() {
        wheel.clear();
        wheel.drawWheel();
        wheel.drawNeedle();
    },

    clear: function() {
        var ctx = wheel.canvasContext;
        ctx.clearRect(0, 0, 1000, 800);
    },

    drawNeedle: function() {
        var ctx = wheel.canvasContext;
        var centerX = wheel.centerX;
        var centerY = wheel.centerY;
        var size = wheel.size;

        ctx.lineWidth = 1;
        ctx.strokeStyle = '#000000';
        ctx.fileStyle = '#ffffff';

        ctx.beginPath();

        ctx.moveTo(centerX + size - 40, centerY);
        ctx.lineTo(centerX + size + 20, centerY - 10);
        ctx.lineTo(centerX + size + 20, centerY + 10);
        ctx.closePath();

        ctx.stroke();
        ctx.fill();

        // Which segment is being pointed to?
        var i = wheel.segments.length - Math.floor((wheel.angleCurrent / (Math.PI * 2)) * wheel.segments.length) - 1;

        // Now draw the winning name
        ctx.textAlign = "left";
        ctx.textBaseline = "middle";
        ctx.fillStyle = '#000000';
        ctx.font = "2em Arial";
        ctx.fillText("Pregunta # " + wheel.segments[i], centerX + size + 25, centerY);

        idCurrent = wheel.segments[i];
    },

    drawSegment: function(key, lastAngle, angle) {
        var ctx = wheel.canvasContext;
        var centerX = wheel.centerX;
        var centerY = wheel.centerY;
        var size = wheel.size;

        var segments = wheel.segments;
        var len = wheel.segments.length;
        var colors = wheel.seg_color;

        var value = segments[key];

        ctx.save();
        ctx.beginPath();

        // Start in the centre
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, size, lastAngle, angle, false); // Draw a arc around the edge
        ctx.lineTo(centerX, centerY); // Now draw a line back to the centre
        // Clip anything that follows to this area
        //ctx.clip(); // It would be best to clip, but we can double performance without it
        ctx.closePath();

        ctx.fillStyle = colors[key];
        ctx.fill();
        ctx.stroke();

        // Now draw the text
        ctx.save(); // The save ensures this works on Android devices
        ctx.translate(centerX, centerY);
        ctx.rotate((lastAngle + angle) / 2);

        ctx.fillStyle = '#000000';
        ctx.fillText(value.substr(0, 20), size / 2 + 20, 0);
        ctx.restore();

        ctx.restore();
    },

    drawWheel: function() {
        var ctx = wheel.canvasContext;

        var angleCurrent = wheel.angleCurrent;
        var lastAngle = angleCurrent;

        var segments = wheel.segments;
        var len = wheel.segments.length;
        var colors = wheel.colors;
        var colorsLen = wheel.colors.length;

        var centerX = wheel.centerX;
        var centerY = wheel.centerY;
        var size = wheel.size;

        var PI2 = Math.PI * 2;

        ctx.lineWidth = 1;
        ctx.strokeStyle = '#000000';
        ctx.textBaseline = "middle";
        ctx.textAlign = "center";
        ctx.font = "1.2em Arial";

        for (var i = 1; i <= len; i++) {
            var angle = PI2 * (i / len) + angleCurrent;
            wheel.drawSegment(i - 1, lastAngle, angle);
            lastAngle = angle;
        }
        // Draw a center circle
        ctx.beginPath();
        ctx.arc(centerX, centerY, 20, 0, PI2, false);
        ctx.closePath();

        ctx.fillStyle = '#ffffff';
        ctx.strokeStyle = '#000000';
        ctx.fill();
        ctx.stroke();

        // Draw outer circle
        ctx.beginPath();
        ctx.arc(centerX, centerY, size, 0, PI2, false);
        ctx.closePath();

        ctx.lineWidth = 10;
        ctx.strokeStyle = '#000000';
        ctx.stroke();
    },
}

window.onload = function() {
    wheel.init();

    var segments = new Array();
    $.each($('#venues input:checked'), function(key, cbox) {
        segments.push(cbox.value);
    });

    wheel.segments = segments;
    wheel.update();

    // Hide the address bar (for mobile devices)!
    setTimeout(function() {
        window.scrollTo(0, 1);
    }, 0);
}


$(document).ready(function() {
    resetearVidas();

    $('#cPreguntasRuleta').click(function(e) {
        e.preventDefault();
        $("#nivel2-entrada").hide();
        $("#nivel2-ruleta").show();
        //do other stuff when a click happens
    });


});

