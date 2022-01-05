<?php namespace App\Controllers;
use App\Models\ProjekteModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;

class Mitglieder extends BaseController {
    private $MitgliederModel;
    private $ProjekteModel;

    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteModel = new ProjekteModel();
    }

    public function index() {
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['projekte'] = $this->ProjekteModel->getProjekte();

        echo view('templates/header');
        echo view('mitglieder', $data);
        echo view('templates/footer');
    }
}