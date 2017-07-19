<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('perfil_model', 'perfil');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'titulo' => 'Perfis Cadastrados',
                'tela' => 'perfil_retrieve',
                'perfis' => $this->perfil->retorna_perfis(NULL, 'nome ASC', TRUE),
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function cadastrar() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            if ($this->input->post() != NULL) {

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'status' => $this->input->post('status')
                );

                if ($this->perfil->cadastrar($cadastro)) {
                    set_msg('msg', 'Perfil cadastrado com sucesso!', 'sucesso');
                    redirect('perfil');
                } else {
                    set_msg('msg', 'Erro ao cadastrar!', 'sucesso');
                    redirect('perfil');
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Erro ao cadastrar!'));
                    redirect('perfil/cadastrar');
                }
            }

            $dados = array(
                'titulo' => 'Cadastrar Perfil',
                'tela' => 'perfil_create_edit',
                'funcao' => 'cadastrar'
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function editar() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            if ($this->input->post() != NULL) {

                $id = $this->uri->segment(3);
                if ($id != NULL) {
                    $cadastro = array(
                        'nome' => $this->input->post('nome'),
                        'status' => $this->input->post('status')
                    );

                    if ($this->perfil->editar(array('id' => $id), $cadastro)) {
                        set_msg('msg', 'Perfil editado com sucesso!', 'sucesso');
                        redirect('perfil');
                    } else {
                        set_msg('msg', 'Erro ao editar!', 'erro');
                        redirect('perfil');
                    }
                } else {
                    set_msg('msg', 'Erro ao identificar o id!', 'erro');
                    redirect('perfil');
                }
            }

            $dados = array(
                'titulo' => 'Cadastrar Perfil',
                'tela' => 'perfil_create_edit',
                'funcao' => 'cadastrar'
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function excluir(){
        
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $id = $this->uri->segment(3);
            if($id!=NULL){
                if($this->perfil->excluir(array('id'=>$id))){
                    set_msg('msg', 'Perfil excluído com sucesso!', 'sucesso');
                    redirect('perfil');
                }else{
                    set_msg('msg', 'Não foi possível excluir o Perfil!', 'erro');
                    redirect('perfil');
                }
            }

        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }

    }

}
