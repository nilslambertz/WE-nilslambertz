<?php namespace App\Models;

use CodeIgniter\Model;

class MitgliederModel extends Model
{
    public function getMitglieder($mitglied_id = NULL)
    {
        $mitglieder = $this->db->table('mitglieder');
        $mitglieder->select('*');
        if ($mitglied_id != NULL)
            $mitglieder->where('id', $mitglied_id);
        $result = $mitglieder->get();
        if ($mitglied_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function login($username) {
        $mitglieder = $this->db->table('mitglieder');
        $mitglieder->select('*');
        $mitglieder->where('mitglieder.username', $username);

        return $mitglieder->get()->getRowArray();
    }

    public function createMitglied($data) {
        $mitglieder = $this->db->table('mitglieder');
        $mitglieder->insert($data);
        return $this->db->insertID();
    }

    public function updateMitglied($id, $data) {
        $mitglieder = $this->db->table('mitglieder');
        $mitglieder->where('id', $id);
        $mitglieder->update($data);
    }

    public function deleteMitglied($id) {
        $mitglieder = $this->db->table('mitglieder');
        $mitglieder->where('id', $id);
        $mitglieder->delete();
    }
}
