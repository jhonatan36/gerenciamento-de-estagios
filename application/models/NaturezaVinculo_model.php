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
            return $this->db->get('natureza_vinculo')->result();
        }else{
            return $this->db->get('natureza_vinculo');
        }
    }

    public function cadastrar($dados = NULL) {

        if ($dados != NULL) {

            if ($this->db->insert('natureza_vinculo', $dados)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }

    public function editar($condicao = NULL, $dados = NULL) {

        if (($condicao != NULL) && ($dados != NULL)) {

            if ($this->db->update('natureza_vinculo', $dados, $condicao)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }
    
    
    public function excluir($condicao = NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('natureza_vinculo', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function associar($dados=NULL){
        
        if($dados!=NULL){
            
            if($this->db->insert('arquivos_necessarios', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function desassociar($condicao=NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('arquivos_necessarios', $condicao)){
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
            return $this->db->get('arquivos_necessarios')->result();
        }else{
            return $this->db->get('arquivos_necessarios');
        }
    }
    
    
}