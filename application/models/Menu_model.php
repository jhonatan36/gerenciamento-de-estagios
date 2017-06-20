<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function retorna_menus($condicao = NULL, $ordem = NULL, $result = FALSE){
        
        if($condicao!=NULL){
            $this->db->where($condicao);
        }
        
        if($ordem!=NULL){
            $this->db->order_by($ordem);
        }
        
        if($result){
            return $this->db->get('tbl_menus')->result();
        }else{
            return $this->db->get('tbl_menus');
        }
    }
    
    public function cadastrar($dados = NULL){
        if($dados != NULL){
            if($this->db->insert('tbl_menus', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function editar($condicao = NULL, $dados = NULL){
        
        if(($dados!=NULL) && ($condicao!=NULL)){
            
            if($this->db->update('tbl_menus', $dados, $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function excluir($condicao = NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('tbl_menus', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
}