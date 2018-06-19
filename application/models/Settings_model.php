<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('settings')->where('codigo', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }

            return null;
        }

        $query = $this->db->select('*')->from('settings')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return null;
    }

    public function save($settings)
    {
        $this->db->set($this->_setSettings($settings))->insert('settings');

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return null;
    }

    public function update($settings)
    {
        $id = $settings['codigo'];

        $this->db->set($this->_setSettings($settings))->where('codigo', $id)->update('settings');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    public function delete($id)
    {
        $this->db->where('codigo', $id)->delete('settings');

        if ($this->db->affected_rows() === 1) {
            return true;
        }

        return null;
    }

    private function _setSettings($settings)
    {
        return array(
            'cod' =>$settings['cod'],
            'att_funcionario'   => $settings['att_funcionario'],
            'att_professor'   => $settings['att_professor'],
            'att_sala'   => $settings['att_sala'],
            'att_semestre_virgente'   => $settings['att_semestre_virgente'],
            'att_disciplina'   => $settings['att_disciplina'],
            'att_ementa'   => $settings['att_ementa'],
            'att_pre_requisito'   => $settings['att_pre_requisito'],
            'att_disciplina_dia_hora'   => $settings['att_disciplina_dia_hora']
        );
    }
}
