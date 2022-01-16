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

    public function select() {
        if(isset($_POST['action']) && $_POST['action'] == "select" && isset($_POST['projekt']) && $_POST['projekt'] != "") {
            if($_POST['projekt'] != "-1") {
                $projekt = $this->ProjekteModel->getProjekte($_POST['projekt']);
                if(!empty($projekt) && isset($projekt['name'])) {
                    session()->set('projektId', $_POST['projekt']);
                    session()->set('projektName', $projekt['name']);
                }
            } else {
                session()->set('projektId', null);
                session()->set('projektName', null);
            }
        }
        return redirect()->to(base_url('projekte/'));
    }
}