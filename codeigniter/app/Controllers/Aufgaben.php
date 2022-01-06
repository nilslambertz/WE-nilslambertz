<?php namespace App\Controllers;
use App\Models\AufgabenModel;
use App\Models\ReiterModel;
use App\Models\MitgliederModel;
use App\Models\AufgabenMitgliederModel;
use CodeIgniter\Controller;

class Aufgaben extends BaseController {
    private $AufgabenModel;
    private $ReiterModel;
    private $MitgliederModel;
    private $AufgabenMitgliederModel;
    private $session;

    public function __construct() {
        $this->session = \Config\Services::session();
        if($this->session->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
        $this->MitgliederModel = new MitgliederModel();
        $this->AufgabenMitgliederModel = new AufgabenMitgliederModel();
    }

    public function index() {
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['aufgaben_mitglieder'] = $this->AufgabenMitgliederModel->getAufgabenMitglieder();
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('aufgaben', $data);
        echo view('templates/footer');
    }
}