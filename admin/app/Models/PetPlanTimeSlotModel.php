<?php
namespace App\Models;
use CodeIgniter\Model;

class PetPlanTimeSlotModel extends Model{
    protected $table = 'timeslot_tbl';
    protected $primaryKey = 'slot_id';
    protected $allowedFields = [
        'from_time',
        'to_time',
        'flag'
    ];
}