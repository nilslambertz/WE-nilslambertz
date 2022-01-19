<?php namespace App\Controllers;
use App\Models\AufgabenModel;
use App\Models\ReiterModel;

class Todos extends BaseController {
    private $AufgabenModel;
    private $ReiterModel;

    public function __construct() {
        if(session()->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
    }

    public function index() {
        if(session()->get("projektId") != null) {
            $data['aufgaben'] = $this->AufgabenModel->getAufgabenAndMitgliederAndReiter(NULL, session()->get("projektId"));
        } else {
            $data['aufgaben'] = $this->AufgabenModel->getAufgabenAndMitgliederAndReiter();
        }
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('todos', $data);
        echo view('templates/footer');
    }
}