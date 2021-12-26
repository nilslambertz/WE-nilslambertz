<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Reiter extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('reiter');
        echo view('templates/footer');
    }
}