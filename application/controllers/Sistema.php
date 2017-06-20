<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');
    }

    public function index() {
        $permissao = $this->auth->check_logged($this->router->class, $this->router->method);

        if ($permissao) {

            $dados = array(
                'tela' => 'index',
                'titulo' => 'Pagina Inicial'
            );

            $this->load->view('system_view', $dados);
        } else {

            $this->load->view("system_view", array('titulo'=>'Acesso Negado!', 'tela'=>'acesso_negado'));
        }
    }

    public function logar() {

            if ($this->input->post('matricula') != NULL) {

                $logger = array(
                    'matricula' => $this->input->post('matricula'),
                    'senha' => md5($this->input->post('senha'))
                );

                $login = $this->sistema->logar($logger);
                if ($login != NULL) {
                    if ($login->status == 1) {
                        $data_cadastro = implode('-', array_reverse(explode('-', $login->data_cadastro)));

                        $this->session->set_userdata(array(
                            'id' => $login->idusuario,
                            'usuario' => $login->matricula,
                            'apelido' => $login->nome,
                            'logged_in' => TRUE,
                            'data_cadastro' => $data_cadastro,
                            'perfil' => $login->perfil,
                            'registro' => time(),
                            'limite' => 900
                        ));

                        redirect('sistema');
                    } else {
                        //mensagem de usuário bloqueado/suspenso
                        $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Usuário Suspenso, Contate o coordenador!'));
                        redirect('sistema/logar');
                    }
                } else {
                    //mensagem de erro.
                    $this->session->set_flashdata('mensagem', $this->sistema->gera_mensagem('alert-danger', 'Usuário ou senha incorretos!'));
                    redirect('sistema/logar');
                }
            }

            $dados = array(
                'titulo' => ''
            );

            $this->load->view('login', $dados);
    }

    public function deslogar() {
        $this->session->sess_destroy();
        redirect('sistema');
    }

}
