<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function retorna_usuario($condicao = NULL, $ordem = NULL, $result = FALSE) {

        $this->db->join('tbl_perfis', 'tbl_usuario.perfil = tbl_perfis.id', 'inner');
        $this->db->select('tbl_usuario.matricula, tbl_usuario.cpf, tbl_usuario.nome, tbl_usuario.email, tbl_usuario.contato, tbl_usuario.status, tbl_usuario.idusuario, tbl_perfis.nome as perfil');

        if ($condicao != NULL) {

            $this->db->where($condicao);
        }

        if ($ordem != NULL) {

            $this->db->order_by($ordem);
        }

        if ($result) {
            return $this->db->get('tbl_usuario')->result();
        }

        return $this->db->get('tbl_usuario');
    }

    public function cadastrar($dados = NULL, $dados_aluno = NULL) {
        if ($dados != NULL) {
            if ($this->db->insert('tbl_usuario', $dados)) {

                return TRUE;
            } else {

                return FALSE;
            }
        }

        return FALSE;
    }

    public function editar($condicao = NULL, $dados = NULL, $dados_aluno = NULL) {

        if ($condicao != NULL && $dados != NULL) {

            /* caso seja alteração para aluno */
            if ($dados['tipo_usuario'] == 1) {
                //atualiza dados da tabela de usuario
                if ($this->db->where(array('usuario_idusuario' => $condicao['idusuario']))->update('tbl_aluno', $dados_aluno)) {
                    //verifica se existe dados deste usuário na tabela de aluno
                    if ($this->where(array('usuario_idusuario' => $condicao['idusuario']))->get('tbl_aluno')->num_rows() >= 1) {
                        //se existir dados, atualia os mesmos
                        if ($this->db->where($condicao)->update('usuario', $dados)) {
                            return TRUE;
                        }
                        //se não existir dados, insere na tabela os novos.
                    } else {
                        $dados_aluno['usuario_idusuario'] = $condicao['idusuario'];
                        if ($this->db->insert('tbl_aluno', $dados_aluno)) {
                            return TRUE;
                        } else {
                            return FALSE;
                        }
                    }
                }

                return FALSE;
            }
            /* caso seja alteração para outro tipo de usuário */ else {
                if ($this->db->where($condicao)->update('tbl_usuario', $dados)) {
                    //verifica se existe dados deste usuário na tabela de aluno
                    if ($this->where(array('usuario_idusuario' => $condicao['idusuario']))->get('tbl_aluno')->num_rows() >= 1) {
                        //se existir dados, deleta os mesmos pois foi alterado o tipo de usuário
                        if ($this->db->delete('tbl_usuario', $condicao)) {
                            return TRUE;
                        } else {
                            return FALSE;
                        }
                    }

                    return TRUE;
                }

                return FALSE;
            }
        }

        return FALSE;
    }

}
