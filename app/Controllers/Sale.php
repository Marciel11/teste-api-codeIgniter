<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\SaleModel;

class Sale extends ResourceController
{
    protected $modelName = 'App\Models\SaleModel';
    protected $format    = 'json';

    public function index()
    {
        if ($this->model->findAll()) {
            return $this->genericResponse("", $this->model->findAll(), "Dados retornados com sucesso", 200);
        } else {
            return $this->genericResponse(null, "", "Não existe vendas na base de dados ", 500);
        }
    }

    public function create()
    {
        $sale = new SaleModel();
        $data = $this->request->getPost();

        if ($this->validate('sales')) {

            $id = $sale->insert([
                'price_amount' => $data['price_amount'],
                'users_id' => $data['users_id'],
                'products_id' => $data['products_id'],
                'status' => $data['status'],
            ]);

            return $this->genericResponse("", $this->model->find($id), "Venda cadastrada com sucesso", 200);
        }

        $validation = \Config\Services::validation();
        return $this->genericResponse(null, null, $validation->getErrors(), 500);
    }

    public function update($id = null)
    {
        $sale = new SaleModel();
        $data = $this->request->getRawInput();

        if ($this->validate('sales')) {

            $sale->update($id, [
                'price_amount' => $data['price_amount'],
                'users_id' => $data['users_id'],
                'products_id' => $data['products_id'],
                'status' => $data['status'],
            ]);

            return $this->genericResponse("", $this->model->find($id), "Venda atualizado com sucesso", 200);
        }
        $validation = \Config\Services::validation();
        return $this->genericResponse(null, null, $validation->getErrors(), 500);
    }

    public function delete($id = null)
    {
        $sale = new SaleModel();
        $data = $sale->find($id);

        if ($data) {
            $sale->delete($id);
            return $this->genericResponse("", $this->model->find($id), "Venda excluída com sucesso", 200);
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
