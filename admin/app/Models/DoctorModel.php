<?php
namespace App\Models;
use CodeIgniter\Model;

class DoctorModel extends Model {
    protected $table = 'doctor_tbl';
    protected $primaryKey = 'doctor_id'; // ✅ must be exact
    protected $allowedFields = [
        'doctor_id',       // ✅ MUST be here
        'doctor_name',
        'language_id',
        'designation',
        'registration_no',
        'doctor_img',
        'flag'
    ];
}