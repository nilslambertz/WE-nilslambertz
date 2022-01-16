<?php namespace App\Controllers;

use App\Models\ProjekteModel;
use CodeIgniter\Controller;
use App\Models\MitgliederModel;
use App\Models\ProjekteMitgliederModel;

class Mitglieder extends BaseController
{
    private $MitgliederModel;
    private $ProjekteMitgliederModel;

    public function __construct()
    {
        if (session()->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->MitgliederModel = new MitgliederModel();
        $this->ProjekteMitgliederModel = new ProjekteMitgliederModel();
    }

    public function index($showForm = false, $id = null, $delete = false)
    {
        if($id != null) {
            $data['mitglieder'] = $this->MitgliederModel->getMitglieder($id);
        } else {
            $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        }
        if(session()->get("projektId")) {
            $data['projekte_mitglieder'] = $this->ProjekteMitgliederModel->getProjekteMitgliederForProjekt(session()->get("projektId"));
        }
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

                $inProjekt = isset($_POST['inProjekt']);
                unset($data['inProjekt']);

                $mitgliedId = -1;

                if ($action == "edit" && isset($_GET['id'])) {
                    if (isset($data['password'])) {
                        if ($data['password'] == "") {
                            unset($data['password']);
                        } else {
                            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        }
                    }
                    $this->MitgliederModel->updateMitglied($_GET['id'], $data);
                    $mitgliedId = $_GET['id'];
                } elseif ($action == "create") {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $mitgliedId = $this->MitgliederModel->createMitglied($data);
                }

                if($inProjekt) {
                    if(session()->get("projektId") != null) {
                        $this->ProjekteMitgliederModel->createProjektMitglied(session()->get("projektId"), $mitgliedId);
                    }
                } else {
                    $this->ProjekteMitgliederModel->deleteProjektMitglied(session()->get("projektId"), $mitgliedId);
                }
            }
        }
        return redirect()->to(base_url('mitglieder/'));
    }
}