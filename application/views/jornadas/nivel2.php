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

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 text-center">
                        <!--
                        <img src="<?php //echo base_url('public/img/titular-jornadas.png'); ?>" alt="" class="img-responsive obj-centrar img-titular-principal" />
                        -->
                        <h1 class="titular-principal text-center">NIVEL 2</h1>
                    </div>
                </div>

                <div class="row preguntas-contenido">
                    <div id="carousel-preguntas" class="carousel slide alto-completo" data-interval="false" data-ride="carousel">
                        <?php echo form_open("user/resumenNivel1/" . $materia->id , array('class' => 'carousel-inner alto-completo', 'role' => 'form')); ?>
                            <!-- INTRO -->
                            <div class="item active alto-completo">
                                <div class="v-center-contenedor">
                                    <div class="v-center-contenido">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                            <div class="container-fluid text-center fondo-lista">
                                                <div class="row espaciado-a">
                                                    <div class="col-md-12">
                                                        <h1 class="titular-encuesta">
                                                            <?php echo $juegoNivel2["nombre"] ?>
                                                        </h1>
                                                    </div>
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <p class="txt-contenido espaciado-a">
                                                            <?php echo $juegoNivel2["descripcion"] ?>
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
                                                <div class="row espaciado-a">
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
                                                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                                        <img src="<?php echo base_url('public/img/titular-selecciona.png'); ?>" alt="" class="img-responsive obj-centrar img-titular" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php $numP = 1; ?>
                                                    <?php foreach ($preguntas as $pregunta): ?>
                                                        <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                            <div onclick="irAPregunta(<?php echo $pregunta['id']; ?>);" class="link-jornadas no-pregunta text-center hvr-wobble-to-top-right" id="link-pregunta-<?php echo $pregunta['id']; ?>">
                                                                <h1 class="txt-no-pregunta"><?php echo $numP; $numP = $numP + 1;?></h1>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>

                                                <div class="row espaciado-a">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-lg btn-siguiente hvr-buzz" value="Enviar Respuestas" />
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
                                                                <?php echo ($pregunta['texto']); ?>
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
                                                            <div class="btn btn-lg btn-okay hvr-buzz" onclick="verificarRespuestas1('<?php echo $pregunta["id"]; ?>', 'no-preguntas');">Aceptar</div>
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


<canvas id='s'>This application requires a (fast) HTML5 compliant browser.</canvas>

<style type="text/css">
    #s{
        position: absolute;
        bottom: -53px;
        left: 0px;
        min-height: 100%;
        height: auto;
    }
    body{
        overflow: hidden;
    }
    .w-nivel1{
        z-index: 99;
    }

</style>

<script type="text/javascript">
    
    
/**
 * Original version http://labs.hyperandroid.com/js1k
 */
