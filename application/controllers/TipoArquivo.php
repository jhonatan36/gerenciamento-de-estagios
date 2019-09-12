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

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function cadastrar() {

        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            if(isset($_FILES['arquivo']['error']) && ($_FILES['arquivo']['error'] === 0)){

                $nomeArquivo = preg_replace('/[ -]+/', '_', $_FILES['arquivo']['name']);
                $upload_dir = './assets/uploads/required_files/';

                $config = [
                    'allowed_types' => 'pdf',
                    'upload_path' => $upload_dir,
                    'file_name' => $nomeArquivo
                ];

                $this->load->library('upload', $config);

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'descricao' => $this->input->post('descricao'),
                    'diretorio' => '/assets/uploads/required_files/'.$nomeArquivo,
                    'status' => $this->input->post('status')
                );

                if($this->upload->do_upload('arquivo')){
                    if ($this->tipoArquivo->cadastrar($cadastro)) {
                        set_msg('msg', 'Arquivo cadastrado com sucesso!', 'sucesso');
                        redirect('tipoArquivo');
                    } else {
                        //remover o arquivo

                        set_msg('msg', 'Erro ao realizar o cadastro!', 'erro');
                        redirect('tipoArquivo/cadastrar');
                    }
                } else {
                    print_r($this->upload->data());
                }

            }

            $dados = array(
                'tela' => 'tipoArquivo_create_edit',
                'titulo' => 'Novo tipo de arquivo',
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
                $tipoArquivo = $this->tipoArquivo->retornar_tipoArquivo(array('idtipo_arquivo' => $id), NULL, NULL)->row();
            } else {
                set_msg('msg', 'Erro ao recuperar o id!', 'erro');
                redirect('tipoArquivo');
            }

            if ($this->input->post() != NULL) {

                $cadastro = array(
                    'nome' => $this->input->post('nome'),
                    'descricao' => $this->input->post('descricao'),
                    'status' => $this->input->post('status')
                );


                if ($this->tipoArquivo->editar(array('idtipo_arquivo' => $id), $cadastro)) {
                    set_msg('msg', 'Tipo editado com sucesso!', 'sucesso');
                    redirect('tipoArquivo');
                } else {
                    set_msg('msg', 'Erro ao editar o cadastro!', 'erro');
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

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function excluir() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $id = $this->uri->segment(3);

            if ($id != NULL) {
                if ($this->tipoArquivo->excluir(array('idtipo_arquivo' => $id))) {
                    set_msg('msg', 'Tipo deletado com sucesso!', 'sucesso');
                    redirect('tipoArquivo');
                } else {
                    set_msg('msg', 'Erro ao excluir o cadastro!', 'erro');
                    redirect('tipoArquivo');
                }
            } else {
                set_msg('msg', 'Erro ao recuperar o id!', 'erro');
                redirect('tipoArquivo');
            }
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

}
