<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Todos extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('todos');
        echo view('templates/footer');
    }
}