<?php
namespace App\Models;
use CodeIgniter\Model;

class ClinicModel extends Model{
    protected $table = 'clinic_tbl';
    protected $primaryKey = 'clinic_id';
    protected $allowedFields = [
        'clinic_name',
        'address',
        'city',
        'state',
        'pincode',
        'flag'
    ];
}