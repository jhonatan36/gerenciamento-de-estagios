<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NaturezaVinculo_model extends CI_Model {
    
    public function retornar_naturezaVinculo($condicao = NULL, $ordem = NULL, $result = FALSE){
        
        if($condicao != NULL){
            $this->db->where($condicao);
        }
        
        if($ordem != NULL){
            $this->db->order_by($ordem);
        }
        
        if($result){
            return $this->db->get('tbl_natureza_vinculo')->result();
        }else{
            return $this->db->get('tbl_natureza_vinculo');
        }
    }

    public function cadastrar($dados = NULL) {

        if ($dados != NULL) {

            if ($this->db->insert('tbl_natureza_vinculo', $dados)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }

    public function editar($condicao = NULL, $dados = NULL) {

        if (($condicao != NULL) && ($dados != NULL)) {

            if ($this->db->update('tbl_natureza_vinculo', $dados, $condicao)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }
    
    
    public function excluir($condicao = NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('tbl_natureza_vinculo', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function associar($dados=NULL){
        
        if($dados!=NULL){
            
            if($this->db->insert('tbl_arquivos_necessarios', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function desassociar($condicao=NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('tbl_arquivos_necessarios', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function retorna_associacao($condicao=NULL, $result=FALSE){
        
        if($condicao!=NULL){
            $this->db->where($condicao);
        }
        
        if($result){
            return $this->db->get('tbl_arquivos_necessarios')->result();
        }else{
            return $this->db->get('tbl_arquivos_necessarios');
        }
    }
    
    
}