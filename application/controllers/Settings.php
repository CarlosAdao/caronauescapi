<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class Settings extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Settings_model');
    }

    public function index_get()
    {
        $settings = $this->Settings_model->get();

        if (!is_null($settings)) {
            $this->response(array('Setting' => $settings), 200);
        } else {
            $this->response(array('error' => 'Nao existe settings na base de dados'), 404);
        }
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $settings = $this->Settings_model->get($id);

        if (!is_null($settings)) {
            $this->response(array('Setting' => $settings), 200);
        } else {
            $this->response(array('error' => 'settings não encontrado'), 404);
        }
    }

    public function index_post()
    {
        if (!$this->post('settings')) {
            $this->response(null, 400);
        }

        $id = $this->Settings_model->save($this->post('settingse'));

        if (!is_null($id)) {
            $this->response(array('Setting' => $id), 200);
        } else {
            $this->response(array('Erro ao salvar settings!!!'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('settings')) {
            $this->response(null, 400);
        }

        $update = $this->Settings_model->update($this->put('settings'));

        if (!is_null($update)) {
            $this->response(array('Setting' => 'Dados settings atualizado!'), 200);
        } else {
            $this->response(array('error', 'Não foi possivel atualizar os dados ...'), 400);
        }
    }

    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }

        $delete = $this->Settings_model->delete($id);

        if (!is_null($delete)) {
            $this->response(array('Setting' => 'Setting excluido'), 200);
        } else {
            $this->response(array('error', 'Não foi possivel excluir settings'), 400);
        }
    }
}
