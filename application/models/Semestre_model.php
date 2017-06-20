<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Semestre_model extends CI_Model {
    
    public function retornar($condicao = NULL, $ordem = NULL, $result = FALSE){
        
        if($condicao!=NULL){
            $this->db->where($condicao);
        }
        
        if($ordem!=NULL){
            $this->db->order_by($ordem);
        }
        
        if($result){
            return $this->db->get('semestre_letivo')->result();
        }else{
            return $this->db->get('semestre_letivo');
        }
    }
    
    public function cadastrar($dados = NULL){
        if($dados!=NULL){
            
            if($this->db->insert('semestre_letivo', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function editar($condicao = NULL, $dados = NULL){
        if(($dados != NULL) && ($condicao!=NULL)){
            $this->db->where($condicao);
            if($this->db->update('semestre_letivo', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function deletar($condicao = NULL){
        if($condicao!=NULL){
            
            if($this->db->delete('semestre_letivo', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
}

