<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema_model extends CI_Model {
    
	public function verifica_status(){
            if($this->session->userdata('logged_in')){
                $status = $this->session->userdata('logged_in');
            }else{ $status = NULL; }
            
            if($status){
                
            }else{
                redirect('sistema/logar');
            }
        }
        
        public function logar($dados = NULL){
            if($dados!=NULL){
                $usuario = $this->db->where($dados)->get('tbl_usuario');
                
                if($usuario != NULL){
                    $usuario=$usuario->row();
                    return $usuario;
                }else{
                    return FALSE;
                }
            }
            
            return FALSE;
        }
        
        public function gera_mensagem($class=NULL, $mensagem=NULL){
            if($class != NULL && $mensagem != NULL){
                $retorno = "<div class='form-group has-feedback'>
                                <div class='alert ". $class ." alert-dismissible'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-check'></i> Atenção!</h4>".
                                    $mensagem.
                                "</div>
                            </div>";
                
                return $retorno;
            }
            
            return FALSE;
        }
}