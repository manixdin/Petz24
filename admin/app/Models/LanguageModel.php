<?php
namespace App\Models;
use CodeIgniter\Model;

class LanguageModel extends Model{
    protected $table = 'doctor_language_tbl';
    protected $primaryKey = 'language_id';
    protected $allowedFields = [
        'language_name',
        'flag'
    ];
}