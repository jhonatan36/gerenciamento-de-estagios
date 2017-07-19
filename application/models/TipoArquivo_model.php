<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoArquivo_model extends CI_Model {

    public function retornar_tipoArquivo($condicao = NULL, $ordem = NULL, $result = FALSE) {

        if ($condicao != NULL) {
            $this->db->where($condicao);
        }

        if ($ordem != NULL) {
            $this->db->order_by($ordem);
        }

        if ($result) {
            return $this->db->get('tbl_tipo_arquivo')->result();
        } else {
            return $this->db->get('tbl_tipo_arquivo');
        }
    }

    public function cadastrar($dados = NULL) {

        if ($dados != NULL) {

            if ($this->db->insert('tbl_tipo_arquivo', $dados)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }

    public function editar($condicao = NULL, $dados = NULL) {

        if (($condicao != NULL) && ($dados != NULL)) {

            if ($this->db->update('tbl_tipo_arquivo', $dados, $condicao)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }
    
    
    public function excluir($condicao = NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('tbl_tipo_arquivo', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }

}
