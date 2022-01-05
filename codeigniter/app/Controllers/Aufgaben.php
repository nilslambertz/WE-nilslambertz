<?php namespace App\Controllers;
use App\Models\AufgabenModel;
use CodeIgniter\Controller;

class Aufgaben extends BaseController {
    private $AufgabenModel;

    public function __construct() {
        $this->AufgabenModel = new AufgabenModel();
    }

    public function index() {
        $data['aufgaben'] = $this->AufgabenModel->getAufgaben();

        echo view('templates/header');
        echo view('aufgaben', $data);
        echo view('templates/footer');
    }
}