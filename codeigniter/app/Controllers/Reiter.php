<?php namespace App\Controllers;
use App\Models\ReiterModel;
use CodeIgniter\Controller;

class Reiter extends BaseController {
    private $ReiterModel;

    public function __construct() {
        $this->ReiterModel = new ReiterModel();
    }

    public function index() {
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('reiter', $data);
        echo view('templates/footer');
    }
}