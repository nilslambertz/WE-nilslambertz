<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenModel extends Model
{
    public function getAufgaben($aufgabe_id = NULL)
    {
        $aufgaben = $this->db->table('aufgaben');
        $aufgaben->select('*');
        if ($aufgabe_id != NULL)
            $aufgaben->where('id', $aufgabe_id);
        $result = $aufgaben->get();
        if ($aufgabe_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getAufgabenAndMitgliederAndReiter($aufgabe_id = NULL, $projekt_id = NULL) {
        $aufgaben = $this->db->table('aufgaben');
        $aufgaben->select('aufgaben.*, reiter.name as reiterName, group_concat(mitglieder.name separator ", ") as mitglieder');
        $aufgaben->join('aufgaben_mitglieder', 'aufgaben_mitglieder.aufgabe = aufgaben.id', 'left');
        $aufgaben->join('mitglieder', 'aufgaben_mitglieder.mitglied = mitglieder.id', 'left');
        $aufgaben->join('reiter', 'aufgaben.reiter = reiter.id', 'left');

        if ($aufgabe_id != NULL)
            $aufgaben->where('aufgaben.id', $aufgabe_id);

        if ($projekt_id != NULL)
            $aufgaben->where('projekt', $projekt_id);

        $aufgaben->groupBy('aufgaben.id');

        $result = $aufgaben->get();
        if ($aufgabe_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getAufgabenByProjekt($projektId) {
        $aufgaben = $this->db->table('aufgaben');
        $aufgaben->select('*');
        $aufgaben->where('projekt', $projektId);
        $result = $aufgaben->get();
        return $result->getResultArray();
    }

    public function createAufgabe($data) {
        $aufgaben = $this->db->table('aufgaben');
        $aufgaben->insert($data);
        return $this->db->insertID();
    }

    public function updateAufgabe($id, $data) {
        $aufgaben = $this->db->table('aufgaben');
        $aufgaben->where('id', $id);
        $aufgaben->update($data);
    }

    public function deleteAufgabe($id) {
        $aufgaben = $this->db->table('aufgaben');
        $aufgaben->where('id', $id);
        $aufgaben->delete();
    }
}
