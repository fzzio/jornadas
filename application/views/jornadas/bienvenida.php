<div class="wrapper-jornada w-bienvenido">
	<div class="v-center-contenedor">
        <div class="v-center-contenido">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5 fondo-panel-j">
						
						<div class="row">
							<div class="col-md-12">
								<h1>Bienvenido <?php echo $user_nombre; ?></h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>
									A continuación presentamos una lista de juegos basados en preguntas, leerlos bien y contestar correctamente.
								</p>
							</div>
						</div>
						<div class="row espaciado-a">
							<div class="col-md-12">
								<label for="">Por favor seleccione la materia:</label>
								<select class="form-control" name="materia" id="combo-materia">
									<?php foreach ($materias as $materia): ?>
										<option value="<?php echo $materia['id']; ?>"><?php echo $materia['nombre']; ?></option>
	                                <?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="row espaciado-a">
							<div class="col-md-12">
								<label for="">Por favor seleccione el nivel:</label>
								<select class="form-control" name="materia" id="combo-nivel">
									<option value="juegoUno">Nivel 1</option>
									<option value="juegoDos">Nivel 2</option>
									<option value="juegoTres">Nivel 3</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<?php //echo anchor('user/juegoUno', 'Empezar Juegos', array('class' => 'btn btn-lg btn-success')); ?>
								<a href="#" class="btn btn-lg btn-success" id="btn-empezar">
									Empezar Juegos
								</a>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>