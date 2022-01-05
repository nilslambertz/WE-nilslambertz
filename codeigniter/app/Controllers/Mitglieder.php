<?php namespace App\Controllers;
use App\Models\ProjekteModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;
use App\Models\ProjekteMitgliederModel;

class Mitglieder extends BaseController {
    private $MitgliederModel;
    private $ProjekteModel;
    private $ProjekteMitgliederModel;

    public function __construct() {
        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteModel = new ProjekteModel();
        $this->ProjekteMitgliederModel = new ProjekteMitgliederModel();
    }

    public function index() {
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['projekte'] = $this->ProjekteModel->getProjekte();
        $data['projekte_mitglieder'] = $this->ProjekteMitgliederModel->getProjekteMitglieder();

        echo view('templates/header');
        echo view('mitglieder', $data);
        echo view('templates/footer');
    }
}