<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Mitglieder extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('mitglieder');
        echo view('templates/footer');
    }
}