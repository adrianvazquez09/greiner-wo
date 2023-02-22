<?php

namespace App\Controllers;
use TCPDF;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OrderModel;

class OrderApi extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function __construct()
    {
        $this->order = new OrderModel();
    }
    public function index()
    {
        $data = $this->order->findAll();
        return $this->respond($data);
    }
 
    // get single product
    public function show($id = null)
    {
        $data = $this->order->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // create a product
    public function create()
    {
        $data = [
            'service_type' => $this->request->getVar('service_type'),
            'department_req' => $this->request->getVar('department_req')
        ];
        $this->order->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }
 
    // update product
    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        $data = [
            'service_type' => $input['service_type'],
            'department_req' => $input['department_req']
        ];
        $this->order->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
 
    // delete product
    public function delete($id = null)
    {
        $data = $this->order->find($id);
        if($data){
            $this->order->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }

    
}
