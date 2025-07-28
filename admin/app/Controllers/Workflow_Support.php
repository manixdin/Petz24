<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

use App\Models\SupportModel;

class Workflow_Support extends BaseController
{

    public function __construct()
    {
        
    }

    public function getSupport(){

        $supportModel = new SupportModel;
        $data = $supportModel->where('flag', 1)->findAll();

        if($data){
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data)
            ]); return;
        }

        echo $this->response_message(false);
    }

    public function getSpecificSupport(){

        $supportModel = new SupportModel;
        $request = \Config\Services::request();
        $data =  $request->getPost();

        $response = $supportModel->where('support_id', $data['support_id'])->first();
        
        if($response){
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data)
            ]);
        }

        echo $this->response_message(false);
    }



public function insertSupport() {
    $supportModel = new SupportModel;
    $request = \Config\Services::request();
    $data = $request->getPost();


    $supportCheck = $supportModel->where([
        'support_email' => $data['support_email'],
        'flag' => 1
    ])->find();

    if (!$supportCheck) {
        if ($data && $supportModel->insert($data, false)) {
            echo $this->response_message([
                'code' => 200,
                'msg' => "Support inserted successfully!"
            ]);
            return;
        }
        echo $this->response_message(false);
    } else {
        echo $this->response_message([
            'code' => 400,
            'msg' => "Support name already exists, try another!"
        ]);
        return;
    }
}

    

public function updateSupport() {
    $supportModel = new SupportModel;
    $request = \Config\Services::request();
    $data = $request->getPost();
    $support_id = $data['support_id'];

    // Check if the same support name already exists for another record
    $supportNameCheck = $supportModel
        ->where(['support_id !=' => $support_id, 'support_email' => $data['support_email'],'support_contact' => $data['support_contact'], 'flag' => 1])
        ->first();

    if (!$supportNameCheck) {
        $supportCheck = $supportModel->where('support_id', $support_id)->first();

        if ($supportCheck) {
            $update = $supportModel->save($data);
            if ($data && $update) {
                if ($supportModel->db->affectedRows()) {
                    echo $this->response_message([
                        'code' => 200,
                        'msg' => "Support updated successfully!"
                    ]);
                    return;
                } else {
                    echo $this->response_message([
                        'code' => 400,
                        'msg' => "No changes"
                    ]);
                    return;
                }
            }
        }

        echo $this->response_message(false);
    } else {
        echo $this->response_message([
            'code' => 400,
            'msg' => "Support name already exists, try another!"
        ]);
        return;
    }
}




}