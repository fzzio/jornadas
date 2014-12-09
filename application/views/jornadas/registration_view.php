<div class="wrapper-jornada w-inicio">

	<div class="v-center-contenedor">
        <div class="v-center-contenido">

        	<div id="frm-login" class="container">

				<div class="row">
				    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						
						<?php echo form_open("user/login", array('class' => 'fondo-panel-j', 'role' => 'form')); ?>
							<h2>Bienvenido <small>Por favor, ingrese sus datos.</small></h2>
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
								<div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
									<a href="#" class="" onClick="$('#frm-login').hide(); $('#frm-registro').show();">¿No estás registrado?</a>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>

			<div id="frm-registro" class="container" style="display:none;">

				<div class="row">
				    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				    	<?php echo form_open("user/registration", array('class' => 'fondo-panel-j', 'role' => 'form')); ?>
							<h2>Bienvenido <small>Por favor, regístrese para continuar.</small></h2>
							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="user_nombre" id="user_nombre" class="form-control input-lg" placeholder="Nombre y Apellidos" tabindex="1" value="<?php echo set_value('user_nombre'); ?>" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
				                        <input type="text" name="user_cedula" id="user_cedula" class="form-control input-lg" placeholder="Cédula" maxlength="10" tabindex="2" value="<?php echo set_value('user_cedula'); ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="email" name="user_email" id="user_email" class="form-control input-lg" placeholder="Email" tabindex="3" value="<?php echo set_value('user_email'); ?>" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="user_password" id="user_password" class="form-control input-lg" placeholder="Contraseña" tabindex="4" value="<?php echo set_value('user_password'); ?>" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="con_password" id="con_password" class="form-control input-lg" placeholder="Confirmar Contraseña" tabindex="5" value="<?php echo set_value('con_password'); ?>" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="btn-group" data-toggle="buttons">
						                <label class="btn btn-default">
						                    <input type="radio" name="user_genero" value="1" /> Masculino
						                </label>
						                <label class="btn btn-default">
						                    <input type="radio" name="user_genero" value="2" /> Femenino
						                </label>
						            </div>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-5">
									<span class="button-checkbox">
										<button type="button" class="btn" data-color="info" tabindex="7">Acepto</button>
				                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									Al registrar, usted acepta los <a href="#" data-toggle="modal" data-target="#t_and_c_m">Términos y Condiciones</a>.
								</div>
							</div>

							<hr class="colorgraph">

							<div class="row">
								<div class="col-xs-12 col-md-6 col-md-offset-3">
									<input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7">
								</div>
								<div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
									<a href="#" class="" onClick="$('#frm-registro').hide(); $('#frm-login').show();">Iniciar sesión</a>
								</div>
							</div>
							
							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<?php echo validation_errors('<p class="frm-error">'); ?>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>


				<!-- Modal -->
				<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content fondo-panel-j2">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h1 class="modal-title" id="myModalLabel">Términos y Condiciones</h1>
							</div>
							<div class="modal-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum sodales nibh, nec malesuada erat efficitur eget. Praesent egestas, ligula eget laoreet varius, orci arcu interdum metus, in mattis turpis neque quis ante. Proin ut facilisis purus, vehicula maximus velit. Ut suscipit, urna ac ultrices facilisis, ipsum ligula interdum est, id fermentum dui sapien ut ante. Vestibulum metus risus, faucibus dictum mi quis, facilisis pretium orci. Nulla non lectus eget tellus ullamcorper tincidunt. Donec a tortor quam.</p>
								<p>Suspendisse ac orci vitae tortor scelerisque gravida. Aenean a odio enim. Nunc vitae justo commodo, luctus est sed, dictum sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc ac volutpat nulla. Nullam fermentum tristique tortor, a ornare nunc suscipit vitae. Donec mollis quam orci, ut porttitor felis dictum at. Maecenas consequat sem ex, non suscipit ante aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
								<p>Cras fringilla consectetur felis quis ultrices. Nunc pretium arcu quis urna porttitor semper. Curabitur tempor nisl posuere posuere semper. Suspendisse egestas blandit magna commodo suscipit. Donec porttitor sodales augue et molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non eros ac lorem rutrum semper.</p>
								<p>Cras sapien ex, elementum at porttitor sit amet, mattis in sem. Vivamus malesuada massa sit amet arcu suscipit congue. Sed ornare tincidunt lectus, ac commodo ipsum. Pellentesque dui odio, tempus eget vestibulum at, aliquam at orci. Nam non lorem porttitor, dignissim lorem ut, feugiat urna. Fusce eget semper lorem, in convallis felis. Praesent sed ligula eu mi dapibus dignissim. Aliquam scelerisque, erat at tempus condimentum, ante quam ultrices nisl, sit amet interdum elit ex nec purus. Mauris non nisl sed leo porttitor vestibulum.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam fermentum sodales nibh, nec malesuada erat efficitur eget. Praesent egestas, ligula eget laoreet varius, orci arcu interdum metus, in mattis turpis neque quis ante. Proin ut facilisis purus, vehicula maximus velit. Ut suscipit, urna ac ultrices facilisis, ipsum ligula interdum est, id fermentum dui sapien ut ante. Vestibulum metus risus, faucibus dictum mi quis, facilisis pretium orci. Nulla non lectus eget tellus ullamcorper tincidunt. Donec a tortor quam.</p>
								<p>Suspendisse ac orci vitae tortor scelerisque gravida. Aenean a odio enim. Nunc vitae justo commodo, luctus est sed, dictum sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc ac volutpat nulla. Nullam fermentum tristique tortor, a ornare nunc suscipit vitae. Donec mollis quam orci, ut porttitor felis dictum at. Maecenas consequat sem ex, non suscipit ante aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
								<p>Cras fringilla consectetur felis quis ultrices. Nunc pretium arcu quis urna porttitor semper. Curabitur tempor nisl posuere posuere semper. Suspendisse egestas blandit magna commodo suscipit. Donec porttitor sodales augue et molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non eros ac lorem rutrum semper.</p>
								<p>Cras sapien ex, elementum at porttitor sit amet, mattis in sem. Vivamus malesuada massa sit amet arcu suscipit congue. Sed ornare tincidunt lectus, ac commodo ipsum. Pellentesque dui odio, tempus eget vestibulum at, aliquam at orci. Nam non lorem porttitor, dignissim lorem ut, feugiat urna. Fusce eget semper lorem, in convallis felis. Praesent sed ligula eu mi dapibus dignissim. Aliquam scelerisque, erat at tempus condimentum, ante quam ultrices nisl, sit amet interdum elit ex nec purus. Mauris non nisl sed leo porttitor vestibulum.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div>


		</div>
	</div>
	
</div>