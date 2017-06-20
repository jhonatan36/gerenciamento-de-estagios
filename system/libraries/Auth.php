<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * A biblioteca AUTH foi criada para servir de autenticação em sistemas
 * desenvolvidos com o CodeIgniter.
 * 
 * Além de autenticar, a biblioteca tem a função de verificar a permissão de cada
 * usuário em determinado método do sistema.
 * 
 * Desenvolvida por: Marcelo Almeida - Analista de Sistemas
 * Data: 20/12/2016
 * 
 */
class CI_Auth {

    private $ci;

    public function __construct() {
        $this->ci = &get_instance();
    }

    function check_logged($classe, $metodo) {
        /*
         * Criando uma instância do CodeIgniter para poder acessar
         * banco de dados, sessions, models, etc...
         */

        $this->CI = & get_instance();

        /**
         * Buscando a classe e metodo da tabela tbl_metodos
         */
        $array = array('classe' => $classe, 'metodo' => $metodo);

        $this->CI->db->where($array);
        $query = $this->CI->db->get('tbl_metodos');
        $result = $query->result();

        // Se este metodo ainda não existir na tabela sera cadastrado
        if (count($result) == 0) {
            $data = array(
                'classe' => $classe,
                'nome' => $classe,
                //'data_criacao' => getData(),
                'metodo' => $metodo,
                'descricao' => $metodo,
                'apelido' => $classe . '/' . $metodo,
                'privado' => 1
            );

            $this->CI->db->insert('tbl_metodos', $data);

            location("$classe/$metodo");
        }
        //Se já existir e o método for público.
        else {

            if ($result[0]->privado == 0) {
                // Escapa da validacao e mostra o metodo.

                return true;
            } else {

                $this->CI->load->library('session');

                // Se for privado, verifica o login
                $nome = $this->CI->session->userdata('apelido');
                $logged_in = $this->CI->session->userdata('logged_in');
                $data = $this->CI->session->userdata('data');
                $id_usuario = $this->CI->session->userdata('id');
                $perfil = $this->CI->session->userdata('perfil');
                $id_tbl_metodos = $result[0]->id;
                $registro = $this->CI->session->userdata('registro');
                $limite = $this->CI->session->userdata('limite');

                // Se o usuario estiver logado vai verificar se tem permissao na tabela.
                if (($nome != NULL) && $logged_in && ($id_usuario != NULL) && $id_usuario != 0) {

                    //retorna o tempo logado
                    if ($registro) {
                        $segundos = time() - $registro;
                    }

                    //verifica se já passou no tempo limite
                    if ($segundos > $limite) {

                        $this->ci->session->sess_destroy();
                        set_msg('erro', 'Sessão encerrada automaticamente.', 'erro');
                        location('sistema/logar');
                    } else {
                        //se o tempo não estiver esgotado, zera novamente o contador
                        $login = array('registro' => time());
                        $this->ci->session->set_userdata($login);
                    }

                    $array = array('id_metodo' => $id_tbl_metodos, 'id_perfil' => $perfil);
                    $this->CI->db->where($array);
                    $query2 = $this->CI->db->get('tbl_permissoes');
                    $result2 = $query2->result();


                    // Se não vier nenhum resultado da consulta, manda para página de
                    // usuario sem permissão.
                    if (count($result2) == 0) {

                        return false;
                    } else {

                        return true;
                    }
                }
                // Se não estiver logado, sera redirecionado para o login.
                else {
                    
                    redirect('sistema/logar');
                    //location("sistema/logar");
                }
            }
        }
    }

}
