<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model{
    protected $table = 'booking_tbl';
    protected $primaryKey = 'booking_id';
    protected $allowedFields = [
        'user_id',
        'user_pet_id',
        'plan_id',
        'booking_date',
        'slot_id',
        'address_id',
        'center_id',
        'booking_status',
        'payment_status',
        'booking_json',
        'flag'
   
    ];
}