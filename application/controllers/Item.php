<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('item_model', 'item');
        $this->load->model('menu_model', 'menu');
        $this->load->model('metodo_model', 'metodo');
        $this->load->model('sistema_model', 'sistema');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'titulo' => 'Itens de Menu',
                'tela' => 'item_retrieve',
                'itens' => $this->item->retorna_itens(NULL, TRUE),
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
                    'status' => $this->input->post('status'),
                    'id_menu' => $this->input->post('menu'),
                    'id_metodo' => $this->input->post('metodo'),
                );

                if ($this->item->cadastrar($cadastro)) {
                    set_msg('msg', 'Item cadastrado com sucesso!', 'sucesso');
                    redirect('item/cadastrar');
                } else {
                    set_msg('msg', 'Erro ao realizar o cadastro!', 'erro');
                    redirect('item/cadastrar');
                }
            }

            $dados = array(
                'titulo' => 'Cadastrar novo Item',
                'tela' => 'item_create_edit',
                'funcao' => 'cadastrar',
                'metodos' => $this->metodo->retornar(NULL, 'nome ASC, metodo DESC', TRUE),
                'menus' => $this->menu->retorna_menus(NULL, 'nome ASC', TRUE),
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

                $item = $this->item->retorna_itens(array('tbl_menus_itens.id' => $id), FALSE)->row();
            } else {
                redirect('item');
            }

            if ($this->input->post() != NULL) {

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'status' => $this->input->post('status'),
                    'id_menu' => $this->input->post('menu'),
                    'id_metodo' => $this->input->post('metodo')
                );

                if ($this->item->editar(array('id' => $id), $cadastro)) {
                    set_msg('msg', 'Item editado com sucesso!', 'sucesso');
                    redirect('item');
                } else {
                    set_msg('msg', 'Não foi possível editar!', 'erro');
                    redirect('item');
                }
            }

            $dados = array(
                'titulo' => 'Editar Item',
                'tela' => 'item_create_edit',
                'funcao' => "editar/$id",
                'metodos' => $this->metodo->retornar(NULL, NULL, TRUE),
                'menus' => $this->menu->retorna_menus(NULL, NULL, TRUE),
            );

            if (isset($item) && $item != NULL) {
                $dados['item'] = $item;
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
                if ($this->item->excluir(array('id' => $id))) {
                    set_msg('msg', 'Item excluído com sucesso!', 'sucesso');
                    redirect('item');
                } else {
                    set_msg('msg', 'Não foi possível excluir o item!', 'erro');
                    redirect('item');
                }
            } else {
                set_msg('msg', 'Erro ao recuperar o id!', 'erro');
                redirect('item');
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
