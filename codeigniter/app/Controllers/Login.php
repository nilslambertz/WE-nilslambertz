<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Login extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('login');
        echo view('templates/footer');
    }
}