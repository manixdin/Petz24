<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

use App\Models\LanguageModel;

class Workflow_Language extends BaseController
{

    public function __construct()
    {
        
    }

    public function getLanguage(){

        $languageModel = new LanguageModel;
        $data = $languageModel->where('flag', 1)->findAll();

        if($data){
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data)
            ]); return;
        }

        echo $this->response_message(false);
    }

    public function getSpecificLanguage(){

        $languageModel = new LanguageModel;
        $request = \Config\Services::request();
        $data =  $request->getPost();

        $response = $languageModel->where('language_id', $data['language_id'])->first();
        
        if($response){
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data)
            ]);
        }

        echo $this->response_message(false);
    }



public function insertLanguage() {
    $languageModel = new LanguageModel;
    $request = \Config\Services::request();
    $data = $request->getPost();


    $languageCheck = $languageModel->where([
        'language_name' => $data['language_name'],
        'flag' => 1
    ])->find();

    if (!$languageCheck) {
        if ($data && $languageModel->insert($data, false)) {
            echo $this->response_message([
                'code' => 200,
                'msg' => "Language inserted successfully!"
            ]);
            return;
        }
        echo $this->response_message(false);
    } else {
        echo $this->response_message([
            'code' => 400,
            'msg' => "Language name already exists, try another!"
        ]);
        return;
    }
}

    

public function updateLanguage() {
    $languageModel = new LanguageModel;
    $request = \Config\Services::request();
    $data = $request->getPost();
    $language_id = $data['language_id'];

    // Check if the same language name already exists for another record
    $languageNameCheck = $languageModel
        ->where(['language_id !=' => $language_id, 'language_name' => $data['language_name'], 'flag' => 1])
        ->first();

    if (!$languageNameCheck) {
        $languageCheck = $languageModel->where('language_id', $language_id)->first();

        if ($languageCheck) {
            $update = $languageModel->save($data);
            if ($data && $update) {
                if ($languageModel->db->affectedRows()) {
                    echo $this->response_message([
                        'code' => 200,
                        'msg' => "Language updated successfully!"
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
            'msg' => "Language name already exists, try another!"
        ]);
        return;
    }
}



    public function deleteLanguage() {
    $languageModel = new LanguageModel;
    $request = \Config\Services::request();

    $data = [
        'language_id' => $request->getPost('language_id'),
        'flag' => 0
    ];

    $delete = $languageModel->save($data);

    if ($delete) {
        if ($languageModel->db->affectedRows()) {
            echo $this->response_message([
                'code' => 200,
                'msg' => "Language deleted successfully!"
            ]);
            return;
        }
    }

    echo $this->response_message(false);
}

}