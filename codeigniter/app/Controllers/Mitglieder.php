<?php namespace App\Controllers;

use App\Models\ProjekteModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;
use App\Models\ProjekteMitgliederModel;

class Mitglieder extends BaseController
{
    private $MitgliederModel;
    private $ProjekteModel;
    private $ProjekteMitgliederModel;

    public function __construct()
    {
        helper("url");
        if (session()->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteModel = new ProjekteModel();
        $this->ProjekteMitgliederModel = new ProjekteMitgliederModel();
    }

    public function index($showForm = false, $id = null, $delete = false)
    {
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['projekte'] = $this->ProjekteModel->getProjekte();
        $data['projekte_mitglieder'] = $this->ProjekteMitgliederModel->getProjekteMitglieder();
        $data['showForm'] = $showForm;
        $data['id'] = $id;
        $data['delete'] = $delete;

        echo view('templates/header');
        echo view('mitglieder', $data);
        echo view('templates/footer');
    }

    public function edit($id)
    {
        $this->index(true, $id);
    }

    public function create()
    {
        $this->index(true);
    }

    public function delete($id)
    {
        $this->index(true, $id, true);
    }

    public function submit()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            if ($action == "delete" && isset($_GET['id'])) {
                $this->MitgliederModel->deleteMitglied($_GET['id']);
            } else {
                $data = $_POST;

                if ($action == "edit" && isset($_GET['id'])) {
                    if (isset($data['password'])) {
                        if ($data['password'] == "") {
                            unset($data['password']);
                        } else {
                            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        }
                    }
                    $this->MitgliederModel->updateMitglied($_GET['id'], $data);
                } elseif ($action == "create") {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->MitgliederModel->createMitglied($data);
                }
            }
        }
        return redirect()->to(base_url('mitglieder/'));
    }
}