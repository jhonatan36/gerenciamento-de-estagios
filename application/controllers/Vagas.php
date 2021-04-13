<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vagas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('vagas_model', 'vagas');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index(){
        
    }

    public function cadastrar(){

    }

    public function editar(){

    }

    public function excluir(){

    }

}