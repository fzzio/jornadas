<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Respuesta_model extends CI_Model {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
        }

    	public function add_respuestas(){

            $arrJuegos = $this->db->get_where('juego', array('estado' => 1))->result_array() ;
            $data['juegoNivel1'] = $arrJuegos[0];
            $data['preguntas'] = $this->db->get_where('pregunta', array('estado' => 1, 'idjuego' => $data['juegoNivel1']["id"]   ))->result_array();

            for ($i=0; $i < count($data['preguntas']) ; $i++) { 
                $data['preguntas'][$i]["respuestas"] = $this->db->get_where('pregunta_opcion', array('estado' => 1, 'idpregunta'=>$data['preguntas'][$i]["id"] ))->result_array() ;
            }

           // print_r($this->input->post());
            //print_r($this->session->userdata('id'));
            
             //[om-1-2] => 2 [om-1-3] => 3 [vf-2] => 6 [om-3-7] => 

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

            /*if ( count($listaRespuestas) ) {
                return false;
            }*/

            for ($i=0; $i < count($listaRespuestas) ; $i++) { 
                $data = array(
                    'idparticipante'   =>$this->session->userdata('user_id'),
                    'idpreguntaopcion' =>$listaRespuestas[$i],
                    'estado'          => 1,
                    'fecha'          => date('Y-m-d H:i:s')
                    );
    		    $this->db->insert('respuesta',$data);
            }

            return true;
            
    	}
    }
?>