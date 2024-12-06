<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

use App\Models\BookingModel;

class Workflow_Booking extends BaseController
{

    protected $db;

    protected $model;

    public function __construct()
    {
        $this->db = db_connect();
        $this->model = new BookingModel;
    }



    public function getBooking() {
        // Use a join query to fetch booking and user details
        $data = $this->model
            ->select('
            booking_tbl.booking_id as booking_id, 
            booking_tbl.booking_date as booking_date,
            booking_tbl.booking_status as booking_status,
            booking_tbl.payment_status as payment_status,
            user_tbl.first_name as first_name, 
            user_tbl.last_name as last_name, 
            pet_plan_tbl.plan_name as plan_name, 
            user_pet_tbl.name as user_pet_name, 
            pet_tbl.pet_name as pet_name,             
            ') // Add required user fields
            ->join('user_tbl', 'user_tbl.user_id = booking_tbl.user_id') // Join on the user ID
            ->join('pet_plan_tbl', 'pet_plan_tbl.plan_id = booking_tbl.plan_id') // Join on the user ID
            ->join('user_pet_tbl', 'user_pet_tbl.user_pety_id = booking_tbl.user_pet_id') // Join on the user ID
            ->join('pet_tbl', 'pet_tbl.pet_id = user_pet_tbl.pet_id') // Join on the user ID
            ->where('booking_tbl.flag', 1) // Ensure booking flag is 1
            ->where('pet_plan_tbl.flag', 1) // Ensure booking flag is 1
            ->where('user_pet_tbl.flag', 1) // Ensure booking flag is 1
            ->where('user_tbl.flag', 1)   // Ensure user flag is 1
            ->where('pet_tbl.flag', 1)   // Ensure user flag is 1

            ->findAll();
    
        if ($data) {
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($data) // Return the combined data
            ]);
            return;
        }
        echo $this->response_message(false);
    }

    

    public function getSpecificBooking(){

        $request = \Config\Services::request();
        $data =  $request->getPost();
        $response = $this->model
            ->select('
            booking_tbl.booking_id as booking_id, 
            booking_tbl.booking_date as booking_date,
            booking_tbl.booking_json as booking_json,
            booking_tbl.booking_status as booking_status,
            booking_tbl.payment_status as payment_status,
            user_tbl.first_name as first_name, 
            user_tbl.last_name as last_name, 
            pet_plan_tbl.plan_name as plan_name, 
            user_pet_tbl.name as user_pet_name, 
            pet_tbl.pet_name as pet_name,             
            ') // Add required user fields
            ->join('user_tbl', 'user_tbl.user_id = booking_tbl.user_id') // Join on the user ID
            ->join('pet_plan_tbl', 'pet_plan_tbl.plan_id = booking_tbl.plan_id') // Join on the user ID
            ->join('user_pet_tbl', 'user_pet_tbl.user_pety_id = booking_tbl.user_pet_id') // Join on the user ID
            ->join('pet_tbl', 'pet_tbl.pet_id = user_pet_tbl.pet_id') // Join on the user ID
            ->where('booking_tbl.booking_id', $data["id"]) // Add condition for booking_id
            ->where('booking_tbl.flag', 1) // Ensure booking flag is 1
            ->where('pet_plan_tbl.flag', 1) // Ensure booking flag is 1
            ->where('user_pet_tbl.flag', 1) // Ensure booking flag is 1
            ->where('user_tbl.flag', 1)   // Ensure user flag is 1
            ->where('pet_tbl.flag', 1)   // Ensure user flag is 1
            
            ->findAll();

        if ($response) {
            echo $this->response_message([
                'code' => 200,
                'data' => json_encode($response) // Return the combined data
            ]);
            return;
        }

    }

}