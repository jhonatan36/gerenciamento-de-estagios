<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('usuario_model', 'usuario');
        $this->load->model('perfil_model', 'perfil');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'usuario_retrieve',
                'titulo' => 'Usuários Cadastrados',
                'usuarios' => $this->usuario->retorna_usuario(NULL, NULL, TRUE)
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
                    'matricula' => $this->input->post('matricula'),
                    'email' => $this->input->post('email'),
                    'contato' => $this->input->post('contato'),
                    'senha' => md5($this->input->post('senha')),
                    'status' => $this->input->post('status')
                );

                /* cadastra dados no banco */
                $resposta = $this->usuario->cadastrar($cadastro);

                if ($resposta) {
                    set_msg('msg', 'Usuário cadastrado com sucesso!', 'sucesso');
                    redirect('usuario/cadastrar');
                } else {
                    set_msg('msg', 'Erro ao realizar o cadastro!', 'erro');
                    redirect('usuario/cadastrar');
                }
            }


            $dados = array(
                'tela' => 'usuario_create_edit',
                'titulo' => 'Cadastrar Usuário',
                'funcao' => 'cadastrar',
                'perfis' => $this->perfil->retorna_perfis(NULL, 'nome ASC', TRUE)
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
                    set_msg('msg', 'Usuário editado com sucesso!', 'sucesso');
                    redirect('usuario');
                } else {
                    set_msg('msg', 'Erro ao editar o cadastro!', 'erro');
                    redirect("usuario/editar/$idUsuario");
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
                set_msg('msg', 'Erro ao recuperar o id ou o cadastro!', 'erro');
                redirect('usuario');
            }

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
