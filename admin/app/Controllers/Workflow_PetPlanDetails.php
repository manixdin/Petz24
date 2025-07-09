<?php
    namespace App\Controllers;
    use App\Models\PetPlanDetailsModel;
    class Workflow_PetPlanDetails extends BaseController
    { 
        public function index(){
            return view('pet_plan_details');
        } 
        public function getpetplanDetails(){ 
            $builder = $this->db->table('pet_plan_details_tbl');
            $builder->select('pet_plan_details_tbl.*, pet_plan_tbl.plan_name, pet_tbl.pet_name');
            $builder->join('pet_plan_tbl', 'pet_plan_tbl.plan_id = pet_plan_details_tbl.plan_id');
            $builder->join('pet_tbl', 'pet_tbl.pet_id = pet_plan_tbl.pet_id');
            $builder->where('pet_plan_details_tbl.flag=1');
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
        public function insertPetPlanDetails(){

    
            $petPlanDetailsModel = new PetPlanDetailsModel;
            $request = \Config\Services::request();

    
            $data =  $request->getPost();
            if($data && $petPlanDetailsModel->insert($data, false)){
                echo $this->response_message([
                    'code' => 200,
                    'msg' => "Pet plan details inserted successfully!"
                ]); return;
            }
            echo $this->response_message(false);
        }
        public function updatePetPlanDetails(){ 
            $planModel = new PetPlanDetailsModel;
            $request = \Config\Services::request();
            $data =  $request->getPost(); 
            $plan_id = $data['plan_id'];  
            $pet_check = $planModel->where('plan_id', $plan_id)->first();
            if($pet_check){   
                $update = $planModel->save($data);
                if($data && $update){
                    if($planModel->db->affectedRows()){
                        echo $this->response_message([
                            'code' => 200,
                            'msg' => "Pet plan details updated successfully!"
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
        public function deletePetPlanDetails(){
            $petPlanDetailsModel = new PetPlanDetailsModel;
            $request = \Config\Services::request();
            $data =  [
                'plan_details_id' => $request->getPost('plan_details_id'),
                'flag' => 0
            ]; 
            $delete = $petPlanDetailsModel->save($data); 
            if($delete){
                if($petPlanDetailsModel->db->affectedRows()){
                    echo $this->response_message([
                        'code' => 200,
                        'msg' => "Pet Plan details deleted successfully!"
                    ]); return;
                }
            }
            echo $this->response_message(false);
        }  
    }
?>