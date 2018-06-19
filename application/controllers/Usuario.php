

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class Usuario extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index_get()
    {
        $usuario= $this->usuario_model->get();

        if (!is_null($usuario)) {
            $this->response($usuario, 200);
        } else {
            $this->response(array('error' => 'Nao existe essa localizacao na base de dados'), 404);
        }
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $usuario= $this->usuario_model->get($id);

        if (!is_null($usuario)) {
	    $this->response($usuario, 200);
        } else {
            $this->response(array('error' => 'usuario não encontrado'), 404);
        }
    }

    public function index_post()
    {
        $data = json_decode( file_get_contents( 'php://input' ), true );
        //$this->response($data, 200);
        if (!$data) {
             $this->response($data, 409);
        }

        $id = $this->usuario_model->save($data);

        if (!is_null($id)) {
            $this->response($data, 200);
        } else {
            $this->response(array('Erro ao salvar usuario!!!'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('Usuario')) {
            $this->response(null, 400);
        }
        $update = $this->usuario_model->update($this->put('Usuario'));

        if (!is_null($update)) {
            $this->response(array('Usuario' => 'Dados do usuário não atualizados!'), 200);
        } else {
            $this->response(array('error', 'Não foi possivel atualizar os dados ...'), 400);
        }
    }

    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }

        $delete = $this->usuario_model->delete($id);

        if (!is_null($delete)) {
            $this->response(array('Usuario' => 'usuário excluida'), 200);
        } else {
            $this->response(array('error', 'Não foi possivel excluir o usuário'), 400);
        }
    }
}
