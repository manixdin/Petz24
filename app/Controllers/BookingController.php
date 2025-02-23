<?php

namespace App\Controllers;

class BookingController extends BaseController
{
    
    public function index()
    {
        return view('booking');
    }

    public function getPetList()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM pet_tbl");
        $pets = $query->getResultArray();
        return $this->response->setJSON($pets);
    } 

    public function getBreedList()
    {
        $db = \Config\Database::connect();
        $petID = $this->request->getPost("petID"); 
        $query = $db->query("SELECT * FROM breed_tbl WHERE pet_id = '$petID'");
        $pets = $query->getResultArray();
        return $this->response->setJSON($pets);
    } 

    function getUserPetPlan(){
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $pedID = $data["pet_id"];
        $query = $db->query("SELECT * FROM `pet_plan_tbl` WHERE `pet_id` = '$pedID' AND flag = '1'");
        $plans = $query->getResultArray();
        foreach($plans as $index => $plan){
            $planId = $plan["plan_id"];
            $query = $db->query("SELECT `service_name`,`service_details` FROM `pet_plan_details_tbl` WHERE `plan_id` = '$planId' AND flag = '1'");
            $plans[$index]["services"] = $query->getResultArray();
        }
        return $this->response->setJSON($plans);
    }

    public function getTimeSlot() {
        $db = \Config\Database::connect();
        $dateString = $this->request->getPost('date');
        preg_match('/(\w+ \w+ \d+ \d+ \d+:\d+:\d+)/', $dateString, $matches);
        if (empty($matches)) {
            throw new Exception('Invalid date format.');
        }
        $dateTime = new \DateTime($matches[1], new \DateTimeZone('Asia/Kolkata'));
        $formattedDate = $dateTime->format('Y-m-d');
        $query = $db->query("SELECT *, 'yes' as status FROM `timeslot_tbl` WHERE flag = '1'");
        $timeSlot = $query->getResultArray();
        $currentDate = new \DateTime('now', new \DateTimeZone('Asia/Kolkata'));
        $currentDateFormatted = $currentDate->format('Y-m-d');
        if ($formattedDate == $currentDateFormatted) {
            $currentTime = $currentDate->format('H:i');
            foreach ($timeSlot as &$slot) { 
                if (isset($slot['from_time']) && $slot['from_time'] < $currentTime) {
                    $slot['status'] = 'no';
                }
                $slot['from_time_12hr'] = date("h:i A", strtotime($slot['from_time']));
                $slot['to_time_12hr'] = date("h:i A", strtotime($slot['to_time']));
            }
        }
        else{
            foreach ($timeSlot as &$slot) {
                $slot['from_time_12hr'] = date("h:i A", strtotime($slot['from_time']));
                $slot['to_time_12hr'] = date("h:i A", strtotime($slot['to_time']));
            }  
        }
        return $this->response->setJSON($timeSlot);     
    } 
    function addBooking(){
        $db = \Config\Database::connect();
        $data = $this->request->getPost(); 

    
        preg_match('/(\w+ \w+ \d+ \d+ \d+:\d+:\d+)/', $data['booking_date'], $matches);
        if (empty($matches)) {
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Invalid booking date format'
            ]);
        }
        $dateTime = new \DateTime($matches[1], new \DateTimeZone('Asia/Kolkata'));
        $formattedDate = $dateTime->format('Y-m-d'); 
        $bookingJson = json_encode($data);





       
        if (!isset($data['address_id'])) {
            $data['address_id'] = NULL;
        }
        if (!isset($data['center_id'])) {
            $data['center_id'] = NULL;
        }
        $sql = "INSERT INTO `booking_tbl` (`user_id`, `user_pet_id`, `plan_id`, `booking_date`, `slot_id`, `address_id`, `center_id`, `booking_json`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";





        $query = $db->query($sql, [
            $data['user_id'], 
            $data['user_pet_id'], 
            $data['plan_id'], 
            $formattedDate, 
            $data['slot_id'], 
            $data['address_id'], 
            $data['center_id'], 
            $bookingJson
        ]); 



        
        if ($query) {
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'Plan booked successfully'
            ]);
        } else {
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Plan not booked successfully'
            ]);
        }
    }
    
}
