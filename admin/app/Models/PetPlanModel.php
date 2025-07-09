<?php
namespace App\Models;
use CodeIgniter\Model;

class PetPlanModel extends Model{
    protected $table = 'pet_plan_tbl';
    protected $primaryKey = 'plan_id';
    protected $allowedFields = [
        'pet_id', 
        'plan_name', 
        'plan_price', 
        'duration', 
        'plan_img', 
        'plan_type', 
        'flag'
    ];
}