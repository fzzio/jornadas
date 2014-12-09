<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Security
 *
 * @author Hector
 */
class SecurityUser extends CI_Model {

    var $usuario = "";
    var $password = "";
    var $password_anterior = "";
    var $nombre = "";
    var $correo = "";
    var $fecha_creacion = "";
    var $fecha_modificacion = "";
    var $estado = "";

    
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    

    function login($username , $password ){
       $query  =  $this->db->get_where("securityuser", array('usuario'=> $username , 'password' => $password ));       
       if ($query->num_rows() > 0){
           $data = array("user_login" => $username ); 
           $this->session->set_userdata($data);
           return true ;
       }
    }
    
    function logout(){        
      $this->session->sess_destroy();        
    }
    
    
    
//    function logeado($username ){
//       $query  =  $this->db->get_where("usuario", array('usuario'=> $username , 'pswd' => $password ));       
//       if ($query->num_rows() > 0){
//           return true ;
//       }
//    }
    
    
    

}

?>
