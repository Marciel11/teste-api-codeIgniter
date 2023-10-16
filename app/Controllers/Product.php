<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Product extends ResourceController
{
    protected $modelName = 'App\Models\ProductModel';
    protected $format    = 'json';

    public function index()
    {

        if ($this->model->findAll()) {
            return $this->genericResponse("", $this->model->findAll(), "Dados retornados com sucesso", 200);
        } else {
            return $this->genericResponse(null, "", "Não existe produto na base de dados ", 500);
        }
    }

    public function create()
    {
        $product = new ProductModel();
        $data = $this->request->getPost();

        if ($this->validate('products')) {

            $id = $product->insert([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'amount' => $data['amount'],
                'code' => $data['code']
            ]);

            return $this->genericResponse("", $this->model->find($id), "Produto cadastrado com sucesso", 200);
        }

        $validation = \Config\Services::validation();
        return $this->genericResponse(null, null, $validation->getErrors(), 500);
    }

    public function update($id = null)
    {
        $product = new ProductModel();
        $data = $this->request->getRawInput();

        if ($this->validate('products')) {

            $product->update($id, [
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'amount' => $data['amount'],
                'code' => $data['code'],
            ]);

            return $this->genericResponse("", $this->model->find($id), "Produto atualizado com sucesso", 200);
        }

        $validation = \Config\Services::validation();
        return $this->genericResponse(null, null, $validation->getErrors(), 500);
    }

    public function delete($id = null)
    {
        $product = new ProductModel();
        $data = $product->find($id);

        if ($data) {
            $product->delete($id);
            return $this->genericResponse("", $this->model->find($id), "Produto excluído com sucesso", 200);
        }

        return $this->genericResponse("", $this->model->findAll(), "Falha ao excluir registro", 500);
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
