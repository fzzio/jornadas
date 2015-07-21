<div class="wrapper-jornada w-nivel3">
    <div class="v-center-contenedor">
        <div class="v-center-contenido">
            <!-- Modal -->
            <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content modal-contenedor">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3 class="txt-contenido-error espaciado-a">
                                            ¡Se ha quedado sin vidas!
                                        </h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center">
                                        <button type="button" class="btn btn-okay" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 text-center">
                        <h1 class="titular-principal text-center">NIVEL 3</h1>
                    </div>
                </div>

                <div class="row espaciado-a fondo-pasos-3">
                    <div class="col-md-5 text-right">
                        <h3>Vidas: </h3>
                    </div>
                    <div class="col-md-7">
                        <div class="container-fluid">
                            <div class="row" id="div-vidas">
                                <?php for ($i=0; $i <( $participante->vidasxjuego - $participante->vidasperdidas ) ; $i++) { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
                                    <img src="<?php echo base_url('public/img/life_icon.png'); ?>" alt="" class="img-responsive obj-centrar" />
                                </div>
                                <?php } ?>
                                <?php for ($i=0; $i <( $participante->vidasperdidas ) ; $i++) { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center">
                                    <img src="<?php echo base_url('public/img/life_icon-die.png'); ?>" alt="" class="img-responsive obj-centrar" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row espaciado-a fondo-pasos-3">
                    <div class="container-fluid" id="cartas-3">
                        <div class="row">
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-1">
                                <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-2">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-3">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-4">
                                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-5">
                                <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-6">
                                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-9">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-10">
                                <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-11">
                                <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-12">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-13">
                                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 text-center tipo-carta gradiente-inactivo gradiente-14">
                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="row espaciado-a">
                            <div class="col-xs-2">
                                &nbsp;
                            </div>
                            <div class="col-xs-8 text-center">
                                <div class="btn btn-lg hvr-wobble-to-top-right btn-comenzar" id="btn-pregunta-3">
                                    Elegir Pregunta
                                </div>
                            </div>
                            <div class="col-xs-2">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row fondo-pregunta-3">
                    <div id="carousel-preguntas" class="carousel slide alto-completo" data-interval="false" data-ride="carousel">
                        <?php echo form_open("user/resumenNivel1/" . $materia->id , array('class' => 'carousel-inner alto-completo', 'role' => 'form')); ?>
                            <!-- INTRO -->
                            <div class="item active alto-completo">
                                <div class="v-center-contenedor">
                                    <div class="v-center-contenido">
                                        <div class="container-fluid text-center">
                                            <div class="row espaciado-a">
                                                <div class="col-md-12">
                                                    <h1 class="titular-encuesta">
                                                        <?php echo $juegoNivel3["nombre"] ?>
                                                    </h1>
                                                </div>
                                                <div class="col-md-10 col-md-offset-1">
                                                    <p class="txt-contenido espaciado-a">
                                                        <?php echo $juegoNivel3["descripcion"] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $numP = 1; ?>
                            <?php foreach ($preguntas as $pregunta): ?>
                                
                                <!-- PREGUNTA <?php  echo $pregunta['id']; ?> -->
                                <div class="item alto-completo" id="pregunta-<?php echo $pregunta['id']; ?>" >
                                    <div class="v-center-contenedor">
                                        <div class="v-center-contenido">
                                            <div class="container-fluid text-center">
                                                <div class="row espaciado-a">
                                                    <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                                                        <img src="<?php echo base_url('public/img/titular-pregunta.png'); ?>" alt="" class="img-responsive obj-centrar img-titular" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <h1 class="titular-encuesta-pregunta">
                                                            --- # <?php echo $numP; $numP = $numP + 1; ?> ---
                                                        </h1>
                                                        <h4 class="titular-encuesta-pregunta">
                                                            <?php echo utf8_encode($pregunta['texto']); ?>
                                                        </h4>
                                                    </div>
                                                </div>

                                                <?php if ($pregunta['tipo'] == 1): ?>
                                                    <div class="row text-left">
                                                        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                                                            <?php foreach ($pregunta["respuestas"] as $opcion): ?>
                                                                <div class="checkbox checkbox-jornada">
                                                                    <label class="txt-contenido espaciado-a">
                                                                        <?php $opcionNombre =  "om-" . $pregunta['id'] . "-" . $opcion['id'];?>
                                                                        <input type="checkbox" name="<?php echo $opcionNombre; ?>" id="<?php echo $opcionNombre; ?>" value="<?php echo $opcion['id']; ?>"><?php echo utf8_encode($opcion['texto']); ?>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                <?php elseif ($pregunta['tipo'] == 2): ?>
                                                    <div class="row text-left">
                                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                                            <?php foreach ($pregunta["respuestas"] as $opcion): ?>
                                                                <?php $opcionNombre = "vf-" . $pregunta['id'];?>
                                                                <?php $opcionID =  "vf-" . $pregunta['id'] . "-" . $opcion['id'];?>
                                                                <label class="radio">
                                                                    <input type="radio" name="<?php echo $opcionNombre; ?>" id="<?php echo $opcionID; ?>" value="<?php echo $opcion['id']; ?>"><?php echo utf8_encode($opcion['texto']); ?>
                                                                </label>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="row">
                                                        Error
                                                    </div>
                                                <?php endif ?>

                                                <div class="row espaciado-a">
                                                    <div class="col-md-12 espaciado-a">
                                                        <!-- <div class="btn btn-lg btn-okay" onclick="irASlideID('no-preguntas');">Aceptar</div> -->
                                                        <div class="btn btn-lg btn-okay hvr-buzz" onclick="verificarRespuestas3('<?php echo $pregunta["id"]; ?>', 'no-preguntas');">Aceptar</div>
                                                        <br /><br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach ?>
                        <?php echo form_close(); ?>
                    </div>
                </div> <!-- row -->


            </div>
        </div>
    </div>
</div>


<style type="text/css">
    #errorModal .modal-body{
        background: rgba(164,179,87,1);
        background: -moz-radial-gradient(center, ellipse cover, rgba(164,179,87,1) 0%, rgba(117,137,12,1) 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(164,179,87,1)), color-stop(100%, rgba(117,137,12,1)));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(164,179,87,1) 0%, rgba(117,137,12,1) 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(164,179,87,1) 0%, rgba(117,137,12,1) 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(164,179,87,1) 0%, rgba(117,137,12,1) 100%);
        background: radial-gradient(ellipse at center, rgba(164,179,87,1) 0%, rgba(117,137,12,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a4b357', endColorstr='#75890c', GradientType=1 );
    }
</style>