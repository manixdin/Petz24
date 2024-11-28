<?php
namespace App\Models;
use CodeIgniter\Model;

class PetPlanTimeSlotModel extends Model{
    protected $table = 'pet_plan_details_tbl';
    protected $primaryKey = 'plan_details_id';
    protected $allowedFields = [
        'plan_id',
        'service_name',
        'service_details',
        'flag'
    ];
}