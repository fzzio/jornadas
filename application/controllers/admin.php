<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('securityuser');
        $this->load->library('grocery_CRUD');
    }

    ///// iconos 
    ///http://getbootstrap.com/2.3.2/base-css.html#icons
    public function getMenu() {
        $menu = array();
        array_push($menu, array("url" => "admin/materia", "label" => "Materia", "icon" => "icon-home"));
        array_push($menu, array("url" => "admin/juego", "label" => "Juego/Nivel", "icon" => "icon-home"));
        array_push($menu, array("url" => "admin/pregunta", "label" => "Preguntas", "icon" => "icon-home"));
        array_push($menu, array("url" => "admin/preguntaOpcion", "label" => "Preguntas: Opciones Respuesta", "icon" => "icon-home"));
        array_push($menu, array("url" => "admin/participante", "label" => "Participantes", "icon" => "icon-home"));
        return $menu;
    }

    /* no modificar */

    public function getMenuAdmin() {
        $menu = array();
        array_push($menu, array("url" => "admin/usuario", "label" => "Usuarios", "icon" => "icon-user"));
        return $menu;
    }

    public function showPage($output = null) {
        if ($this->securityCheck()) {
            $output->data['menu'] = $this->getMenu();
            $output->data['menuAdmin'] = $this->getMenuAdmin();
            $this->load->view('../../template/index.php', $output);
        } else {
            redirect("admin/login");
        }
    }

    public function index() {

        $this->showPage((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function usuario() {
        $crud = new grocery_CRUD();
        $crud->set_table("securityuser");

        $crud->columns('usuario', 'fecha_creacion');
        // $crud->fields('usuario','password','nombre','correo');


        $crud->field_type('password', 'password');

        $crud->change_field_type('fecha_creacion', 'invisible');
        $crud->change_field_type('fecha_modificacion', 'invisible');
        $crud->change_field_type('password_anterior', 'invisible');
        $crud->change_field_type('estado', 'invisible');

        $crud->callback_before_insert(array($this, 'usuario_insert_callback'));

        $output = $crud->render();
        $this->showPage($output);
    }

    public function login() {

        $this->load->view('../../template/login.php');
    }

    public function logout() {

        $securityUser = new SecurityUser();
        $securityUser->logout();
        $this->load->view('../../template/login.php');
    }

    public function autentificar() {

        $username = $this->input->post("username");
        $password = $this->input->post("passsword");

        $securityUser = new SecurityUser();
        $securityUser->login($username, $password);

        redirect("admin/index");

        //  $this->load->view('../../template/login.php');
    }

    function usuario_insert_callback($post_array) {

        $post_array['fecha_creacion'] = date("d.m.Y h:i:s");
        $post_array['fecha_modificacion'] = date("d.m.Y h:i:s");
        $post_array['estado'] = 'A';
        $post_array['fecha_modificacion'] = date("d.m.Y h:i:s");
        $post_array['password_anterior'] = $post_array['password'];

        return $post_array;
    }

    function securityCheck() {

        $usuario = $this->session->userdata('user_login');
        if ($usuario == "") {
            return false;
        } else {
            return true;
        }
    }

    //////////////////////////////////////////////////////    
    function _add_default_date_value(){
            $value = !empty($value) ? $value : date("d/m/Y");
            $return = '<input type="text" name="date" value="'.$value.'" class="datepicker-input" /> ';
            $return .= '<a class="datepicker-input-clear" tabindex="-1">Clear</a> (dd/mm/yyyy)';
            return $return;
    }
    //////////////////////////////////////////////////////

    public function juego(){
        $crud = new grocery_CRUD();
        $crud->set_table("juego");
        $crud->set_subject('Juego / Nivel');
        $crud->display_as('nombre','Nombre');
        $crud->display_as('descripcion','Descripción');
        $crud->display_as('estado','Estado');
        $crud->display_as('idmateria','Materia');

        $crud->columns('nombre', 'descripcion', 'estado', 'idmateria');
        $crud->fields('nombre', 'descripcion', 'estado', 'idmateria');
        $crud->required_fields('nombre', 'descripcion', 'estado', 'idmateria');
        
        $crud->field_type('descripcion', 'string');
        $crud->set_relation('idmateria', 'materia', 'nombre');

        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function pregunta(){
        $crud = new grocery_CRUD();
        $crud->set_table("pregunta");
        $crud->set_subject('Preguntas');
        $crud->display_as('texto','Texto de pregunta');
        $crud->display_as('tipo','Tipo de respuestas');
        $crud->display_as('idjuego','Juego/Nivel al que pertenece');
        $crud->display_as('estado','Estado');


        $crud->columns('idjuego', 'tipo', 'texto', 'estado');
        $crud->fields('idjuego', 'tipo', 'texto', 'estado');
        $crud->required_fields('texto', 'tipo', 'idjuego', 'estado');
        
        $crud->field_type('texto', 'string'); 

        $crud->set_relation('idjuego', 'juego', 'nombre');

        $crud->field_type('tipo', 'dropdown', array(
            '1' => 'Opción Múltiple',
            '2' => 'Verdadero y Falso'
        ));
        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function preguntaOpcion(){
        $crud = new grocery_CRUD();
        $crud->set_table("pregunta_opcion");
        $crud->set_subject('Opciones de Respuesta');
        $crud->display_as('idpregunta','Pregunta');
        $crud->display_as('texto','Respesta');
        $crud->display_as('correcta','Es correcta');
        $crud->display_as('estado','Estado');


        $crud->columns('idpregunta', 'texto', 'correcta', 'estado');
        $crud->fields('idpregunta', 'texto', 'correcta', 'estado');
        $crud->required_fields('idpregunta', 'texto', 'correcta', 'estado');
        
        $crud->field_type('texto', 'string'); 

        $crud->set_relation('idpregunta', 'pregunta', 'texto');

        $crud->field_type('correcta', 'dropdown', array(
            '1' => 'Sí',
            '0' => 'No'
        ));
        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function participante(){
        $crud = new grocery_CRUD();
        $crud->set_table("participante");
        $crud->set_subject('Participante');
        $crud->display_as('cedula','Cédula de Identidad');
        $crud->display_as('nombre','Nombre completo');
        $crud->display_as('email','Email');
        $crud->display_as('estado','Estado');
        $crud->display_as('genero', 'Género');
        $crud->display_as('puntajemaximo','Puntaje Máximo');
        $crud->display_as('puntajeminimo', 'Puntaje Mínimo');
        $crud->display_as('fechanacimiento', 'Fecha de nacimiento');
        $crud->display_as('fecha','Fecha de ingeso al sistema');


        $crud->columns('cedula', 'nombre', 'email', 'genero', 'fechanacimiento', 'puntajemaximo', 'puntajeminimo', 'estado', 'fecha');
        $crud->fields('cedula', 'nombre', 'email', 'genero', 'fechanacimiento', 'puntajemaximo', 'puntajeminimo', 'estado', 'fecha');
        $crud->required_fields('cedula', 'nombre', 'genero', 'puntajemaximo', 'puntajeminimo', 'fechanacimiento', 'email', 'estado', 'fecha');
        
        $crud->field_type('fechanacimiento', 'date'); 
        $crud->field_type('fecha', 'datetime'); 

        $crud->field_type('genero', 'dropdown', array(
            '1' => 'Maculino',
            '2' => 'Femenino'
        ));
        
        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }


    public function materia(){
        $crud = new grocery_CRUD();
        $crud->set_table("materia");
        $crud->set_subject('Materia');
        $crud->display_as('nombre','Nombre de la Asignatura');
        $crud->display_as('estado','Estado');
        $crud->display_as('fecha','Fecha de ingeso al sistema');


        $crud->columns('nombre', 'estado', 'fecha');
        $crud->fields('nombre', 'estado', 'fecha');
        $crud->required_fields('nombre', 'estado', 'fecha');
        
        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }

    /*
    
    public function secciones(){
        $crud = new grocery_CRUD();
        $crud->set_table("seccion");
        $crud->set_subject('Secciones WEB');
        $crud->display_as('sec_titular','Titular');
        $crud->display_as('sec_subtitular','Subtitular');
        $crud->display_as('sec_descripcion','Descripción');

        $crud->display_as('sec_modificado','Fecha de Modificación');
        $crud->display_as('sec_estado','Estado');

        $crud->columns('sec_titular', 'sec_subtitular', 'sec_descripcion', 'sec_modificado', 'sec_estado');
        $crud->fields('sec_titular', 'sec_subtitular', 'sec_descripcion', 'sec_modificado', 'sec_estado');
        $crud->required_fields('sec_titular', 'sec_modificado', 'sec_estado');
        
        $crud->field_type('sec_descripcion', 'text'); 

        $crud->field_type('sec_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function servicio(){
        $crud = new grocery_CRUD();
        $crud->set_table("servicio");
        $crud->set_subject('Servicio');

        $crud->display_as('ser_titular','Titular Servicio');
        $crud->display_as('ser_subtitular','Subtitular Servicio');
        $crud->display_as('ser_descripcion','Descripción');
        $crud->display_as('ser_imagen','Imagen');
        $crud->display_as('ser_modificado','Fecha de Modificación');
        $crud->display_as('ser_estado','Estado');

        $crud->columns('ser_titular', 'ser_subtitular', 'ser_descripcion', 'ser_imagen', 'ser_modificado', 'ser_estado');
        $crud->fields('ser_titular', 'ser_subtitular', 'ser_descripcion', 'ser_imagen', 'ser_modificado',  'ser_estado');
        $crud->required_fields('ser_titular', 'ser_subtitular', 'ser_descripcion', 'ser_imagen', 'ser_modificado', 'ser_estado');
        $crud->set_field_upload('ser_imagen', 'assets/artesano/servicios');

        $crud->field_type('ser_descripcion', 'text'); 
        
        $crud->field_type('ser_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }


    public function servicioDiseno(){
        $crud = new grocery_CRUD();
        $crud->set_table("diseno_categoria");
        $crud->set_subject('Categorías - Diseño');


        $crud->display_as('cat_nombre','Nombre Categoría');
        $crud->display_as('cat_imagen','Imagen');
        $crud->display_as('cat_modificado','Fecha de Modificación');
        $crud->display_as('cat_estado','Estado');

        $crud->columns('cat_nombre', 'cat_imagen', 'cat_modificado', 'cat_estado');
        $crud->fields('cat_nombre', 'cat_imagen', 'cat_modificado', 'cat_estado');
        $crud->required_fields('cat_nombre', 'cat_imagen', 'cat_modificado', 'cat_estado');
        $crud->set_field_upload('cat_imagen', 'assets/artesano/seccion-diseno/thumbs');
        
        $crud->field_type('cat_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));

        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function servicioDisenoItems(){
        $crud = new grocery_CRUD();
        $crud->set_table("diseno_item");
        $crud->set_subject('ïtems - Diseño');


        $crud->display_as('ite_nombre','Nombre del Ítem');
        $crud->display_as('ite_descripcion','Descripción');
        $crud->display_as('ite_imagen','Imagen');
        $crud->display_as('ite_modificado','Fecha de Modificación');
        $crud->display_as('ite_estado','Estado');

        $crud->display_as('cat_id','Categoría');

        $crud->columns('ite_nombre', 'ite_descripcion', 'ite_imagen', 'ite_modificado', 'cat_id', 'ite_estado');
        $crud->fields('ite_nombre', 'ite_descripcion', 'ite_imagen', 'ite_modificado', 'cat_id', 'ite_estado');
        $crud->required_fields('ite_nombre', 'ite_descripcion', 'ite_imagen', 'ite_imagen', 'cat_id', 'ite_estado');
        $crud->set_field_upload('ite_imagen', 'assets/artesano/seccion-diseno');
        
        $crud->set_relation('cat_id', 'diseno_categoria', 'cat_nombre');

        $crud->field_type('ite_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));

        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function servicioAudio(){
        $crud = new grocery_CRUD();
        $crud->set_table("audio");
        $crud->set_subject('Audio');

        $crud->display_as('aud_nombre','Nombre');
        $crud->display_as('aud_descripcion','Descripción');
        $crud->display_as('aud_imagen','Imagen');
        $crud->display_as('aud_link','Link ID');
        $crud->display_as('aud_tipo','Tipo');
        $crud->display_as('aud_modificado','Fecha de Modificación');
        $crud->display_as('aud_estado','Estado');

        $crud->columns('aud_nombre', 'aud_descripcion', 'aud_imagen', 'aud_link', 'aud_tipo', 'aud_modificado', 'aud_estado');
        $crud->fields('aud_nombre', 'aud_descripcion', 'aud_imagen', 'aud_link', 'aud_tipo', 'aud_modificado', 'aud_estado');
        $crud->required_fields('aud_nombre', 'aud_descripcion', 'aud_link', 'aud_tipo', 'aud_modificado', 'aud_estado');
        


        $crud->set_field_upload('aud_imagen', 'assets/artesano/seccion-audio');
        $crud->field_type('aud_tipo', 'dropdown', array(
            'vimeo' => 'Vimeo',
            'youtube' => 'YouTube',
            //'soundcloud' => 'SoundCloud',
        ));
        $crud->field_type('aud_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));

        $output = $crud->render();
        $this->showPage($output);
    }

    public function servicioEvento(){
        $crud = new grocery_CRUD();
        $crud->set_table("evento");
        $crud->set_subject('Eventos');


        $crud->display_as('eve_nombre','Evento');
        $crud->display_as('eve_descripcion','Descripción');
        $crud->display_as('eve_imagen','Imagen');
        $crud->display_as('eve_modificado','Fecha de Modificación');
        $crud->display_as('eve_estado','Estado');

        $crud->columns('eve_nombre', 'eve_descripcion', 'eve_imagen', 'eve_modificado', 'eve_estado');
        $crud->fields('eve_nombre', 'eve_descripcion', 'eve_imagen', 'eve_modificado', 'eve_estado');
        $crud->required_fields('eve_nombre', 'eve_imagen', 'eve_modificado', 'eve_estado');
        $crud->set_field_upload('eve_imagen', 'assets/artesano/seccion-eventos');

        $crud->field_type('eve_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));



        
        $output = $crud->render();
        $this->showPage($output);
    }

    public function noticias(){
        $crud = new grocery_CRUD();
        $crud->set_table("noticia");
        $crud->set_subject('Noticias');


        $crud->display_as('not_titulo','Título');
        $crud->display_as('not_texto','Texto');
        $crud->display_as('not_fecha','Fecha');
        $crud->display_as('not_imagen','Imagen');
        $crud->display_as('not_estado','Estado');

        $crud->columns('not_titulo', 'not_fecha', 'not_imagen', 'not_estado');
        $crud->fields('not_titulo', 'not_texto', 'not_fecha', 'not_imagen', 'not_estado');
        $crud->required_fields('not_titulo', 'not_texto', 'not_fecha', 'not_imagen', 'not_estado');
        $crud->set_field_upload('not_imagen', 'assets/artesano/noticias');

        $crud->field_type('not_estado', 'dropdown', array(
            '1' => 'Activo',
            '2' => 'Inactivo'
        ));



        
        $output = $crud->render();
        $this->showPage($output);
    }*/

    
}