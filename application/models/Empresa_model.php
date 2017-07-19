<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    public function retorna_empresa($condicao = NULL, $ordem = NULL, $result = FALSE){
        
        if($condicao!=NULL){
            
            $this->db->where($condicao);
        }
        
        if($ordem!=NULL){
            
            $this->db->order_by($ordem);
        }
        
        if($result){
            
            return $this->db->get('tbl_empresa')->result();
        }
        
        return $this->db->get('tbl_empresa');
    }
    
    public function cadastrar($dados = NULL){
        
        if($dados != NULL){
            
                 if($this->db->insert('empresa', $dados)){
                     return TRUE;
                 }else{
                     return FALSE;
                 }
        }
        
        return FALSE;
    }
    
    public function editar($condicao = NULL, $dados = NULL){
        
        if($condicao != NULL && $dados != NULL){
            
            if($this->db->where($condicao)->update('tbl_empresa', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function excluir($condicao = NULL){
        
        if($condicao != NULL){
            if($this->db->delete('tbl_empresa', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }

}
