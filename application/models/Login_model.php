Usuario_model<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verifica_login($usuario)
    {

      $email = $usuario['email'];
      $senha = $usuario['senha'];

      $query = $this->db->select('*')->from('usuario')->where('email', $email)->where('senha', $senha)->get();
	    if ($query->num_rows() === 1) {
                return $query->row_array();
            }
            return null;
    }
}
