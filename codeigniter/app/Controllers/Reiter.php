<?php namespace App\Controllers;
use App\Models\ReiterModel;
use CodeIgniter\Controller;

class Reiter extends BaseController {
    private $ReiterModel;

    public function __construct() {
        $this->ReiterModel = new ReiterModel();
    }

    public function index($showForm = false, $id = null, $delete = false) {
        if($id != null) {
            $data['reiter'] = $this->ReiterModel->getReiter($id);
        } else {
            $data['reiter'] = $this->ReiterModel->getReiter();
        }
        $data['showForm'] = $showForm;
        $data['id'] = $id;
        $data['delete'] = $delete;

        echo view('templates/header');
        echo view('reiter', $data);
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
                $this->ReiterModel->deleteReiter($_POST['id']);
            } else {
                $data['name'] = isset($_POST['name']) ? $_POST['name'] : "";
                $data['beschreibung'] = isset($_POST['beschreibung']) ? $_POST['beschreibung'] : "";

                if ($action == "edit" && isset($_POST['id'])) {
                    $data['id'] = $_POST['id'];
                    $this->ReiterModel->updateReiter($_POST['id'], $data);
                } elseif ($action == "create") {
                    $this->ReiterModel->createReiter($data);
                }
            }
        }
        return redirect()->to(base_url('reiter/'));
    }
}