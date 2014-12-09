<div class="wrapper-jornada w-nivel1">
	<div class="v-center-contenedor">
		<div class="v-center-contenido">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
						<!--
							<img src="assets/img/titular-jornadas.png" alt="" class="img-responsive obj-centrar img-titular-principal" />
	                    -->
	                    <h1 class="titular-principal text-center">Nivel 01 - Resumen</h1>
					</div>
				</div>
			</div>
			<div class="container text-center fondo-lista">
				<div class="row espaciado-a">
					<div class="col-md-12">
						<h1 class="titular-encuesta">
							Resultados
						</h1>
						<p class="txt-contenido">
							Puntaje alcanzado
						</p>
					</div>
				</div>


				<div class="row espaciado-a">
					<div class="col-md-12">
						<div class="container-fluid">
							
						</div>
					</div>
				</div>

				<?php foreach ($preguntas as $pregunta): ?>
						<div class="row text-left">
							<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
								<h4 class="titular-encuesta-pregunta-r">
									# <?php echo $pregunta['id']; ?> .- <?php echo utf8_encode($pregunta['texto']); ?>
								</h4>
							</div>
							<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
								<ul>
								<?php foreach ($pregunta["respuestas"] as $opcion): ?>
									<?php
										if ( in_array($opcion['id'], $resultados) && ($opcion["correcta"] == 1) ) {
											$claseRespuesta = "op-correcto";
										}elseif ( in_array($opcion['id'], $resultados) && ($opcion["correcta"] == 0) ) {
											$claseRespuesta = "op-incorrecto";
										}else{
											$claseRespuesta = "op-ninguno";
										}
									?>
									<li>
										<span class="<?php echo $claseRespuesta; ?>">
											<?php echo utf8_encode($opcion['texto']); ?>
										</span>
									</li>
								<?php endforeach ?>
								</ul>
							</div>
						</div>
					<?php endforeach ?>

				<div class="row espaciado-a">
					<div class="col-md-12 espaciado-a">
						<?php echo anchor('user/juegoUno', 'Volver', array('class' => 'btn btn-lg btn-comenzar')); ?>
						<br /><br />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>