<?php namespace App\Controllers;
use App\Models\ProjekteMitgliederModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;

class Login extends BaseController {
    private $MitgliederModel;
    private $ProjekteMitgliederModel;
    private $session;

    private $projekteMitglieder;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('functions');

        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteMitgliederModel = new ProjekteMitgliederModel();

        $this->projekteMitglieder = $this->ProjekteMitgliederModel->getProjekteMitglieder();
    }

    function process_logout() {
        $this->session->destroy();
        return redirect()->to(base_url() . '/login');
    }

    function process_login() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $mitglied = $this->MitgliederModel->login($_POST['username']);
            if($mitglied != null) {
                $password = $mitglied['password'];
                if(password_verify($_POST['password'], $password)) {
                    $this->session->set('userId', $mitglied['id']);
                    $this->session->set('username', $mitglied['username']);
                    $this->session->set('loggedIn', true);
                    $projektIds = getProjektIdsFromMitglied($this->projekteMitglieder, $mitglied);
                    if(count($projektIds) > 0) {
                        $this->session->set('projektId', $projektIds[0]);
                    }
                    return redirect()->to(base_url() . '/todos');
                }
            }
        }
        return redirect()->to(base_url() . '/login');
    }

    public function index() {
        if($this->session->get('loggedIn') == true) {
            header('Location: ' . base_url() . '/todos');
            exit();
        }

        echo view('templates/header');
        echo view('login');
        echo view('templates/footer');
    }
}