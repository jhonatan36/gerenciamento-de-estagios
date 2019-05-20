<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* declarações globais */
        $this->load->model('sistema_model', 'sistema');

        //constantes para comparar perfis
        define("COORD", "COORD");
        define("ALUNO", "ALUNO");
        define("SUPER", "SUPER");
        define("ORIEN", "ORIEN");
        define("ADMIN", "ADMIN");
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

            if($this->session->userdata('logged_in')!=NULL && $this->session->userdata('logged_in')){

                    redirect('sistema');

            }else{

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
                                'limite' => 1800
                            ));

                            redirect('sistema');
                        } else {
                            //mensagem de usuário bloqueado/suspenso
                            set_msg('msg', 'Usuário suspenso, entre em contato com o Coordenador!', 'erro');
                            redirect('sistema/logar');
                        }
                    } else {
                        //mensagem de erro.
                        set_msg('msg', 'Usuário e/ou senha incorreto(s)!', 'erro');
                        redirect('sistema/logar');
                    }
                }

                $dados = array(
                    'titulo' => ''
                );

                $this->load->view('login', $dados);
            }
    }

    public function deslogar() {
        $this->session->sess_destroy();
        redirect('sistema');
    }

}