(function() {
  Grass = function() {
    return this;
  };
  
  Grass.prototype= {
      
    
    alto_hierba: 0,    // grass height
    maxAngle:    0,    // maximum grass rotation angle (wind movement)
    angle:       0,    // construction angle. thus, every grass is different to others  
    coords:      null,  // quadric bezier curves coordinates
    color:       null,  // grass color. modified by ambient component.
    offset_control_point:   3,    // grass base width. greater values, wider at the basement.

    initialize : function(canvasWidth, canvasHeight, minHeight, maxHeight, angleMax, initialMaxAngle)  {

      // grass start position
      var sx= Math.floor( Math.random()*canvasWidth );
      var sy= canvasHeight;
      
      // quadric curve middle control point. higher values means wider grass from base to peak.
      // try offset_control_x=10 for thicker grass.
      var offset_control_x=1.5;  
      
      this.alto_hierba= minHeight+Math.random()*maxHeight;
      this.maxAngle= 10+Math.random()*angleMax;
      this.angle= Math.random()*initialMaxAngle*(Math.random()<0.5?1:-1)*Math.PI/180;

      // hand crafted value. modify offset_control_x to play with grass curvature slope.
      var csx= sx-offset_control_x ;

      // grass curvature. greater values make grass bender. 
      // try with:  
      //        var csy= sy-this.alto_hierba;  -> much more bended grass.
      //        var csy= sy-1;                 -> totally unbended grass.
      //        var csy= sy-this.alto_hierba/2;-> original. good looking grass.
      var csy= 0;
      if ( Math.random()<0.1 ) {
        csy= sy-this.alto_hierba;
      } else {
        csy= sy-this.alto_hierba/2;
      }
          
      /**
       I determined that both bezier curves that conform each grass should have
       the same middle control point to be parallel.
       You can play with psx/psy adding or removing values to slightly modify grass
       geometry.
      **/
      var psx= csx;
      // changed var psy= csy; to
      var psy= csy-offset_control_x;
          
      // the bigger offset_control_point, the wider on its basement.
      this.offset_control_point=3;
      var dx= sx+this.offset_control_point;
      var dy= sy;      
      
      this.coords= [sx,sy,csx,csy,psx,psy,dx,dy];
          
      // grass color.
      this.color= [16+Math.floor(Math.random()*32),
                   100+Math.floor(Math.random()*155),
                   16+Math.floor(Math.random()*32) ];
      
    },
    
    /**
     * paint every grass.
     * @param ctx is the canvas2drendering context
     * @param time for grass animation.
     * @param ambient parameter to dim or brighten every grass.
     * @returns nothing
     */
    paint : function(ctx,time,ambient) {

          ctx.save();
          
          // grass peak position. how much to rotate the peak.
          // less values (ie the .0005), will make as if there were a softer wind.
          var inc_punta_hierba= Math.sin(time*0.0005);
          
          // rotate the point, so grass curves are modified accordingly. If just moved horizontally, the curbe would
          // end by being unstable with undesired visuals. 
          var ang= this.angle + Math.PI/2 + inc_punta_hierba * Math.PI/180*(this.maxAngle*Math.cos(time*0.0002));
          var px= this.coords[0]+ this.offset_control_point + this.alto_hierba*Math.cos(ang);
          var py= this.coords[1]                  - this.alto_hierba*Math.sin(ang);
    
          var c= this.coords;
      
          ctx.beginPath();
          ctx.moveTo( c[0], c[1] );
          ctx.bezierCurveTo(c[0], c[1], c[2], c[3], px, py);
          ctx.bezierCurveTo(px, py, c[4], c[5], c[6], c[7]);
          ctx.closePath();
          ctx.fillStyle='rgb('+
              Math.floor(this.color[0]*ambient)+','+
              Math.floor(this.color[1]*ambient)+','+
              Math.floor(this.color[2]*ambient)+')';
          ctx.fill();

          ctx.restore();
            
    }  
  };
})();

