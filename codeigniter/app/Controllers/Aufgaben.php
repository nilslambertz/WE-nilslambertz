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

    public function __construct() {
        if(session()->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
        $this->MitgliederModel = new MitgliederModel();
        $this->AufgabenMitgliederModel = new AufgabenMitgliederModel();
    }

    public function index() {
        if(session()->get("projektId") != null) {
            $data['aufgaben'] = $this->AufgabenModel->getAufgabenAndMitgliederAndReiter(NULL, session()->get("projektId"));
        } else {
            $data['aufgaben'] = $this->AufgabenModel->getAufgabenAndMitgliederAndReiter();
        }
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('aufgaben', $data);
        echo view('templates/footer');
    }
}