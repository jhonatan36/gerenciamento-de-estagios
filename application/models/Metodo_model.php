<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Metodo_model extends CI_Model {
    
    public function retornar($condicao = NULL, $ordem = NULL, $result = FALSE){
        
        if($condicao!=NULL){
            $this->db->where($condicao);
        }
        
        if($ordem!=NULL){
            $this->db->order_by($ordem);
        }
        
        if($result){
            return $this->db->get('tbl_metodos')->result();
        }else{
            return $this->db->get('tbl_metodos');
        }
    }
    
    public function excluir($condicao = NULL){
        if($condicao!=NULL){
            if($this->db->delete('tbl_metodos', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
}

