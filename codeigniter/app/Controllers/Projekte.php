<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProjekteModel;

class Projekte extends BaseController {
    private $ProjekteModel;

    public function __construct() {
        if(session()->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->ProjekteModel = new ProjekteModel();
    }

    public function index() {
        $data['projekte'] = $this->ProjekteModel->getProjekte();

        echo view('templates/header');
        echo view('projekte', $data);
        echo view('templates/footer');
    }
}