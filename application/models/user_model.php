<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class User_model extends CI_Model {
        
        public function __construct()
        {
            parent::__construct();
        }

    	function login($cedula,$password){
    		$this->db->where("cedula",$cedula);
            $this->db->where("password",$password);
                
            $query = $this->db->get("participante");
            if($query->num_rows()>0){
             	foreach($query->result() as $rows){
                	//add all data to session
                    $newdata = array(
                    	   	'user_id'              => $rows->id,
                            'user_cedula'          => $rows->cedula,
                        	'user_nombre'          => $rows->nombre,
    		                'user_email'           => $rows->email,
                            'user_genero'          => $rows->genero,
                            'user_fechanacimiento' => $rows->fechanacimiento,
                            'user_puntajemaximo'   => $rows->puntajemaximo,
                            'user_puntajeminimo'   => $rows->puntajeminimo,
                            'user_vidasxjuego'     => $rows->vidasxjuego,
                            'user_vidasperdidas'   => $rows->vidasperdidas,
                            'user_estado'          => $rows->estado,
    	                    'logged_in'            => TRUE,
                       );
    			}
            	$this->session->set_userdata($newdata);
                return true;            
    		}
    		return false;
        }

    	public function add_user(){
    		$data = array(
                'nombre'          =>$this->input->post('user_nombre'),
    			'cedula'          =>$this->input->post('user_cedula'),
    			'email'           =>$this->input->post('user_email'),
    			'password'        =>md5($this->input->post('user_password')),
                'genero'          =>$this->input->post('user_genero'),
                'fechanacimiento' => 0,
                'puntajemaximo'   => 0,
                'puntajeminimo'   => 0,
                'estado'          => 1,
                'fecha'          => date('Y-m-d H:i:s')
    			);
    		$this->db->insert('participante',$data);
    	}
    }
?>