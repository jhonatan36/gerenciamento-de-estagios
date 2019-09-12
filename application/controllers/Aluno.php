<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('aluno_model', 'aluno');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'aluno_retrieve',
                'titulo' => 'Alunos Cadastrados',
                'alunos' => $this->usuario->retorna_usuario(array('perfil' => '2'), NULL, TRUE)
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

            /* recebe dados do formulario para cadastro */
            if ($this->input->post() != NULL) {
                $cadastro = array(
                    'perfil' => 5,
                    'nomeCompleto' => $this->input->post('nomeCompleto'),
                    'matricula' => $this->input->post('matricula'),
                    'email' => $this->input->post('email'),
                    'contato' => $this->input->post('contato'),
                    'senha' => md5($this->input->post('matricula')),
                    'status' => $this->input->post('status'),
                    'cargaHoraria' => $this->input->post('cargaHoraria')
                );

                print_r($cadastro);die;

                /* cadastra dados no banco */
                if ($this->aluno->cadastrar($dados)) {
                    $this->session->set_flashdata('msg', $this->sistema->gera_mensagem('alert-success', 'Usuário Cadastrado com sucesso!'));
                    redirect('aluno/cadastrar');
                } else {
                    $this->session->set_flashdata('msg', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível realizar o cadastro!'));
                    redirect('aluno/cadastrar');
                }
            }


            $dados = array(
                'tela' => 'aluno_create_edit',
                'titulo' => 'Cadastrar Aluno',
                'funcao' => 'cadastrar'
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
