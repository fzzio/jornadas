<nav class="navbar navbar-jornadas" role="navigation">
  <div class="container-fluid">
  	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navegacion">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        Bienvenido
        <strong><?php echo $user_nombre; ?></strong>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-navegacion">
    	<ul class="nav navbar-nav navbar-right">
    		<li>
    			<?php echo anchor('user/logout', 'Cerrar sesión'); ?>
    		</li>
    	</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>