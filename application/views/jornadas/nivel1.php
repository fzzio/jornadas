<div class="wrapper-jornada w-nivel1">
    <div class="v-center-contenedor">
        <div class="v-center-contenido">
            <!-- Modal -->
            <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content modal-contenedor">
                        <div class="modal-body fondo-lista">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3 class="txt-contenido-error espaciado-a">
                                            ¡Hay campos que no han sido llenados!
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
                        <!--
                        <img src="<?php //echo base_url('public/img/titular-jornadas.png'); ?>" alt="" class="img-responsive obj-centrar img-titular-principal" />
                        -->
                        <h1 class="titular-principal text-center">NIVEL 1</h1>
                    </div>
                </div>

                <div class="row preguntas-contenido">
                    <div id="carousel-preguntas" class="carousel slide alto-completo" data-interval="false" data-ride="carousel">
                        <?php echo form_open("user/preguntasNivel1", array('class' => 'carousel-inner alto-completo', 'role' => 'form')); ?>
                            <!-- INTRO -->
                            <div class="item active alto-completo">
                                <div class="v-center-contenedor">
                                    <div class="v-center-contenido">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                            <div class="container-fluid text-center fondo-lista">
                                                <div class="row espaciado-a">
                                                    <div class="col-md-12">
                                                        <h1 class="titular-encuesta">
                                                            <?php echo $juegoNivel1["nombre"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <p class="txt-contenido espaciado-a">
                                                            <?php echo $juegoNivel1["descripcion"] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12 espaciado-a">
                                                        <div class="btn btn-lg btn-comenzar" onclick="comenzarPreguntas(this);">Comenzar</div>
                                                        <br /><br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- PREGUNTAS -->
                            <div class="item alto-completo" id="no-preguntas">
                                <div class="v-center-contenedor">
                                    <div class="v-center-contenido">
                                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                            <div class="container-fluid text-center fondo-lista">
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                                        <img src="<?php echo base_url('public/img/titular-selecciona.png'); ?>" alt="" class="img-responsive obj-centrar img-titular" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 text-center">
                                                        <h3>Vidas: </h3>
                                                    </div>
                                                    <div class="col-md-9">
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
                                                <div class="row">
                                                    <?php $numP = 1; ?>
                                                    <?php foreach ($preguntas as $pregunta): ?>
                                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                            <div onclick="irAPregunta(<?php echo $pregunta['id']; ?>);" class="link-jornadas no-pregunta text-center" id="link-pregunta-<?php echo $pregunta['id']; ?>">
                                                                <h1 class="txt-no-pregunta"><?php echo $numP; $numP = $numP + 1;?></h1>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>

                                                <div class="row espaciado-a">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-lg btn-siguiente" value="Enviar Respuestas" />
                                                    </div>
                                                </div>

                                                <div class="row espaciado-a">
                                                    <div class="col-md-12">
                                                        &nbsp;
                                                    </div>
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
                                            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                                <div class="container-fluid text-center fondo-pregunta">
                                                    <div class="row">
                                                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
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
                                                            <div class="btn btn-lg btn-okay" onclick="verificarRespuestas1('<?php echo $pregunta["id"]; ?>', 'no-preguntas');">Aceptar</div>
                                                            <br /><br />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


