<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semestre extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('semestre_model', 'semestre');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {

        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'semestre_retrieve',
                'titulo' => 'Semestres Cadastrados',
                'semestres' => $this->semestre->retornar(NULL, NULL, TRUE)
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
                $data_inicio = implode('-', array_reverse(explode('/', $this->input->post('data_inicio'))));
                $data_final = implode('-', array_reverse(explode('/', $this->input->post('data_final'))));

                $cadastro = array(
                    'semestre' => $this->input->post('semestre'),
                    'ano' => $this->input->post('ano'),
                    'data_inicio' => $data_inicio,
                    'data_final' => $data_final,
                    'ativo' => $this->input->post('ativo'),
                );

                if ($this->semestre->cadastrar($cadastro)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Semestre cadastrado com sucesso!'));
                    redirect('semestre/cadastrar');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível realizar o cadastro!'));
                    redirect('semestre/cadastrar');
                }
            }

            $dados = array(
                'tela' => 'semestre_create_edit',
                'titulo' => 'Cadastrar Semestre',
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

            $idsemestre = $this->uri->segment(3);

            if ($idsemestre != NULL) {
                $semestre = $this->semestre->retornar(array('idsemestre_letivo' => $idsemestre), NULL, FALSE)->row();
            } else {
                redirect('semestre');
            }

            if ($this->input->post() != NULL) {
                $data_inicio = implode('-', array_reverse(explode('/', $this->input->post('data_inicio'))));
                $data_final = implode('-', array_reverse(explode('/', $this->input->post('data_final'))));

                $cadastro = array(
                    'semestre' => $this->input->post('semestre'),
                    'ano' => $this->input->post('ano'),
                    'data_inicio' => $data_inicio,
                    'data_final' => $data_final,
                    'ativo' => $this->input->post('ativo'),
                );

                $condicao = array('idsemestre_letivo' => $this->input->post('idsemestre_letivo'));

                if ($this->semestre->editar($condicao, $cadastro)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Semestre editado com sucesso!'));
                    redirect('semestre');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível realizar a edição!'));
                    redirect('semestre');
                }
            }

            $dados = array(
                'tela' => 'semestre_create_edit',
                'titulo' => 'Editar Semestre',
                'funcao' => "editar/$idsemestre"
            );

            if (isset($semestre) && $semestre != NULL) {
                $dados['semestre'] = $semestre;
            }

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function excluir() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $idsemestre = $this->uri->segment(3);

            if ($idsemestre != NULL) {
                $semestre = $this->semestre->retornar(array('idsemestre_letivo' => $idsemestre), NULL, FALSE)->row();
            } else {
                redirect('semestre');
            }

            $condicao = array('idsemestre_letivo' => $idsemestre);

            if ($semestre->ativo == 0) {
                if ($this->semestre->deletar($condicao)) {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-success', 'Semestre apagado com sucesso!'));
                    redirect('semestre');
                } else {

                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Não foi possível apagar!'));
                    redirect('semestre');
                }
            } else {

                $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Só é possível deletar semestre que não são utilizados e que estejam desativados.'));
                redirect('semestre');
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
