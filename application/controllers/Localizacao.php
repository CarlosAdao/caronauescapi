

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class Localizacao extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('localizacao_model');
    }

    public function index_get()
    {
        $localizacao = $this->localizacao_model->get();

        if (!is_null($localizacao)) {
            $this->response($localizacao, 200);
        } else {
            $this->response(array('error' => 'Nao existe essa localizacao na base de dados'), 404);
        }
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $localizacao = $this->localizacao_model->get($id);
	
        if (!is_null($localizacao)) {
	    $this->response($localizacao, 200);
        } else {
            $this->response(array('error' => 'localizacao não encontrada'), 404);
        }
    }

    public function index_post()
    {  

       
        if (!$this->post('Localizacao')) {
             $this->response(array($this->post('Localizacao')), 409);
        }
      
        $id = $this->localizacao_model->save($this->post('Localizacao'));

        if (!is_null($id)) {
            $this->response(array('Localizacao' => $id), 200);
        } else {
            $this->response(array('Erro ao salvar localizacao!!!'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('Localizacao')) {
            $this->response(null, 400);
        }
        $update = $this->localizacao_model->update($this->put('Localizacao'));

        if (!is_null($update)) {
            $this->response(array('Localizacao' => 'Dados da localização não atualizada!'), 200);
        } else {
            $this->response(array('error', 'Não foi possivel atualizar os dados ...'), 400);
        }
    }

    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }

        $delete = $this->localizacao_model->delete($id);

        if (!is_null($delete)) {
            $this->response(array('Localizacao' => 'Localizacao excluida'), 200);
        } else {
            $this->response(array('error', 'Não foi possivel excluir a localização'), 400);
        }
    }
}
