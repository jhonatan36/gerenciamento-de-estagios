<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permissao_model extends CI_Model {
    
    public function retorna_metodos($condicao = NULL, $ordem = NULL){
        
        $this->db->select('nome');
        
        if($condicao != NULL){
            $this->db->where($condicao);
        }
        
        if($ordem != NULL){
            $this->db->order_by($ordem);
        }
        
        $metodos = $this->db->get('tbl_metodos')->result();
        $retorno = NULL;
        foreach ($metodos as $metodo){
            $retorno[$metodo->nome] = $this->db->select('id, classe, metodo')->where(array('nome'=>$metodo->nome))->get('tbl_metodos')->result();
        }
        
        return $retorno;
    }


    public function verifica_permissao($perfil = NULL, $metodo = NULL){
        
        if(($perfil != NULL) && ($metodo != NULL)){
            
            if($this->db->where(array('id_perfil'=>$perfil, 'id_metodo'=>$metodo))->get('tbl_permissoes')->num_rows() == 1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function adiciona_permissao($dados = NULL){
        
        if($dados != NULL){
            
            if($this->db->insert('tbl_permissoes', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
    
    public function remove_permissao($condicao = NULL){
        
        if($condicao != NULL){
            if($this->db->delete('tbl_permissoes', $condicao)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
}

