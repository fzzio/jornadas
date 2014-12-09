<div class="wrapper-jornada w-inicio">

	<div class="v-center-contenedor">
        <div class="v-center-contenido">

        	<div id="frm-login" class="container">

				<div class="row">
				    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						
						<?php echo form_open("user/login", array('class' => 'fondo-panel-j', 'role' => 'form')); ?>
							<h2>Te has registrado! <small>Ingresa tus datos.</small></h2>
							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
				                        <input type="text" name="cedula" id="cedula" class="form-control input-lg" placeholder="Cédula" maxlength="10" tabindex="2">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="4">
									</div>
								</div>
							</div>
							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-12 col-md-6 col-md-offset-3">
									<input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-block btn-lg" tabindex="7">
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>

		</div>
	</div>
	
</div>