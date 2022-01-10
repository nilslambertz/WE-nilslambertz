<?php namespace App\Controllers;
use App\Models\AufgabenMitgliederModel;
use App\Models\AufgabenModel;
use App\Models\MitgliederModel;
use App\Models\ReiterModel;
use CodeIgniter\Controller;

class Todos extends BaseController {
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
        helper('functions');

        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
        $this->MitgliederModel = new MitgliederModel();
        $this->AufgabenMitgliederModel = new AufgabenMitgliederModel();
    }

    public function index() {
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();
        if(isset($_SESSION['projektId'])) {
            $data['aufgaben'] = getAufgabenFromProjekt($data['aufgaben'], $_SESSION['projektId']);
        }
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['aufgaben_mitglieder'] = $this->AufgabenMitgliederModel->getAufgabenMitglieder();
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('todos', $data);
        echo view('templates/footer');
    }
}