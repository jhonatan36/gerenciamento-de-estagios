<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NaturezaVinculo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
        $this->load->model('naturezaVinculo_model', 'naturezaVinculo');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'naturezaVinculo_retrieve',
                'titulo' => 'Natureza de Vínculo',
                'naturezaVinculo' => $this->naturezaVinculo->retornar_naturezaVinculo(NULL, 'nome ASC', TRUE)
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
                    'descricao' => $this->input->post('descricao'),
                    'carga_horaria_maxima' => $this->input->post('carga_horaria_maxima'),
                    'status' => $this->input->post('status')
                );


                if ($this->naturezaVinculo->cadastrar($cadastro)) {
                    set_msg('msg', 'Natureza cadastrada com sucesso!', 'sucesso');
                    redirect('naturezaVinculo');
                } else {
                    set_msg('msg', 'Não foi possível realizar o cadastro!', 'sucesso');
                    redirect('naturezaVinculo/cadastrar');
                }
            }

            $dados = array(
                'tela' => 'naturezaVinculo_create_edit',
                'titulo' => 'Nova Natureza de vinculo',
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
                $naturezaVinculo = $this->naturezaVinculo->retornar_naturezaVinculo(array('idnatureza_vinculo' => $id), NULL, NULL)->row();
            } else {
                set_msg('msg', 'Erro ao receber o id!', 'erro');
                redirect('naturezaVinculo');
            }

            if ($this->input->post() != NULL) {

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'descricao' => $this->input->post('descricao'),
                    'status' => $this->input->post('status')
                );


                if ($this->naturezaVinculo->editar(array('idnatureza_vinculo' => $id), $cadastro)) {
                    set_msg('msg', 'Natureza editada com sucesso!', 'sucesso');
                    redirect('naturezaVinculo');
                } else {
                    set_msg('msg', 'Não foi possivel editar o cadastro!', 'erro');
                    redirect('naturezaVinculo');
                }
            }

            $dados = array(
                'tela' => 'naturezaVinculo_create_edit',
                'titulo' => 'Editando Natureza de Vinculo',
                'funcao' => "editar/$id"
            );

            if (isset($naturezaVinculo) && $naturezaVinculo != NULL) {
                $dados['naturezaVinculo'] = $naturezaVinculo;
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
                if ($this->naturezaVinculo->excluir(array('idnatureza_vinculo' => $id))) {
                    set_msg('msg', 'Natureza excluída com sucesso!', 'sucesso');
                    redirect('naturezaVinculo');
                } else {
                    set_msg('msg', 'Não foi possível excluir o cadastro!', 'erro');
                    redirect('naturezaVinculo');
                }
            } else {
                set_msg('msg', 'Erro ao recuperar o id!', 'erro');
                redirect('naturezaVinculo');
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function associarArquivo() {

        if ($this->input->post() != NULL) {
            $id = $this->input->post('natureza');

            $dados = array(
                'idnatureza_vinculo' => $this->input->post('natureza'),
                'idtipo_arquivo' => $this->input->post('tipo')
            );

            if ($this->naturezaVinculo->retorna_associacao($dados, FALSE)->num_rows() == 0) {
                //insere
                if ($this->naturezaVinculo->associar($dados)) {
                    //funcionou
                    echo 'Associado!';
                } else {
                    echo 'Erro ao associar!';
                    //set_msg('msg', 'Erro!', 'erro');
                    //redirect("naturezaVinculo/associarArquivo/$id");
                }
            } else {
                //remove
                if ($this->naturezaVinculo->desassociar($dados)) {
                    //funcionou
                    echo 'Associação Removida!';
                } else {
                    echo 'Erro ao remover associação!';
                    //set_msg('msg', 'Erro!', 'erro');
                    //redirect('naturezaVinculo/associarArquivo/$id');
                }
            }
        } else {

            $id = $this->uri->segment(3);

            if ($id != NULL) {
                $naturezaVinculo = $this->naturezaVinculo->retornar_naturezaVinculo(array('idnatureza_vinculo' => $id), NULL, FALSE)->row();
            } else {
                redirect('naturezaVinculo');
            }

            $this->load->model('tipoArquivo_model', 'tipoArquivo');

            $dados = array(
                'titulo' => 'Associando arquivos Necessários',
                'tela' => 'naturezaVinculo_associar',
                'natureza' => $naturezaVinculo,
                'tipoArquivo' => $this->tipoArquivo->retornar_tipoArquivo(NULL, NULL, TRUE)
            );

            $this->load->view('system_view', $dados);
        }
    }

}
