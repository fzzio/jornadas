        <script type="text/javascript" src="<?php echo base_url('public/js/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/js/jquery.tinysort.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('public/js/bootstrap.js'); ?>"></script>
        <script type="text/javascript">
			venues = {
				<?php $pr = 1; ?>
            	<?php foreach ($preguntas as $pregunta): ?>
            	"<?php echo $pregunta['id']; ?>": "<?php echo $pregunta['id']; ?>",
            	<?php $pr = $pr + 1; ?>
				<?php endforeach ?>
			};

			<?php 
        	// List of venues. These are foursquare IDs, with the idea that eventually it'll tie in 
			/*venues = {
			    "116208": "Jerry's Subs and Pizza",
			    "66271": "Starbucks",
			    "5518": "Ireland's Four Courts",
			    "392360": "Five Guys",
			    "2210952": "Uptown Cafe",
			    "207306": "Corner Bakery Courthouse",
			    "41457": "Delhi Dhaba",
			    "101161": "TNR Cafe",
			    "257424": "Afghan Kabob House",
			    "512060": "The Perfect Pita",
			    "66244": "California Tortilla",
			    "352867": "Pho 75 - Rosslyn",
			    "22493": "Ragtime",
			    "268052": "Subway",
			    "5665": "Summers Restaurant & Sports Bar",
			    "129724": "Cosi",
			    "42599": "Ray's Hell Burger"
			};*/
			?>
        </script>
        <style type="text/css">
        	#venues, #stats, #nivel2-ruleta, #nivel2-pregunta{
        		display: none;
        	}

        	.contenedor-vidas2{
        		-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
				box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
				background: rgba(164,179,87,0.8);
        	}
        </style>
        <script type="text/javascript" src="<?php echo base_url('public/js/script-juego2.js'); ?>"></script>
    </body>
</html>