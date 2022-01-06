<?php namespace App\Controllers;
use App\Models\ReiterModel;
use CodeIgniter\Controller;

class Reiter extends BaseController {
    private $ReiterModel;
    private $session;

    public function __construct() {
        $this->session = \Config\Services::session();
        if($this->session->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->ReiterModel = new ReiterModel();
    }

    public function index() {
        $data['reiter'] = $this->ReiterModel->getReiter();

        echo view('templates/header');
        echo view('reiter', $data);
        echo view('templates/footer');
    }
}