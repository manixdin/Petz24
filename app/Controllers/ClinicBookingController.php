<?php

namespace App\Controllers;

class ClinicBookingController extends BaseController
{
    
    public function index()
    {
        return view('clinic_booking');
    }

    public function getClinicList()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM `clinic_tbl` WHERE flag='1'");
        $pets = $query->getResultArray();
        return $this->response->setJSON($pets);
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
        $sql = "INSERT INTO `booking_tbl` (`user_id`, `user_pet_id`, `plan_id`, `booking_date`, `slot_id`, `address_id`, `booking_json`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $db->query($sql, [
            $data['user_id'], 
            $data['user_pet_id'], 
            $data['plan_id'], 
            $formattedDate, 
            $data['slot_id'], 
            $data['address_id'], 
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
