<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>  <?php isset($titulo)? $titulo: 'Admin' ;  ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link id="bs-css" href="<?php echo base_url() ?>template/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>

	<link href="<?php echo base_url() ?>template/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>template/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>template/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo base_url() ?>template/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url() ?>template/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/uploadify.css' rel='stylesheet'>
	<link href='<?php echo base_url() ?>template/css/style.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <link href="<?php echo base_url() ?>template/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <img alt="Charisma Logo" src="<?php echo base_url() ?>public/img/logo-admin.png" class="img-responsive obj-centrar" style="width: 100%; height: 100%;" /></a>
				
				<?php /*

				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				*/ ?>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
                                                <li><a href="<?php echo base_url("index.php/admin/logout"); ?>">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
			
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
                                                
                                                
                                                <?php foreach ($data["menu"] as $link  ): ?>                                                
                                                <li>
                                                    <a class="ajax-link" href="<?php echo site_url($link['url'])?>">
                                                         <i class="<?php echo site_url($link['icon'])?>"></i>
                                                        <span class="hidden-tablet">  <?php echo  $link['label'] ;  ?> </span>
                                                    </a>
                                                </li>                                                
                                                <?php endforeach;?>
                                                     
                                                 <li class="nav-header hidden-tablet">Configuración</li>
						 <?php foreach ($data["menuAdmin"] as $link  ): ?>                                                
                                                <li>
                                                    <a class="ajax-link" href="<?php echo site_url($link['url'])?>">
                                                        <i class="<?php echo site_url($link['icon'])?>"></i>
                                                        <span class="hidden-tablet">  <?php echo  $link['label'] ;  ?> </span>
                                                    </a>
                                                </li>                                                
                                                <?php endforeach;?>
					</ul>
					<?php /*
                                    <label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"  checked="checked" > Ajax on menu</label>
					*/ ?>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>


                       <?php if (isset($output)): ?>
                       
                           
                           <?php echo $output;  ?>
                           
                           
                       <?php else: ?>
                       
                        <div class="row-fluid">
                                <div class="box span12">
                                    <div class="box-header well">
                                        <h2><i class="icon-info-sign"></i> Introduction</h2>
                                        <div class="box-icon">
                                            <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                                            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                                            <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                                        </div>
                                    </div>
                                    <div class="box-content">
                                        <h1>Panel de administracion del Sitio</h1>
                                        <h1><small><a href="www.aea.com.ec">www.aea.com.ec</a> </small></h1>
                                        <p>Escoge una de las opciones del panel derecho para modificar el contenido del sitio </p>


                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                                               
                        
                       <?php   endif;  ?>
			
	
					
			 
 
		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

	 
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->




	<script type="text/javascript">
		var base_path = "<?php echo base_url() ?>template/"; 
	</script>

        
          <?php  foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        
        
         <?php /*
    <script src="<?php echo base_url() ?>template/js/jquery-1.7.2.min.js"></script>   
         */ ?>   
         
	<script src="<?php echo base_url() ?>template/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url() ?>template/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url() ?>template/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?php echo base_url() ?>template/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='<?php echo base_url() ?>template/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url() ?>template/js/excanvas.js"></script>
	<script src="<?php echo base_url() ?>template/js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url() ?>template/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url() ?>template/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url() ?>template/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url() ?>template/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url() ?>template/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url() ?>template/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url() ?>template/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url() ?>template/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url() ?>template/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url() ?>template/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url() ?>template/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url() ?>template/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url() ?>template/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url() ?>template/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->


      
        
    <script src="<?php echo base_url() ?>template/js/charisma.js"></script>
	    
            
</body>
</html>
