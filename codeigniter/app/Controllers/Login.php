<?php namespace App\Controllers;
use App\Models\ProjekteMitgliederModel;
use App\Models\ProjekteModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;

class Login extends BaseController {
    private $MitgliederModel;
    private $ProjekteMitgliederModel;
    private $ProjekteModel;

    private $projekteMitglieder;

    public function __construct()
    {
        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteMitgliederModel = new ProjekteMitgliederModel();
        $this->ProjekteModel = new ProjekteModel();

        $this->projekteMitglieder = $this->ProjekteMitgliederModel->getProjekteMitglieder();
    }

    function process_logout() {
        session()->destroy();
        return redirect()->to(base_url() . '/login');
    }

    function process_login() {
        if($this->validation->run($_POST, "login")) {
            $mitglied = $this->MitgliederModel->login($_POST['username']);
            if($mitglied != null) {
                $password = $mitglied['password'];
                if(password_verify($_POST['password'], $password)) {
                    session()->set('userId', $mitglied['id']);
                    session()->set('username', $mitglied['username']);
                    session()->set('loggedIn', true);
                    return redirect()->to(base_url() . '/projekte');
                }
            }
        } else {
            $data['values'] = $_POST;
            $data['error'] = $this->validation->getErrors();

            echo view('templates/header');
            echo view('login', $data);
            echo view('templates/footer');
        }
    }

    public function index() {
        if(session()->get('loggedIn') == true) {
            header('Location: ' . base_url() . '/projekte');
            exit();
        }

        echo view('templates/header');
        echo view('login');
        echo view('templates/footer');
    }
}