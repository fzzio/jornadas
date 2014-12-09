<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');

        
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$debug = false;
		$data['debug'] = $debug;
		$data['header'] = $this->load->view('jornadas/header', array());



        $contenido['juegos'] = $this->db->get_where('pregunta', array('estado' => 1));
        $contenido['preguntas'] = $this->db->get_where('pregunta', array('estado' => 1));
        $contenido['respustasOpciones'] = $this->db->get_where('pregunta_opcion', array('estado' => 1));


      	$data['content'] = $this->load->view('jornadas/index', $contenido);
        $data['footer'] = $this->load->view('jornadas/footer', array());
	}

    public function getPreguntasXJuego(){

        $debug = false;
        $data['debug'] = $debug;

        $idJuego = $this->uri->segment(3); //idJuego

        $preguntas = $this->db->get_where('pregunta', array('estado' => 1, 'idjuego' => $idJuego));

        return $preguntas;
    }

    public function getPreguntasOpcionesXPregunta(){

        $debug = false;
        $data['debug'] = $debug;

        $idPregunta = $this->uri->segment(3); //idPregunta

        $preguntaOpciones = $this->db->get_where('pregunta_opcion', array('estado' => 1, 'idpregunta' => $idPregunta));

        return $preguntaOpciones;
    }

    public function getParticipanteXUser(){

        $debug = false;
        $data['debug'] = $debug;

        $idUsuario = $this->uri->segment(3); //idUsuario

        $participante = $this->db->get_where('participante', array('estado' => 1, 'idusuario' => $idUsuario))->row();

        return $participante;
    }



    public function verificarRespuestas(){
        $debug = false;
        $data['debug'] = $debug;
        $resultado = array();

        
        if(($this->input->post()!="")){
            $idPregunta = $this->input->post('idPregunta');

            $pregunta = $this->db->get_where('pregunta', array('id' => $idPregunta ) )->row();

            $respuestasCorrectas = $this->db->get_where('pregunta_opcion', array('estado' => 1, 'idpregunta'=>$idPregunta, 'correcta' => 1 ))->result_array() ;
            $respuestasRecibidas = $this->input->post('respuestas');

            //Verificacion de resultados
            $listaRespuestas = array();            
            foreach ($respuestasCorrectas as $opcionRespuesta) {
                $idPreguntaOpcion = $opcionRespuesta["id"];

                $opcionRespuestaIndice = "om-" . $idPregunta . "-" . $opcionRespuesta["id"];
                $opcionRespuestaIndice2 = "vf-" . $idPregunta;

                //$elemento = $respuestasRecibidas[$opcionRespuestaIndice];

                if( isset($respuestasRecibidas[$opcionRespuestaIndice]) 
                    && !empty($respuestasRecibidas[$opcionRespuestaIndice]) ){
                    array_push($listaRespuestas, $respuestasRecibidas[$opcionRespuestaIndice]);
                }

                //$elemento2 = $respuestasRecibidas[$opcionRespuestaIndice2];
                if( isset($respuestasRecibidas[$opcionRespuestaIndice2])
                    && !empty($respuestasRecibidas[$opcionRespuestaIndice2]) ){

                    array_push($listaRespuestas, $respuestasRecibidas[$opcionRespuestaIndice2]);
                }
            }

            if ( count( $listaRespuestas ) == count( $respuestasCorrectas )  ) {
                // la respuesta es correcta

                $resultado = array(
                    'codigo' => 1,
                    'Mensaje' => "correcto",
                    //'respuestasRecibidas' => $respuestasRecibidas,
                    //'respuestasCorrectas' => $respuestasCorrectas
                );
            }else{
                $resultado = array(
                    'codigo' => 2,
                    'Mensaje' => "Respuesta incorrecta",
                    //'respuestasRecibidas' => $respuestasRecibidas,
                    //'respuestasCorrectas' => $respuestasCorrectas
                );
            }
            
        }else{
            $resultado = array(
                'codigo' => 3,
                'Mensaje' => "no se recibio respuestas");
        }

        header('Content-Type: application/json');
        echo json_encode( $resultado );
    }

}