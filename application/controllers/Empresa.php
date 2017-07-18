<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('empresa_model', 'empresa');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'empresa_retrieve',
                'titulo' => 'Empresas Cadastradas',
                'empresas' => $this->empresa->retorna_empresa(NULL, NULL, TRUE)
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
                $inicio_vinculo = implode('-', array_reverse(explode('/', $this->input->post('inicio_vinculo'))));
                $final_vinculo = implode('-', array_reverse(explode('/', $this->input->post('final_vinculo'))));

                $cadastro = array(
                    'razao_social' => $this->input->post('razao_social'),
                    'cnpj' => $this->input->post('cnpj'),
                    'inicio_vinculo' => $inicio_vinculo,
                    'final_vinculo' => $final_vinculo,
                    'contato' => $this->input->post('contato')
                );

                if ($this->input->post('cidade') != NULL) {
                    $cadastro['cidade'] = $this->input->post('cidade');
                }
                if ($this->input->post('bairro') != NULL) {
                    $cadastro['bairro'] = $this->input->post('bairro');
                }
                if ($this->input->post('endereco') != NULL) {
                    $cadastro['endereco'] = $this->input->post('endereco');
                }
                if ($this->input->post('cep') != NULL) {
                    $cadastro['cep'] = $this->input->post('cep');
                }
                if ($this->input->post('email') != NULL) {
                    $cadastro['email'] = $this->input->post('email');
                }

                if ($this->empresa->cadastrar($cadastro)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Empresa cadastrada com sucesso!'));
                    redirect('empresa/cadastrar');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível realizar o cadastro!'));
                    redirect('empresa/cadastrar');
                }
            }

            $dados = array(
                'tela' => 'empresa_create_edit',
                'titulo' => 'Cadastrar Empresa',
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

            $idempresa = $this->uri->segment(3);

            if ($idempresa != NULL) {
                $empresa = $this->empresa->retorna_empresa(array('idempresa' => $idempresa), NULL, FALSE)->row();
            } else {
                redirect('empresa');
            }

            if ($this->input->post() != NULL) {
                $inicio_vinculo = implode('-', array_reverse(explode('/', $this->input->post('inicio_vinculo'))));
                $final_vinculo = implode('-', array_reverse(explode('/', $this->input->post('final_vinculo'))));

                $cadastro = array(
                    'razao_social' => $this->input->post('razao_social'),
                    'cnpj' => $this->input->post('cnpj'),
                    'inicio_vinculo' => $inicio_vinculo,
                    'final_vinculo' => $final_vinculo,
                    'contato' => $this->input->post('contato')
                );

                if ($this->input->post('cidade') != NULL) {
                    $cadastro['cidade'] = $this->input->post('cidade');
                }
                if ($this->input->post('bairro') != NULL) {
                    $cadastro['bairro'] = $this->input->post('bairro');
                }
                if ($this->input->post('endereco') != NULL) {
                    $cadastro['endereco'] = $this->input->post('endereco');
                }
                if ($this->input->post('cep') != NULL) {
                    $cadastro['cep'] = $this->input->post('cep');
                }
                if ($this->input->post('email') != NULL) {
                    $cadastro['email'] = $this->input->post('email');
                }

                if ($this->empresa->editar(array('idempresa' => $idempresa), $cadastro)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Empresa alterada com sucesso!'));
                    redirect('empresa');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível alterar o cadastro!'));
                    redirect('empresa');
                }
            }

            $dados = array(
                'tela' => 'empresa_create_edit',
                'titulo' => 'Editando Empresa',
                'empresa' => $empresa,
                'funcao' => "editar/$idempresa"
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function excluir() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $idempresa = $this->uri->segment(3);

            if ($idempresa != NULL) {

                if ($this->empresa->excluir(array('idempresa' => $idempresa))) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Empresa excluída com sucesso!'));
                    redirect('empresa');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Erro ao retirar do banco, verifique se não há alguma associação!'));
                    redirect('empresa');
                }
            } else {
                $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível excluir o cadastro, id não recebido!'));
                redirect('empresa');
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
