<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

use App\Models\DoctorModel;

class Workflow_Doctor extends BaseController
{

    public function __construct()
    {
        
    }

public function getDoctor() {


    $db = \Config\Database::connect();

    $builder = $db->table('doctor_tbl dt');
    $builder->select('dt.*, dl.language_name');
    $builder->join('doctor_language_tbl dl', 'dl.language_id = dt.language_id', 'left');
    $builder->where('dt.flag', 1);

    $query = $builder->get();
    $data = $query->getResultArray();

    if ($data) {
        echo $this->response_message([
            'code' => 200,
            'data' => json_encode($data)
        ]);
        return;
    }

    echo $this->response_message(false);
}


    public function getSpecificDoctor(){

        $doctorModel = new DoctorModel;
        $request = \Config\Services::request();
        $data =  $request->getPost();

        $response = $doctorModel->where('doctor_id', $data['doctor_id'])->first();
        
        if($response){
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data)
            ]);
        }

        echo $this->response_message(false);
    }



 public function insertDoctor() {
    $doctorModel = new DoctorModel;
    $request = \Config\Services::request();
    $data = $request->getPost();

    // Check if doctor already exists
    $doctorCheck = $doctorModel->where([
        'doctor_name' => $data['doctor_name'],
        'flag' => 1
    ])->find();

    if (!$doctorCheck) {
        // Handle doctor image upload
        if (!empty($_FILES['doctor_img']['name'])) {
            $img = $request->getFile('doctor_img');
            if ($img && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('uploads/doctor', $newName);
                $data['doctor_img'] = 'uploads/doctor/' . $newName;
            }
        }

        // Insert doctor data
        if ($data && $doctorModel->insert($data, false)) {
            echo $this->response_message([
                'code' => 200,
                'msg' => "Doctor inserted successfully!"
            ]);
            return;
        }

        echo $this->response_message(false);
    } else {
        echo $this->response_message([
            'code' => 400,
            'msg' => "Doctor name already exists, try another name!"
        ]);
        return;
    }
}

public function updateDoctor(){

    $doctorModel = new DoctorModel;
    $request = \Config\Services::request();
    $data = $request->getPost();
    $filepath = '';        
    $doctor_id = isset($data['doctor_id']) ? (int)$data['doctor_id'] : 0;
    $data['doctor_id'] = $doctor_id;

    $doctor_name_check = $doctorModel->where(array('doctor_id !=' => $doctor_id, 'doctor_name' => $data['doctor_name'], 'flag' => 1))->first();
    if(!$doctor_name_check){

        $doctor_check = $doctorModel->where('doctor_id', $doctor_id)->first();
        if($doctor_check){
            if(isset($_FILES['doctor_img']) && $_FILES['doctor_img']['name'] != ''){
                $old_img = $doctor_check['doctor_img'];
                $img = $request->getFile('doctor_img');
                if ($img && !$img->hasMoved()) {
                    $newName = $img->getRandomName(); // Generate a random file name
                    $img->move('uploads/doctor', $newName); // Move the file to the uploads directory
                    $data['doctor_img'] = 'uploads/doctor/' . $newName; 
                    
                    if (!empty($old_img) && file_exists($old_img)) {
                        unlink($old_img); // This will delete the file from the server
                    }
                }
            }

            $update = $doctorModel->save($data);
            if($data && $update){
                if($doctorModel->db->affectedRows()){
                    echo $this->response_message([
                        'code' => 200,
                        'msg' => "Doctor updated successfully!"
                    ]); return;
                } else{
                    echo $this->response_message([
                        'code' => 400,
                        'msg' => "No changes"
                    ]); return;
                }
            }
        }
        echo $this->response_message(false);
    } else{
        echo $this->response_message([
            'code' => 400,
            'msg' => "Doctor name is already there try another name!"
        ]); return;
    }
}




   public function deleteDoctor() {
    $doctorModel = new DoctorModel;
    $request = \Config\Services::request();
    $data = [
        'doctor_id' => $request->getPost('doctor_id'),
        'flag' => 0
    ];

    $delete_image = $request->getPost('doctor_img');
    $delete = $doctorModel->save($data);

    if ($delete) {
        if ($doctorModel->db->affectedRows()) {
            // Delete image file if it exists
            if ($delete_image && file_exists($delete_image)) {
                unlink($delete_image);
            }

            echo $this->response_message([
                'code' => 200,
                'msg' => "Doctor deleted successfully!"
            ]);
            return;
        }
    }

    echo $this->response_message(false);
}

}