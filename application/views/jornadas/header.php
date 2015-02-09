<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        
        <meta name="description" content="V Jornadas Pedagógicas: Universidad Casa Grande">
        <meta name="author" content="Caja Negra: Estudio Multimedia">
        <title><?php echo $title ?></title>
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/fonts/fuentes.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/hover-min.css'); ?>">        
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/style.css'); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('public/img/favicon.png'); ?>">


        <script type="text/javascript">
            var base_url = '<?php echo base_url(); ?>';

            var js_site_url = function( urlText ){
                var urlTmp = "<?php echo site_url('" + urlText + "'); ?>";
                return urlTmp;
            }

            var js_base_url = function( urlText ){
                var urlTmp = "<?php echo base_url('" + urlText + "'); ?>";
                return urlTmp;
            }
        </script>
        
    </head>
    <body>
        <?php /*

        <audio src="<?php echo base_url('public/audio/sonido.mp3'); ?>" autoplay hidden="true">
            <p>Tu browser no soporta mp3.</p>
        </audio>
        
        */ ?>