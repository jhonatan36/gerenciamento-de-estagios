<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model {

    public function cadastrar($dados = NULL, $dados_aluno = NULL) {
        if ($dados != NULL) {
            
            //transação criação aluno
            $this->db->trans_begin();

            //insere usuário;
            $this->db->insert('tbl_usuario', $dados);
            $idUsuario = $this->db->insert_id();

            //insere aluno
            $dados_aluno['id_usuario'] = $idUsuario;
            $this->db->insert('tbl_aluno', $dados_aluno);

            if($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return FALSE;
            }else{
                $this->db->trans_commit();
                return TRUE;
            }
        }

        return FALSE;
    }

}
