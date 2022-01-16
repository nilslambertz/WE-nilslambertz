<?php namespace App\Models;

use CodeIgniter\Model;

class ProjekteMitgliederModel extends Model
{
    public function getProjekteMitglieder()
    {
        $projekteMitglieder = $this->db->table('projekte_mitglieder');
        $projekteMitglieder->select('*');
        $result = $projekteMitglieder->get();
        return $result->getResultArray();
    }

    public function getProjekteMitgliederForProjekt($projektId) {
        $projekteMitglieder = $this->db->table('projekte_mitglieder');
        $projekteMitglieder->select('*');
        $projekteMitglieder->where('projekt', $projektId);
        $result = $projekteMitglieder->get();
        return $result->getResultArray();
    }

    public function createProjektMitglied($projektId, $mitgliedId) {
        $data['projekt'] = $projektId;
        $data['mitglied'] = $mitgliedId;

        $projekteMitglieder = $this->db->table('projekte_mitglieder');
        $projekteMitglieder->select('*');
        $projekteMitglieder->where('projekt', $projektId);
        $projekteMitglieder->where('mitglied', $mitgliedId);
        $result = $projekteMitglieder->get()->getResultArray();

        if(empty($result)) {
            $projekteMitglieder = $this->db->table('projekte_mitglieder');
            $projekteMitglieder->insert($data);
        }
    }

    public function deleteProjektMitglied($projektId, $mitgliedId) {
        $projekteMitglieder = $this->db->table('projekte_mitglieder');
        $projekteMitglieder->select('*');
        $projekteMitglieder->where('projekt', $projektId);
        $projekteMitglieder->where('mitglied', $mitgliedId);
        $result = $projekteMitglieder->get()->getResultArray();

        if(!empty($result)) {
            $projekteMitglieder->where('projekt', $projektId);
            $projekteMitglieder->where('mitglied', $mitgliedId);
            $projekteMitglieder->delete();
        }
    }
}