(function() {
  Garden= function() {
    return this;
  };
  
  Garden.prototype= {
    grass:      null,
    ambient:    1,
    stars:      null,
    firefly_radius:  10,
    num_fireflyes:  40,
    num_stars:    512,
    width:      0,
    height:      0,
    
    initialize : function(width, height, size)  {
      this.width= width;
      this.height= height;
      this.grass= [];
      
      for(var i=0; i<size; i++ ) {
        var g= new Grass();
        g.initialize(
            width,
            height,
            50,      // min grass height 
            height*2/3, // max grass height
            20,     // grass max initial random angle 
            40      // max random angle for animation 
            );
        this.grass.push(g);
      }
      
      this.stars= [];
      for( i=0; i<this.num_stars; i++ )  {
        this.stars.push( Math.floor( Math.random()*(width-10)+5  ) );
        this.stars.push( Math.floor( Math.random()*(height-10)+5 ) );
      }
    },
    
    paint : function(ctx, time){
      ctx.save();
      
      // draw stars if ambient below .3 -> night
      if ( this.ambient<0.3 )  {
        
        // modify stars translucency by ambient (as transitioning to day, make them dissapear).
        ctx.globalAlpha= 1-((this.ambient-0.05)/0.25);

        // as well as making them dimmer
        intensity= 1 - (this.ambient/2-0.05)/0.25;
        
        // how white do you want the stars to be ??
        var c= Math.floor( 192*intensity );
        var strc= 'rgb('+c+','+c+','+c+')';
        ctx.strokeStyle=strc;
        
        // first num_fireflyes coordinates are fireflyes themshelves.
        for( var j=this.num_fireflyes*2; j<this.stars.length; j+=2 )  {
          var inc=1;
          
          // every one out of 3 stars move at 1.5 increment
          if ( j%3===0 ) {
            inc=1.5;
          } else if ( j%11===0 ) {
          // every one out of 11 stars move at 2.5 increment
            inc=2.5;
          }
          // all the others at increment 1
          this.stars[j]= (this.stars[j]+0.1*inc)%canvas.width;
          
          var y= this.stars[j+1];
          ctx.strokeRect(this.stars[j],this.stars[j+1],1,1);

        }
      }
      
      ctx.globalAlpha= 1;
      
      var i;
      // draw fireflyes
        ctx.fillStyle= '#ffff00';      
        for(i=0; i<this.num_fireflyes*2; i+=2) {
          var angle= Math.PI*2*Math.sin(time*3E-4) + i*Math.PI/50;
          var radius= this.firefly_radius*Math.cos(time*3E-4);
          ctx.fillRect( 
              this.width/2 + 
              0.5*this.stars[i] + 
              150*Math.cos(time*3E-4) * Math.sin(time*0.00001*i) +  // move horizontally with time 
              radius*Math.cos(angle),
              
              this.height/2 + 
              0.5*this.stars[i+1] +  
              20*Math.sin(time*3E-4) * 5* Math.cos(time*0.00001*i)+  // move vertically with time 
              radius*Math.sin(angle),
              
                3,
                3 );
        }            
      
      
      for(i=0; i<this.grass.length; i++ ) {
        this.grass[i].paint(ctx,time,this.ambient);
      }
      ctx.restore();
    }
  };
})();


    function _doit()    {
      
      ctx.fillStyle= gradient;
      ctx.fillRect(0,0,canvas.width,canvas.height);
      var ntime= new Date().getTime();
      var elapsed= ntime-time;
      garden.paint( ctx, elapsed );
      
      // lerp.
      if ( elapsed>nextLerpTime ) {
        lerpindex= Math.floor((elapsed-nextLerpTime)/nextLerpTime);
        if ( (elapsed-nextLerpTime)%nextLerpTime<lerpTime ) {
          lerp( (elapsed-nextLerpTime)%nextLerpTime, lerpTime );
        }
      }
      
    }
    
    /**
     * fade sky colors
     * @param time current time
     * @param last how much time to take fading colors
     */
    function lerp( time, last ) {
      gradient= ctx.createLinearGradient(0,0,0,canvas.height);
      
      var i0= lerpindex%colors.length;
      var i1= (lerpindex+1)%colors.length;
      
      for( var i=0; i<4; i++ )  {
        var rgb='rgb(';
        for( var j=0; j<3; j++ ) {
          rgb+= Math.floor( (colors[i1][i*3+j]-colors[i0][i*3+j])*time/last + colors[i0][i*3+j]);
          if ( j<2 ) rgb+=',';
        }
        rgb+=')';
        gradient.addColorStop( i/3, rgb );
      }
      
      garden.ambient= (ambients[i1]-ambients[i0])*time/last + ambients[i0];
    }

    
var lerpTime= 10000;    // time taken to fade sky colors
var nextLerpTime= 15000;  // after fading, how much time to wait to fade colors again.

var interval= null;
var canvas= null;
var ctx= null;
var garden= null;

var gradient;
var time;

    function init(images) {
      
        canvas= document.getElementById('s');
        ctx= canvas.getContext('2d');
        canvas.width= window.innerWidth;
        canvas.height=window.innerHeight;

        garden= new Garden();
        garden.initialize(canvas.width, canvas.height, 300);
        
        lerp(0,2000);
        
        time= new Date().getTime();
        interval = setInterval(_doit, 30);
    }

    // sky colors
    colors= [ [ 0x00, 0x00, 0x3f, 
            0x00, 0x3f, 0x7f,
            0x1f, 0x5f, 0xc0,
            0x3f, 0xa0, 0xff ],

          [ 0x00, 0x3f, 0x7f, 
            0xa0, 0x5f, 0x7f,
            0xff, 0x90, 0xe0,
            0xff, 0x90, 0x00 ],
            
            
          [ 0x00, 0x00, 0x00,
            0x00, 0x2f, 0x7f,
            0x00, 0x28, 0x50,
            0x00, 0x1f, 0x3f ],
            
            [ 0x1f, 0x00, 0x5f,
              0x3f, 0x2f, 0xa0,
              0xa0, 0x1f, 0x1f,
              0xff, 0x7f, 0x00 ] ];
    
    // ambient intensities for each sky color
    ambients= [ 1, 0.35, 0.05, 0.5 ];
    
    // start with this sky index.
    lerpindex= 0;
    
window.addEventListener(
    'load',
    init(null),
    false);




</script>