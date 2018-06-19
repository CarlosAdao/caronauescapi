

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class Login extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index_post()
    {
        $data = json_decode( file_get_contents( 'php://input' ), true );
        //$this->response($data, 200);
        if (!$data) {
             $this->response($data, 409);
        }

        $usuario = $this->login_model->verifica_login($data);

        if (!is_null($usuario)) {
            $this->response($usuario['nome'], 200);
        } else {
            $this->response('usuario não Cadastrado!!!', 400);
        }
    }
}
