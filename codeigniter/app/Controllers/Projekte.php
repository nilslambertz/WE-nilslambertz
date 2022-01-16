<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProjekteModel;

class Projekte extends BaseController {
    private $ProjekteModel;

    public function __construct() {
        if(session()->get('loggedIn') == NULL) {
            header('Location: ' . base_url() . '/login');
            exit();
        }

        $this->ProjekteModel = new ProjekteModel();
    }

    public function index($showForm = false, $id = null, $delete = false) {
        if($id != null) {
            $data['projekte'] = $this->ProjekteModel->getProjekte($id);
        } else {
            $data['projekte'] = $this->ProjekteModel->getProjekte();
        }
        $data['showForm'] = $showForm;
        $data['id'] = $id;
        $data['delete'] = $delete;

        echo view('templates/header');
        echo view('projekte', $data);
        echo view('templates/footer');
    }

    public function action() {
        if(isset($_POST['action']) && isset($_POST['projekt'])) {
            if($_POST['action'] == "select") {
                if($_POST['projekt'] != "-1") {
                    $projekt = $this->ProjekteModel->getProjekte($_POST['projekt']);
                    if(!empty($projekt) && isset($projekt['name'])) {
                        session()->set('projektId', $_POST['projekt']);
                        session()->set('projektName', $projekt['name']);
                    }
                } else {
                    session()->remove('projektId');
                    session()->remove('projektName');
                }
            } elseif ($_POST['action'] == "edit" && $_POST['projekt'] != "-1") {
                return redirect()->to(base_url('projekte/edit/' . $_POST['projekt']));
            } elseif($_POST['action'] == "delete" && $_POST['projekt'] != "-1") {
                return redirect()->to(base_url('projekte/delete/' . $_POST['projekt']));
            }
        }
        return redirect()->to(base_url('projekte/'));
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
                $this->ProjekteModel->deleteProjekt($_POST['id']);
                if($this->session->get('projektId') != null && $this->session->get('projektId') == $_POST['id']) {
                    session()->remove('projektId');
                    session()->remove('projektName');
                }
            } else {
                $data['name'] = isset($_POST['name']) ? $_POST['name'] : "";
                $data['beschreibung'] = isset($_POST['beschreibung']) ? $_POST['beschreibung'] : "";
                $data['ersteller'] = isset($_POST['ersteller']) ? $_POST['ersteller'] : "";

                if ($action == "edit" && isset($_POST['id'])) {
                    $data['id'] = $_POST['id'];
                    $this->ProjekteModel->updateProjekt($_POST['id'], $data);
                } elseif ($action == "create") {
                    $data['ersteller'] = session()->get("userId") != null ? session()->get("userId") : "";
                    $this->ProjekteModel->createProjekt($data);
                }
            }
        }
        return redirect()->to(base_url('projekte/'));
    }
}