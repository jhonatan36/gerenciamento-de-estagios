<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('permissao_model', 'permissao');
        $this->load->model('perfil_model', 'perfil');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'titulo' => 'Perfis',
                'tela' => 'permissao_retrieve',
                'perfis' => $this->perfil->retorna_perfis(NULL, 'nome ASC', TRUE),
                'metodos' => $this->permissao->retorna_metodos()
            );

            if ($this->input->post('perfil') != NULL) {
                $dados['perfil_selecionado'] = $this->input->post('perfil');
            }

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function alterar_permissao() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {
            if ($this->input->post() != NULL) {

                $retorno = $this->permissao->verifica_permissao($this->input->post('perfil'), $this->input->post('metodo'));
                if ($retorno) {
                    $condicao = array(
                        'id_perfil' => $this->input->post('perfil'),
                        'id_metodo' => $this->input->post('metodo')
                    );
                    if ($this->permissao->remove_permissao($condicao)) {
                        echo 'Permissão removida!';
                    } else {
                        $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Erro ao remover permissão!'));
                        redirect('permissao');
                    }
                } else {
                    $dados = array(
                        'id_perfil' => $this->input->post('perfil'),
                        'id_metodo' => $this->input->post('metodo'),
                        'data_cadastro' => getData('Y/m/d H:i:s')
                    );
                    if ($this->permissao->adiciona_permissao($dados)) {
                        echo 'Permissão concedida!';
                    } else {
                        $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Erro ao adicionar permissão!'));
                        redirect('permissao');
                    }
                }
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
