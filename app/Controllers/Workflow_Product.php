<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class Workflow_Product extends ResourceController
{
    private $db;

    public function __construct()
    {
        
    }

    public function index(){
        echo 'hi';exit;
    }
}
