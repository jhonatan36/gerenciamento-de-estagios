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
                    'id_menu' => $this->input->post('menu'),
                    'id_metodo' => $this->input->post('metodo'),
                    'data_cadastro' => getData('Y-m-d h:i:s')
                );

                if ($this->item->cadastrar($cadastro)) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Item Cadastrado com sucesso!'));
                    redirect('item/cadastrar');
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'não foi possivel cadastrar!'));
                    redirect('item/cadastrar');
                }
            }

            $dados = array(
                'titulo' => 'Cadastrar novo Item',
                'tela' => 'item_create_edit',
                'funcao' => 'cadastrar',
                'metodos' => $this->metodo->retornar(NULL, NULL, TRUE),
                'menus' => $this->menu->retorna_menus(NULL, NULL, TRUE),
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("acesso_negado");
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
                    'id_metodo' => $this->input->post('metodo'),
                    'data_modificacao' => getData('Y-m-d h:i:s')
                );

                if ($this->item->editar(array('id' => $id), $cadastro)) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Item editado com sucesso!'));
                    redirect('item');
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'não foi possivel editar!'));
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

            $this->load->view("acesso_negado");
        }
    }

    public function excluir() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $id = $this->uri->segment(3);

            if ($id != NULL) {
                if ($this->item->excluir(array('id' => $id))) {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Item excluído com sucesso!'));
                    redirect('item');
                } else {
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'não foi possivel excluir!'));
                    redirect('item');
                }
            } else {
                $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'não foi possivel pegar o id!'));
                redirect('item');
            }
        } else {

            $this->load->view("acesso_negado");
        }
    }

}
