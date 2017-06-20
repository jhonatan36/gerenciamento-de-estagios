<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {
    
    public function retorna_perfis($condicao = NULL, $ordem = NULL, $result = FALSE){
        
        if($condicao != NULL){
            $this->db->where($condicao);
        }
        
        if($ordem != NULL){
            $this->db->order_by($ordem);
        }
        
        if($result){
            return $this->db->get('tbl_perfis')->result();
        }else{
            return $this->db->get('tbl_perfis');
        }
    }
    
    public function cadastrar($dados = NULL){
        if($dados != NULL){
            if($this->db->insert('tbl_perfis', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function editar($condicao = NULL, $dados = NULL){
        
        if(($dados!=NULL) && ($condicao!=NULL)){
            
            if($this->db->update('tbl_perfis', $dados, $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    
}