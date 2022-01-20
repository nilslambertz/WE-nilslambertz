<?php namespace App\Controllers;
use App\Models\AufgabenModel;
use App\Models\ReiterModel;
use App\Models\MitgliederModel;
use App\Models\AufgabenMitgliederModel;
use CodeIgniter\Controller;

class Aufgaben extends BaseController {
    private $AufgabenModel;
    private $ReiterModel;
    private $MitgliederModel;
    private $AufgabenMitgliederModel;

    public function __construct() {
        $this->AufgabenModel = new AufgabenModel();
        $this->ReiterModel = new ReiterModel();
        $this->MitgliederModel = new MitgliederModel();
        $this->AufgabenMitgliederModel = new AufgabenMitgliederModel();
    }

    public function index($showForm = false, $id = null, $delete = false) {
        $data['showForm'] = $showForm;
        $data['id'] = $id;
        $data['delete'] = $delete;

        if(session()->get("projektId") != null) {
            $data['aufgaben'] = $this->AufgabenModel->getAufgabenAndMitgliederAndReiter($id, session()->get("projektId"));
        } else {
            $data['aufgaben'] = $this->AufgabenModel->getAufgabenAndMitgliederAndReiter();
        }
        $data['mitglieder'] = $this->MitgliederModel->getMitglieder();
        $data['reiter'] = $this->ReiterModel->getReiter();

        if($id) $data['zustaendigeMitglieder'] = $this->AufgabenMitgliederModel->getMitgliederForAufgabe($id);

        echo view('templates/header');
        echo view('aufgaben', $data);
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
                $this->AufgabenModel->deleteAufgabe($_POST['id']);
            } else {
                $data['name'] = isset($_POST['name']) ? $_POST['name'] : "";
                $data['beschreibung'] = isset($_POST['beschreibung']) ? $_POST['beschreibung'] : "";
                $data['faelligkeitsdatum'] = isset($_POST['faelligkeitsdatum']) ? $_POST['faelligkeitsdatum'] : "";
                $data['reiter'] = isset($_POST['reiter']) ? $_POST['reiter'] : "";

                if ($action == "edit" && isset($_POST['id'])) {
                    $data['id'] = $_POST['id'];
                    $this->AufgabenModel->updateAufgabe($_POST['id'], $data);

                    $oldMitglieder = $this->AufgabenMitgliederModel->getMitgliederForAufgabe($_POST['id']);
                    $newMitglieder = isset($_POST['mitglieder']) ? $_POST['mitglieder'] : [];

                    $removedMitglieder = array_diff($oldMitglieder, $newMitglieder);
                    $addedMitglieder = array_diff($newMitglieder, $oldMitglieder);

                    foreach($removedMitglieder as $r) {
                        $this->AufgabenMitgliederModel->deleteAufgabeMitglied($_POST['id'], $r);
                    }
                    foreach($addedMitglieder as $a) {
                        $this->AufgabenMitgliederModel->createAufgabeMitglied($_POST['id'], $a);
                    }
                } elseif ($action == "create") {
                    $data['ersteller'] = session()->get("userId") != null ? session()->get("userId") : "";
                    $data['projekt'] = session()->get("projektId") != null ? session()->get("projektId") : "";
                    $data['erstellungsdatum'] = date("Y-m-d H:i");
                    $this->AufgabenModel->createAufgabe($data);
                }
            }
        }
        return redirect()->to(base_url('aufgaben/'));
    }
}