<?php
    namespace App\Controllers;
    use App\Models\PetPlanModel;
    class Workflow_PetPlan extends BaseController
    { 
        public function index(){
            return view('pet_plan');
        } 
        public function getpetplan(){ 
            $builder = $this->db->table('pet_plan_tbl');
            $builder->select('pet_plan_tbl.*, pet_tbl.pet_name');
            $builder->join('pet_tbl', 'pet_tbl.pet_id = pet_plan_tbl.pet_id');
            $builder->where('pet_plan_tbl.flag=1');
            $data = $builder->get(); 
            $data =$data->getResult(); 
            if($data){
                echo $this->response_message([
                    'code' => 200,
                    'data' => json_encode($data)
                ]); 
                return;
            }
            echo $this->response_message(false, false);
        } 
        public function insertPetPlan(){
            $petPlanModel = new PetPlanModel;
            $request = \Config\Services::request();
            $data =  $request->getPost();
            if($_FILES['plan_img']['name'] != ''){
                $img = $this->request->getFile('plan_img');
                if (!$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/plan', $newName);
                    $data['plan_img']= 'uploads/plan/'.$newName;          
                }
            }
            if($data && $petPlanModel->insert($data, false)){
                echo $this->response_message([
                    'code' => 200,
                    'msg' => "Pet plan inserted successfully!"
                ]); return;
            }
            echo $this->response_message(false);
        }
        public function updatePetPlan(){ 
            $planModel = new PetPlanModel;
            $request = \Config\Services::request();
            $data =  $request->getPost(); 
            $plan_id = $data['plan_id'];  
            $pet_check = $planModel->where('plan_id', $plan_id)->first();
            if($pet_check){
                if($_FILES['plan_img']['name'] != ''){
                    $old_img=$pet_check['plan_img'];
                    $img = $this->request->getFile('plan_img');
                    if (!$img->hasMoved()) {
                        $newName = $img->getRandomName(); // Generate a random file name
                        $img->move('uploads/pet', $newName); // Move the file to the uploads directory
                        $data['plan_img']= 'uploads/pet/'.$newName;  
                        if (file_exists($old_img)) {
                            unlink($old_img); // This will delete the file from the server
                        }
                    }
                }    
                $update = $planModel->save($data);
                if($data && $update){
                    if($planModel->db->affectedRows()){
                        echo $this->response_message([
                            'code' => 200,
                            'msg' => "Pet plan updated successfully!"
                        ]); return;
                    } 
                    else{
                        echo $this->response_message([
                            'code' => 400,
                            'msg' => "No changes"
                        ]); return;
                    }
                }
            }
            echo $this->response_message(false);
        }   
        public function deletePetPlan(){
            $petPlanModel = new PetPlanModel;
            $request = \Config\Services::request();
            $data =  [
                'plan_id' => $request->getPost('plan_id'),
                'flag' => 0
            ]; 
            $delete_image = $request->getPost('plan_img');
            $delete = $petPlanModel->save($data); 
            if($delete){
                if($petPlanModel->db->affectedRows()){
                    if (file_exists($delete_image)) {
                        unlink($delete_image); 
                    }
                    echo $this->response_message([
                        'code' => 200,
                        'msg' => "Pet Plan deleted successfully!"
                    ]); return;
                }
            }
            echo $this->response_message(false);
        }  
    }
?>