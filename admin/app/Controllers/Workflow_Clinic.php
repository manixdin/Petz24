<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

use App\Models\ClinicModel;

class Workflow_Clinic extends BaseController
{

    protected $db;

    protected $model;

    public function __construct()
    {
        $this->db = db_connect();
        $this->model = new ClinicModel;
    }



    public function getClinic(){

        $data = $this->model->where('flag', 1)->findAll();
        if($data){
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data)
            ]); return;
        }

        echo $this->response_message(false);
    }

    public function insertClinic(){

        $request = \Config\Services::request();
        $data =  $request->getPost();
        $filepath = '';

        $name_check = $this->model->where(array('clinic_name' => $data['clinic_name'], 'flag' => 1 ))->first();
        if(!$name_check){
        if($data && $this->model->insert($data, false)){
            echo $this->response_message([
                'code' => 200,
                'msg' => "Clinic inserted successfully!"
            ]); return;
        }
        echo $this->response_message(false, false);
    }
    else{
        echo $this->response_message([
            'code' => 400,
            'msg' => "Clinic name is already there try another name!"
        ]); return;

    }
    }
    

}