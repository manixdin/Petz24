<?php

namespace App\Controllers;

class MyBookingController extends BaseController
{
    
    public function index()
    {
        return view('my_booking');
    } 

    public function getMyBooking()
    {
        $db = \Config\Database::connect();
        $user_id = $this->request->getPost("user_id"); 
        $query = $db->query("
            SELECT 
                b.`booking_id`, 
                b.`booking_date`, 
                t.from_time, 
                t.to_time, 
                p.plan_name, 
                IFNULL(b.`address_id`, 'no') as status 
            FROM `booking_tbl` b 
            INNER JOIN `timeslot_tbl` t ON t.slot_id = b.`slot_id` 
            INNER JOIN `pet_plan_tbl` p ON p.plan_id = b.`plan_id` 
            WHERE b.user_id = '$user_id'
        ");

        $bookings = $query->getResultArray();
        $today = date('Y-m-d'); 
        // Separate bookings into past and upcoming
        $pastBookings = [];
        $upcomingBookings = [];

        foreach ($bookings as $booking) {
            if ($booking['booking_date'] < $today) {
                $pastBookings[] = $booking;
            } else {
                $upcomingBookings[] = $booking;
            }
        }
        // Return data as JSON
        return $this->response->setJSON([
            'past_bookings' => $pastBookings,
            'upcoming_bookings' => $upcomingBookings
        ]);
    }
    
    public function bookingInfo($data){
        return view('booking_info');
    }

    public function getBookingInfo(){
        $db = \Config\Database::connect();
        $userID = $this->request->getPost("user_id"); 
        $bookingID = $this->request->getPost("booking_id"); 
        $query = $db->query("SELECT b.*, pp.plan_img FROM `booking_tbl` b inner join pet_plan_tbl pp ON b.plan_id = pp.plan_id WHERE `booking_id` = $bookingID and `user_id` = $userID");
        $info = $query->getRowArray();
        return $this->response->setJSON($info);
    }
    
}
