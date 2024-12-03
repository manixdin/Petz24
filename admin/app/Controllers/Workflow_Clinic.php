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
    


        
    public function updateClinic(){
                $request = \Config\Services::request();
                $data =  $request->getPost();
                $filepath = '';
                $updatedData=[];


                $name_check = $this->model->where(array('clinic_id !=' => $data['clinic_id'], 'clinic_name' => $data['clinic_name'], 'flag' => 1 ))->first();

                if(!$name_check){


                $id_check = $this->model->where('clinic_id', $data['clinic_id'])->first();
                if($id_check){
                    $updatedData['clinic_id']=$data['clinic_id'];
                    $updatedData['clinic_name']=$data['clinic_name'];
                    $updatedData['address']=$data['address'];
                    $updatedData['city']=$data['city'];
                    $updatedData['state']=$data['state'];
                    $updatedData['pincode']=$data['pincode'];

                    $update = $this->model->save($updatedData);
                    if($data && $update){
                        if($this->model->db->affectedRows()){
                            echo $this->response_message([
                                'code' => 200,
                                'msg' => "Clinic updated successfully!"
                            ]); return;
                        } else{
                            echo $this->response_message([
                                'code' => 400,
                                'msg' => "No changes"
                            ]); return;
                        }
                    }
                    echo $this->response_message(false, false);
                }
                echo $this->response_message(false, false);

            }else{
                echo $this->response_message([
                    'code' => 400,
                    'msg' => "Clinic name is already there try another name!"
                ]); return;
            }
    }

    public function deleteClinic(){

       
        $request = \Config\Services::request();
        $data =  $request->getPost();
        $data['flag']=0;
        if($data && $this->model->save($data)){
            echo $this->response_message([
                'code' => 200,
                'msg' => "Clinic deleted successfully!"
            ]); return;
        }

        echo $this->response_message(false, false);
    }

}