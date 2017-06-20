<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Metodo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('metodo_model', 'metodo');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'titulo' => 'Metodos',
                'tela' => 'metodo_retrieve',
                'metodos' => $this->metodo->retornar(NULL, NULL, TRUE),
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("acesso_negado");
        }
    }

    public function excluir() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {
            $id = $this->uri->segment(3);

            if ($id != NULL) {

                if ($this->metodo->excluir(array('id' => $id))) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Método deletado com sucesso!'));
                    redirect('metodo');
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível excluir!'));
                    redirect('metodo');
                }
            }
        } else {

            $this->load->view("acesso_negado");
        }
    }

}
