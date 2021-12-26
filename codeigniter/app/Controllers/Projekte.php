<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Projekte extends BaseController {
    public function index() {
        echo view('templates/header');
        echo view('projekte');
        echo view('templates/footer');
    }
}