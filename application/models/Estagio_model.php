<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estagio_model extends CI_Model {

    public function get($condicao = null, $ordem = null, $result = false){

        if ( $condicao != null ) {
            $this->db->where($condicao);
        }

        if( $ordem != null ) {
            $this->db->order_by($ordem);
        }

        if($result){
            return $this->db->get('tbl_estagio')->result();
        }

        return $this->db->get('tbl_estagio');
    }
}