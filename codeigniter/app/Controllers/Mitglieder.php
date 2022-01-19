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
        if (isset($_POST['action'])) {
            $action = $_POST['action'];

            if ($action == "delete" && isset($_POST['id'])) {
                $this->MitgliederModel->deleteMitglied($_POST['id']);
            } else {
                $data['username'] = isset($_POST['username']) ? $_POST['username'] : "";
                $data['name'] = isset($_POST['name']) ? $_POST['name'] : "";
                $data['email'] = isset($_POST['email']) ? $_POST['email'] : "";

                $inProjekt = isset($_POST['inProjekt']);
                $mitgliedId = -1;

                if ($action == "edit" && isset($_POST['id'])) {
                    if (isset($data['password']) && $data['password'] != "") {
                        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    }
                    $data['id'] = $_POST['id'];
                    $this->MitgliederModel->updateMitglied($_POST['id'], $data);
                    $mitgliedId = $_POST['id'];
                } elseif ($action == "create") {
                    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
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