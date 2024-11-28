<?php
    namespace App\Controllers;
    use App\Models\PetPlanTimeSlotModel;
    class Workflow_PetPlanTimeSlot extends BaseController
    { 
        public function index(){
            return view('pet_plan_timeslot');
        } 
        public function getTimeSlot() { 
            $builder = $this->db->table('timeslot_tbl');
            $builder->select('timeslot_tbl.*');
            $builder->where('timeslot_tbl.flag=1');
            $data = $builder->get(); 
            $data = $data->getResult();
        
            if ($data) {
                // Format the time fields to AM/PM
                foreach ($data as $slot) { 
                    $slot->from_time_12hr = date("h:i A", strtotime($slot->from_time));
                    $slot->to_time_12hr = date("h:i A", strtotime($slot->to_time));
                }
        
                echo $this->response_message([
                    'code' => 200,
                    'data' => json_encode($data)
                ]); 
                return;
            }
            
            echo $this->response_message(false, false);
        }
        
        public function insertTimeSlot() {
            $PetPlanTimeSlotModel = new PetPlanTimeSlotModel;
            $request = \Config\Services::request();
            $data =  $request->getPost();
        
            // Convert time strings to timestamps for comparison
            $fromTime = strtotime($data['from_time']);
            $toTime = strtotime($data['to_time']);
        
            // Check if from_time is less than to_time
            if ($fromTime >= $toTime) {
                echo $this->response_message([
                    'code' => 400,
                    'msg' => "From time should be less than to time"
                ]);
                return;
            }
        
            if ($data && $PetPlanTimeSlotModel->insert($data, false)) {
                echo $this->response_message([
                    'code' => 200,
                    'msg' => "Timeslot inserted successfully!"
                ]);
                return;
            }
        
            echo $this->response_message(false);
        }
        
        public function updateTimeSlot() {
            $PetPlanTimeSlotModel = new PetPlanTimeSlotModel;
            $request = \Config\Services::request();
            $data =  $request->getPost();
        
            // Convert time strings to timestamps for comparison
            $fromTime = strtotime($data['from_time']);
            $toTime = strtotime($data['to_time']);
        
            // Check if from_time is less than to_time
            if ($fromTime >= $toTime) {
                echo $this->response_message([
                    'code' => 400,
                    'msg' => "From time should be less than to time"
                ]);
                return;
            }
        
            $slot_id = $data['slot_id'];
            $pet_check = $PetPlanTimeSlotModel->where('slot_id', $slot_id)->first();
        
            if ($pet_check) {
                $update = $PetPlanTimeSlotModel->save($data);
                if ($data && $update) {
                    if ($PetPlanTimeSlotModel->db->affectedRows()) {
                        echo $this->response_message([
                            'code' => 200,
                            'msg' => "Timeslot updated successfully!"
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
        }
        
        public function deleteTimeSlot(){
            $PetPlanTimeSlotModel = new PetPlanTimeSlotModel;
            $request = \Config\Services::request();
            $data =  [
                'slot_id' => $request->getPost('slot_id'),
                'flag' => 0
            ]; 
            $delete = $PetPlanTimeSlotModel->save($data); 
            if($delete){
                if($PetPlanTimeSlotModel->db->affectedRows()){
                    echo $this->response_message([
                        'code' => 200,
                        'msg' => "Timeslot deleted successfully!"
                    ]); return;
                }
            }
            echo $this->response_message(false);
        }  
    }
?>