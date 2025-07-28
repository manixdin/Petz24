<?php
namespace App\Models;
use CodeIgniter\Model;

class SupportModel extends Model{
    protected $table = 'support_tbl';
    protected $primaryKey = 'support_id';
    protected $allowedFields = [
        'support_email',
        'support_contact',
        'flag'
    ];
}