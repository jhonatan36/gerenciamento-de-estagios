<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('usuario_model', 'usuario');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'aluno_retrieve',
                'titulo' => 'Alunos Cadastrados',
                'alunos' => $this->usuario->retorna_aluno(array('perfil' => '2'), NULL, TRUE)
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
                    'perfil' => $this->input->post('tipo_usuario'),
                    'nome' => $this->input->post('nome'),
                    'sobrenome' => $this->input->post('sobrenome'),
                    'matricula' => $this->input->post('matricula'),
                    'email' => $this->input->post('email'),
                    'contato' => $this->input->post('contato'),
                    'senha' => md5($this->input->post('senha')),
                    'status' => $this->input->post('status'),
                    'data_cadastro' => $data_atual
                );

                if ($this->input->post('tipo_usuario') == 1) {
                    $cadastro_aluno = array(
                        'carga_horaria_cumprida' => 0,
                        'periodo' => $this->input->post('periodo')
                    );
                }

                /* cadastra dados no banco */
                if ($this->input->post('tipo_usuario') == 1) {
                    $resposta = $this->usuario->cadastrar($cadastro);
                    $resposta2 = $this->aluno->cadastrar($cadastro_aluno);
                }

                if ($resposta && $resposta2) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Usuário Cadastrado com sucesso!'));
                    redirect('aluno/cadastrar');
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível realizar o cadastro!'));
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
