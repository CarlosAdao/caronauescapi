<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('localizacao')->where('cod', $id)->get();

	 if ($query->num_rows() === 1) {
                return $query->row_array();
            }
            return null;
        }

        $query = $this->db->select('*')->from('localizacao')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($localizacao)
    {
        $guarda = $localizacao[0];
        $this->db->set($this->_setLocalizacao($guarda))->insert('localizacao');

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

     return null;
    }

    public function update($localizacao)
    {
	$guarda = $localizacao[0];
        $id = $guarda['cod'];

        $this->db->set($this->_setLocalizacao($guarda))->where('cod', $id)->update('localizacao');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    public function delete($id)
    {
        $this->db->where('cod', $id)->delete('localizacao');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    private function _setLocalizacao($localizacao)
    {
        return array(
            'cod' =>$localizacao['cod'],
            'att'   => $localizacao['att'],
            'lat'   => $localizacao['lat'],
            'log'   => $localizacao['log'],
            'provider'   => $localizacao['provider']
        );
    }
}
