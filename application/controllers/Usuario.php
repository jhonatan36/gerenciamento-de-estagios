<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
                'tela' => 'usuario_retrieve',
                'titulo' => 'Usuários Cadastrados',
                'usuarios' => $this->usuario->retorna_usuario(array('perfil !=' => '1'), NULL, TRUE)
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

                /* cadastra dados no banco */
                $resposta = $this->usuario->cadastrar($cadastro);

                if ($resposta) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Usuário Cadastrado com sucesso!'));
                    redirect('usuario/cadastrar');
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível realizar o cadastro!'));
                    redirect('usuario/cadastrar');
                }
            }


            $dados = array(
                'tela' => 'usuario_create_edit',
                'titulo' => 'Cadastrar Usuário',
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
            $idUsuario = $this->uri->segment(3);

            /* recebe dados do formulario para cadastro */
            if ($this->input->post() != NULL) {
                $cadastro = array(
                    'tipo_usuario' => $this->input->post('tipo_usuario'),
                    'nome' => $this->input->post('nome'),
                    'sobrenome' => $this->input->post('sobrenome'),
                    'matricula' => $this->input->post('matricula'),
                    'email' => $this->input->post('email'),
                    'contato' => $this->input->post('contato'),
                    'status' => $this->input->post('status'),
                );

                if ($this->input->post('senha') != NULL) {
                    $dados['senha'] = md5($this->input->post('senha'));
                }

                if ($this->input->post('tipo_usuario') == 1) {
                    $cadastro_aluno = array(
                        'periodo' => $this->input->post('periodo')
                    );
                }

                /* envia dados para edição no banco */
                if ($this->input->post('tipo_usuario') == 1) {
                    $resposta = $this->usuario->editar(array('idusuario' => $this->input->post('idusuario')), $cadastro, $cadastro_aluno);
                } else {
                    $resposta = $this->usuario->editar(array('idusuario' => $this->input->post('idusuario')), $cadastro, NULL);
                }

                if ($resposta) {
                    $this->session->set_flashdata('mensagem', 'Usuário Cadastrado com sucesso!');
                    redirect('usuario');
                } else {
                    $this->session->set_flashdata('mensagem', 'Não foi possível realizar o cadastro!');
                    redirect('usuario/editar');
                }
            }

            /* verifica o id do usuário */
            $user = $this->usuario->retorna_usuario(array('idusuario' => $idUsuario))->row();
            if ($user != NULL) {
                $dados = array(
                    'tela' => 'usuario_create_edit',
                    'titulo' => 'Editar Usuário',
                    'usuario' => $user,
                    'funcao' => 'editar'
                );
                if (isset($dados_aluno)) {
                    $dados['dados_aluno'] = $dados_aluno;
                }
            } else {
                redirect('usuario');
            }

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
