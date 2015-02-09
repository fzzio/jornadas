<div class="wrapper-jornada w-nivel2">
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

            <div class="container" id="nivel2-entrada">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 text-center">
                        <h1 class="titular-principal text-center">NIVEL 1</h1>
                    </div>
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="container-fluid text-center fondo-pregunta2">
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
                                    <div class="btn btn-lg btn-comenzar" id="cPreguntasRuleta">Comenzar</div>
                                    <br /><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" id="nivel2-ruleta">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 text-center">
                        <h1 class="titular-principal text-center">NIVEL 1</h1>
                    </div>
                </div>
                <div class="row fondo-ruleta espaciado-a contenedor-vidas2">

                    <div class="col-md-5 text-center">
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

                <div class="row fondo-ruleta">
                    <div class="col-md-6">
                        <div id="venues" style="float: left">
                            <ul></ul>
                        </div>
                        <div id="wheel" >
                            <canvas id="canvas" width="500" height="500"></canvas>
                        </div>
                        <div id="stats">
                            <div id="counter"></div>
                        </div>
                    </div>
                    <div class="col-md-6 preguntas-ruleta">
                        <div class="container-fluid text-center fondo-pregunta2" id="ruletaContenedorPreguntas">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1 class="titular-encuesta-pregunta" id="ruletaPreguntaID">
                                        Atención!
                                    </h1>
                                    <h4 class="titular-encuesta-pregunta" id="ruletaPreguntaTitular">
                                        Click a la ruleta para empezar
                                    </h4>
                                </div>
                            </div>

               
                            <div class="row text-left">
                                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1" id="ruletaPreguntaRespuestasOM">

                                </div>
                            </div>

                            <div class="row text-left">
                                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3" id="ruletaPreguntaRespuestasVF">

                                </div>
                            </div>


                            <div class="row espaciado-a">
                                <div class="col-md-12 espaciado-a" id="ruletaPreguntaBoton">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row espaciado-a">
                    <div class="col-md-12 text-center">
                        <a class="btn btn-lg btn-comenzar" href="<?php echo site_url('user/welcome');?>">
                            Volver
                        </a>
                    </div>  
                </div>
            </div>

            <div class="container" id="nivel2-pregunta">
                
            </div>
        </div>
    </div>
</div>


