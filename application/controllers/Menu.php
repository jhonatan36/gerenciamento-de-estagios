<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('menu_model', 'menu');
        $this->load->model('sistema_model', 'sistema');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'titulo' => 'Menus',
                'tela' => 'menu_retrieve',
                'menus' => $this->menu->retorna_menus(NULL, 'nome ASC', TRUE),
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

                if ($this->menu->cadastrar($cadastro)) {
                    set_msg('msg', 'Menu cadastrado com sucesso!', 'sucesso');
                    redirect('menu/cadastrar');
                } else {
                    set_msg('msg', 'Erro ao realizar o cadastro!', 'erro');
                    redirect('menu/cadastrar');
                }
            }

            $dados = array(
                'titulo' => 'Cadastrar Menu',
                'tela' => 'menu_create_edit',
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

            $id = $this->uri->segment(3);

            if ($id != NULL) {
                $menu = $this->menu->retorna_menus(array('id' => $id), NULL, FALSE)->row();
            } else {
                set_msg('msg', 'Erro ao recuperar o id!', 'erro');
                redirect('menu');
            }


            if ($this->input->post() != NULL) {

                $condicao = array('id' => $this->input->post('id'));

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'status' => $this->input->post('status')
                );

                if ($this->menu->editar($condicao, $cadastro)) {
                    set_msg('msg', 'Menu editado com sucesso!', 'sucesso');
                    redirect('menu');
                } else {
                    set_msg('msg', 'Erro ao editar o cadastro!', 'erro');
                    redirect('menu');
                }
            }

            $dados = array(
                'titulo' => 'Editar Menu',
                'tela' => 'menu_create_edit',
                'funcao' => "editar/$id"
            );

            if (isset($menu) && $menu != NULL) {
                $dados['menu'] = $menu;
            }

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function excluir() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $id = $this->uri->segment(3);

            if ($id != NULL) {

                if ($this->menu->excluir(array('id' => $id))) {
                    set_msg('msg', 'Menu excluído com sucesso!', 'sucesso');
                    redirect('menu');
                } else {
                    set_msg('msg', 'Erro ao excluir o cadastro!', 'erro');
                    redirect('menu');
                }
            }else{
                set_msg('msg', 'Erro ao recuperar o id!', 'erro');
                redirect('menu');
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
