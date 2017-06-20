<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model {
    
    public function cadastrar($dados = NULL){
        if($dados != NULL){
            
            if($this->db->insert('aluno', $dados)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        return FALSE;
    }
}
