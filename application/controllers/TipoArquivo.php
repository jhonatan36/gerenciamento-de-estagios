<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoArquivo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('TipoArquivo_model', 'tipoArquivo');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'tipoArquivo_retrieve',
                'titulo' => 'Tipos de Arquivos',
                'tipoArquivo' => $this->tipoArquivo->retornar_tipoArquivo(NULL, 'nome ASC', TRUE)
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
                    'descricao' => $this->input->post('descricao'),
                    'status' => $this->input->post('status')
                );


                if ($this->tipoArquivo->cadastrar($cadastro)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Tipo cadastrado com sucesso!'));
                    redirect('tipoArquivo/cadastrar');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Não foi possivel cadastrar!'));
                    redirect('tipoArquivo/cadastrar');
                }
            }

            $dados = array(
                'tela' => 'tipoArquivo_create_edit',
                'titulo' => 'Novo tipo de arquivo',
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

            $id = $this->uri->segment(3);

            if ($id != NULL) {
                $tipoArquivo = $this->tipoArquivo->retornar_tipoArquivo(array('idtipo_arquivo' => $id), NULL, NULL)->row();
            } else {
                redirect('tipoArquivo');
            }

            if ($this->input->post() != NULL) {

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'descricao' => $this->input->post('descricao'),
                    'status' => $this->input->post('status')
                );


                if ($this->tipoArquivo->editar(array('idtipo_arquivo' => $id), $cadastro)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Tipo editado com sucesso!'));
                    redirect('tipoArquivo');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Não foi possivel editar!'));
                    redirect('tipoArquivo');
                }
            }

            $dados = array(
                'tela' => 'tipoArquivo_create_edit',
                'titulo' => 'Editando tipo de arquivo',
                'funcao' => "editar/$id"
            );

            if (isset($tipoArquivo) && $tipoArquivo != NULL) {
                $dados['tipoArquivo'] = $tipoArquivo;
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
                if ($this->tipoArquivo->excluir(array('idtipo_arquivo' => $id))) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Tipo deletado com sucesso!'));
                    redirect('tipoArquivo');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Não foi possivel deletar!'));
                    redirect('tipoArquivo');
                }
            } else {
                $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Não foi possivel recuperar o id!'));
                redirect('tipoArquivo');
            }
        } else {

            $this->load->view("acesso_negado");
        }
    }

}
