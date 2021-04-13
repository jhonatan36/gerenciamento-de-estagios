<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estagio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('estagio_model', 'estagio');
        $this->load->model('semestre_model', 'semestre');
        $this->load->model('naturezaVinculo_model', 'naturezaVinculo');
        $this->load->model('empresa_model', 'empresa');

        define('CH_TOTAL', 360);
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $estagio = $this->estagio->get(['idusuario' => $this->session->userdata('id')], null, false)->row();

            if ( $estagio == null ) {
                redirect('estagio/cadastrar');
            }

            $dados = array(
                'tela' => 'estagio_retrieve',
                'titulo' => 'Andamento do Estágio',
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function cadastrar() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $data_atual = date('Y-m-d');

            $semestre = $this->semestre->retornar(['status' => 1], null, false)->row();
            $natureza_vinculos = $this->naturezaVinculo->retornar_naturezaVinculo(['status' => 1], null, true);
            $empresas = $this->empresa->retorna_empresa(['status' => 1, 'inicio_vinculo <=' => $data_atual, 'final_vinculo >=' => $data_atual], null, true);

            $this->load->helper('sistema_helper');

            $dados = [
                'titulo' => 'Iniciar Estágio',
                'tela' => 'estagio_create',
                'funcao' => 'cadastrar',
                'semestre' => $semestre,
                'natureza_vinculos' => $natureza_vinculos,
                'empresas' => $empresas
            ];

            $this->load->view('system_view', $dados);

        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function verificaCH(){

        $semestre = $this->semestre->retornar(['status' => 1], null, false)->row();
        $ch_natureza = $this->input->post('ch');

        $resposta = verificaCHEstagio($ch_natureza, date('d/m/Y', strtotime($semestre->data_final)));

        return json_encode($resposta);
    }
}