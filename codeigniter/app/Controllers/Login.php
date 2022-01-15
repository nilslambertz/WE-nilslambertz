<?php namespace App\Controllers;
use App\Models\ProjekteMitgliederModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;

class Login extends BaseController {
    private $MitgliederModel;
    private $ProjekteMitgliederModel;

    private $projekteMitglieder;

    public function __construct()
    {
        helper('functions');

        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteMitgliederModel = new ProjekteMitgliederModel();

        $this->projekteMitglieder = $this->ProjekteMitgliederModel->getProjekteMitglieder();
    }

    function process_logout() {
        session()->destroy();
        return redirect()->to(base_url() . '/login');
    }

    function process_login() {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $mitglied = $this->MitgliederModel->login($_POST['username']);
            if($mitglied != null) {
                $password = $mitglied['password'];
                if(password_verify($_POST['password'], $password)) {
                    session()->set('userId', $mitglied['id']);
                    session()->set('username', $mitglied['username']);
                    session()->set('loggedIn', true);
                    $projektIds = getProjektIdsFromMitglied($this->projekteMitglieder, $mitglied);
                    if(count($projektIds) > 0) {
                        session()->set('projektId', $projektIds[0]);
                    }
                    return redirect()->to(base_url() . '/todos');
                }
            }
        }
        return redirect()->to(base_url() . '/login');
    }

    public function index() {
        if(session()->get('loggedIn') == true) {
            header('Location: ' . base_url() . '/todos');
            exit();
        }

        echo view('templates/header');
        echo view('login');
        echo view('templates/footer');
    }
}