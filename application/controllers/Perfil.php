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

            $this->load->view("acesso_negado");
        }
    }

    public function cadastrar() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            if ($this->input->post() != NULL) {

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'status' => $this->input->post('status'),
                    'data_cadastro' => getData('Y/m/d h:i:s')
                );

                if ($this->perfil->cadastrar($cadastro)) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Perfil Cadastrado com sucesso!'));
                    redirect('perfil/cadastrar');
                } else {
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

            $this->load->view("acesso_negado");
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
                        'status' => $this->input->post('status'),
                        'data_modificacao' => getData('Y/m/d h:i:s')
                    );

                    if ($this->perfil->editar(array('id' => $id), $cadastro)) {
                        $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Perfil editado com sucesso!'));
                        redirect('perfil');
                    } else {
                        $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Erro ao editar!'));
                        redirect('perfil');
                    }
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Erro ao identificar o id!'));
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

            $this->load->view("acesso_negado");
        }
    }

}
