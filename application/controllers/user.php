<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
			$this->load->model('respuesta_model');
	        $this->load->database();
	        $this->load->helper('url');
	        $this->load->library('grocery_CRUD');
		}

		public function index(){
			if(($this->session->userdata('user_cedula')!="")){
				$this->welcome();
			}else{
				$data['title']= 'Home';
				$this->load->view('jornadas/header',$data);
				$this->load->view("jornadas/registration_view", $data);
				$this->load->view('jornadas/footer',$data);
			}
		}

		public function welcome(){
			$data['title']= 'Bienvenido Todos';
			$data['user_nombre']= $this->session->userdata('user_nombre');


			$data['juegos'] = $this->db->get_where('pregunta', array('estado' => 1));
	        $data['preguntas'] = $this->db->get_where('pregunta', array('estado' => 1));
	        $data['respustasOpciones'] = $this->db->get_where('pregunta_opcion', array('estado' => 1));

			$this->load->view('jornadas/header',$data);
			$this->load->view("jornadas/menu", $data);
			$this->load->view("jornadas/bienvenida", $data);
			$this->load->view('jornadas/footer',$data);
		}

		public function login(){
			$cedula = $this->input->post('cedula');
			$password = md5($this->input->post('password'));

			$result=$this->user_model->login($cedula,$password);
			if($result){
				$this->welcome();
			}else{
				$this->index();
			}
		}

		public function thank(){
			$data['title']= 'Gracias por registrarse';
			$this->load->view('jornadas/header',$data);
			$this->load->view("jornadas/thank_view", $data);
			$this->load->view('jornadas/footer',$data);
		}

		public function registration(){
			$this->load->library('form_validation');
			// field name, error message, validation rules
			$this->form_validation->set_rules('user_cedula', 'Cédula', 'trim|required|max_length[10]|xss_clean');
			$this->form_validation->set_rules('user_nombre', 'Nombre y Apellidos', 'trim|required|max_length[50]|xss_clean');
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('user_genero', 'Género', 'required');
			$this->form_validation->set_rules('user_password', 'Contraseña', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('con_password', 'Confirmación de Contraseña', 'trim|required|matches[user_password]');

			if($this->form_validation->run() == FALSE){
				$this->index();
			}else{
				$this->user_model->add_user();
				$this->thank();
			}
		}




		public function logout(){
			$newdata = array(
				'user_id' => '',
				'user_cedula' => '',
				'user_nombre' => '',
				'user_email' => '',
				'user_genero' => '',
				'user_fechanacimiento' => '',
				'user_puntajemaximo' => '',
				'user_puntajeminimo' => '',
				'user_vidasxjuego' => '',
				'user_vidasxjuego' => '',
				'user_estado' => '',
				'logged_in' => FALSE,
			);
			$this->session->unset_userdata($newdata );
			$this->session->sess_destroy();
			$this->index();
		}

		///////////////////////////////////////////////////////////////

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

	    public function juegoUno(){

	        if(($this->session->userdata('user_cedula')!="")){
				
	        	$data['user_nombre'] = $this->session->userdata('user_nombre');


	        	$data['user_vidasxjuego']= $this->session->userdata('user_vidasxjuego');
            	$data['user_vidasperdidas']= $this->session->userdata('user_vidasperdidas');

	        	$data['participante'] = $this->db->get_where('participante', array('estado' => 1, 'id' => $this->session->userdata('user_id')))->row();

				$arrJuegos = $this->db->get_where('juego', array('estado' => 1))->result_array() ;
				$data['juegoNivel1'] = $arrJuegos[0];
		        $data['preguntas'] = $this->db->get_where('pregunta', array('estado' => 1, 'idjuego' => $data['juegoNivel1']["id"]   ))->result_array();

		        for ($i=0; $i < count($data['preguntas']) ; $i++) { 
		        	$data['preguntas'][$i]["respuestas"] = $this->db->get_where('pregunta_opcion', array('estado' => 1, 'idpregunta'=>$data['preguntas'][$i]["id"] ))->result_array() ;
		        }

		        //print_r( $data['preguntas'] );

	        	$data['title']= 'Nivel 1';
				$this->load->view('jornadas/header',$data);
				$this->load->view("jornadas/menu", $data);
				$this->load->view("jornadas/nivel1", $data);
				$this->load->view('jornadas/footer',$data);


			}else{
				$data['title']= 'Home';
				$this->load->view('jornadas/header',$data);
				$this->load->view("jornadas/registration_view", $data);
				$this->load->view('jornadas/footer',$data);
			}
	    }

	    ////////////////////////////////////////////////////////////////

	    public function preguntasNivel1(){


	    	$arrJuegos = $this->db->get_where('juego', array('estado' => 1))->result_array() ;
			$data['juegoNivel1'] = $arrJuegos[0];
	        $data['preguntas'] = $this->db->get_where('pregunta', array('estado' => 1, 'idjuego' => $data['juegoNivel1']["id"]   ))->result_array();
	        for ($i=0; $i < count($data['preguntas']) ; $i++) { 
	        	$data['preguntas'][$i]["respuestas"] = $this->db->get_where('pregunta_opcion', array('estado' => 1, 'idpregunta'=>$data['preguntas'][$i]["id"] ))->result_array() ;
	        }


	        //Resultados
	        $listaRespuestas = array();
            foreach ($data['preguntas'] as $preguntaRespuestas) {
                foreach ($preguntaRespuestas["respuestas"] as $opcionRespuesta) {
                    $idPreguntaOpcion = $opcionRespuesta["id"];

                    $opcionRespuestaIndice = "om-" . $preguntaRespuestas["id"] . "-" . $opcionRespuesta["id"];
                    $opcionRespuestaIndice2 = "vf-" . $preguntaRespuestas["id"];

                    $elemento = $this->input->post($opcionRespuestaIndice);

                    if( isset($elemento) && !empty($elemento) ){
                        array_push($listaRespuestas, $elemento);
                    }

                    $elemento2 = $this->input->post($opcionRespuestaIndice2);
                    if( isset($elemento2) && !empty($elemento2) ){
                        array_push($listaRespuestas, $elemento2);
                    }

                }
            }
            $data['resultados'] = $listaRespuestas;
            $data['user_nombre']= $this->session->userdata('user_nombre');

			//$this->respuesta_model->add_respuestas();


			if (  $this->respuesta_model->add_respuestas() ) {
				# code...
				$data['title']= 'Nivel 1 - Resumen';
				$this->load->view('jornadas/header',$data);
				$this->load->view("jornadas/menu", $data);
				$this->load->view("jornadas/nivel1_resumen", $data);
			}else{
				$data['title']= 'Nivel 1';
				$this->load->view('jornadas/header',$data);
				$this->load->view("jornadas/menu", $data);
				$this->load->view("jornadas/nivel1", $data);
			}
			$this->load->view('jornadas/footer',$data);

			//print_r($this->session->userdata('user_id'));

		}

		public function reducirVidas(){
			$participante = $this->db->get_where('participante', array('estado' => 1, 'id' => $this->session->userdata('user_id')))->row();
			
			$resultado = array();
			if(($participante->vidasperdidas + 1) <=  $participante->vidasxjuego){
				$participante->vidasperdidas = $participante->vidasperdidas + 1;
				$data = array(
					'vidasperdidas' => $participante->vidasperdidas,
					'vidasxjuego' => $participante->vidasxjuego
	            );
	            $this->db->update('participante', $data, array('id' => $this->session->userdata('user_id')));
				$resultado = array(
	            	'codigo' => 1,
	                'Mensaje' => "Se han quitado vidas",
	                'vidasperdidas' => ($participante->vidasperdidas) * 1,
	                'vidasxjuego' => ($participante->vidasxjuego) * 1
	            );
			}else{
				$participante->vidasperdidas = $participante->vidasperdidas ;
				$resultado = array(
	            	'codigo' => 2,
	                'Mensaje' => "No se han quitado vidas",
	                'vidasperdidas' => ($participante->vidasperdidas) * 1,
	                'vidasxjuego' => ($participante->vidasxjuego) * 1
	            );
			}

            header('Content-Type: application/json');
        	echo json_encode( $resultado );
		}

		public function resetearVidas(){
			$participante = $this->db->get_where('participante', array('estado' => 1, 'id' => $this->session->userdata('user_id')))->row();
			$data = array(
				'vidasxjuego' => $participante->vidasxjuego,
				'vidasperdidas' => 0
            );
            $this->db->update('participante', $data, array('id' => $this->session->userdata('user_id')));
			
			$resultado = array(
            	'codigo' => 1,
                'Mensaje' => "Se han reseteado vidas",
                'vidasperdidas' => ($participante->vidasperdidas) * 1,
                'vidasxjuego' => ($participante->vidasxjuego) * 1
            );
		

            header('Content-Type: application/json');
        	echo json_encode( $resultado );
		}
	}
?>