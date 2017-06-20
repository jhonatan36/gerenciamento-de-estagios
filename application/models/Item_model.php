<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

    public function retorna_itens($condicao = NULL, $result = FALSE) {

        $this->db->select('tbl_menus_itens.id as id, tbl_menus_itens.nome as nome, '
                . 'tbl_menus_itens.status as status, '
                . 'tbl_menus_itens.data_cadastro as data_cadastro, '
                . 'tbl_menus_itens.data_modificacao as data_modificacao, '
                . 'tbl_menus.nome as menu, '
                . 'tbl_metodos.apelido as metodo');
        $this->db->join('tbl_menus', 'tbl_menus.id=tbl_menus_itens.id_menu', 'inner');
        $this->db->join('tbl_metodos', 'tbl_metodos.id=tbl_menus_itens.id_metodo', 'inner');

        if ($condicao != NULL) {
            $this->db->where($condicao);
        }

        if ($result) {
            return $this->db->get('tbl_menus_itens')->result();
        } else {
            return $this->db->get('tbl_menus_itens');
        }
    }

    public function retorna_itens_menu($perfil = 0, $menu = NULL, $ordem = NULL) {
        
        if (($perfil != 0) && ($menu != NULL) && ($ordem != NULL)) {
            $sql = "SELECT im.nome,m.apelido FROM tbl_menus_itens im
                JOIN tbl_permissoes p ON
                p.id_metodo = im.id_metodo
                JOIN tbl_metodos m ON
                m.id = p.id_metodo
                WHERE p.id_perfil = $perfil AND im.status = 1 AND im.id_menu = $menu ORDER BY $ordem";

            $retorno = $this->db->query($sql);

            return $retorno;
        } else {
            return FALSE;
        }
    }

    public function cadastrar($dados = NULL) {

        if ($dados != NULL) {

            if ($this->db->insert('tbl_menus_itens', $dados)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }
    
    public function editar($condicao = NULL, $dados = NULL) {

        if (($condicao != NULL) && ($dados != NULL)) {

            if ($this->db->update('tbl_menus_itens', $dados, $condicao)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }
    
    public function excluir($condicao = NULL){
        
        if($condicao!=NULL){
            
            if($this->db->delete('tbl_menus_itens', $condicao)){
                
                return TRUE;
            }else{
                
                return FALSE;
            }
        }else{
            
            return FALSE;
        }
    }

}
