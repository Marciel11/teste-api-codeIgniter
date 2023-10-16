<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class User extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function index()
    {
        if ($this->model->findAll()) {
            return $this->genericResponse("", $this->model->findAll(), "Dados retornados com sucesso", 200);
        } else {
            return $this->genericResponse(null, "", "Não existe cliente na base de dados ", 500);
        }
    }

    public function create()
    {
        $user = new UserModel();
        $data = $this->request->getPost();

        if ($this->validate('users')) {

            $type_client =  strlen($data['cpf_cnpj']) == 11 ? 'PF' : 'PJ';

            $id = $user->insert([
                'name_or_fantasy' => $data['name_or_fantasy'],
                'cpf_cnpj' => $data['cpf_cnpj'],
                'address' => $data['address'],
                'type_user' => $type_client,
            ]);

            return $this->genericResponse("", $this->model->find($id), "Cliente cadastrado com sucesso", 200);
        }
        $validation = \Config\Services::validation();
        return $this->genericResponse(null, null, $validation->getErrors(), 500);
    }

    public function update($id = null)
    {
        $user = new UserModel();
        $data = $this->request->getRawInput();

        if ($this->validate('users_update')) {

            $type_client =  strlen($data['cpf_cnpj']) == 11 ? 'PF' : 'PJ';

            $user->update($id, [
                'name_or_fantasy' => $data['name_or_fantasy'],
                'cpf_cnpj' => $data['cpf_cnpj'],
                'address' => $data['address'],
                'type_user' =>  $type_client,
            ]);

            return $this->genericResponse("", $this->model->find($id), "Cliente atualizado com sucesso", 200);
        }

        $validation = \Config\Services::validation();
        return $this->genericResponse(null, null, $validation->getErrors(), 500);
    }

    public function delete($id = null)
    {
        $user = new UserModel();
        $data = $user->find($id);

        if ($data) {
            $user->delete($id);
            return $this->genericResponse("", $this->model->find($id), "Cliente excluído com sucesso", 200);
        }

        return $this->genericResponse("", $this->model->findAll(), "Falha ao excluir Cliente", 500);
    }

    private function genericResponse($head, $data, $msg, $status)
    {
        if ($status == 200) {
            return $this->respond(array(
                "cabecalho" => [
                    "data" => $data,
                    "msg" => $msg,
                    "status" => $status
                ]
            ));
        } else {
            return $this->respond(array(
                "msg" => $msg,
                "status" => $status
            ));
        }
    }
}
