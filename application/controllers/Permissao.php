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

            $idPerfil = $this->input->get('perfil');
            $perfil = $this->perfil->retorna_perfis(array('id'=>$idPerfil))->row();

            $dados = array(
                'titulo' => 'Permissões do Perfil',
                'tela' => 'permissao_retrieve',
                'perfil_selecionado' => $perfil,
                'metodos' => $this->permissao->retorna_metodos()
            );

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
                        echo 'Erro ao inserir permissão. Provavelmente você não tem privilegios suficientes.';
                    }
                } else {
                    $dados = array(
                        'id_perfil' => $this->input->post('perfil'),
                        'id_metodo' => $this->input->post('metodo')
                    );
                    if ($this->permissao->adiciona_permissao($dados)) {
                        echo 'Permissão concedida!';
                    } else {
                        echo 'Erro ao remover permissão. Provavelmente você não tem privilegios suficientes.';
                    }
                }
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
