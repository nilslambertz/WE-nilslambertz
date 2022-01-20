<?php namespace App\Models;

use CodeIgniter\Model;

class AufgabenMitgliederModel extends Model
{
    public function getAufgabenMitglieder()
    {
        $aufgabenMitglieder = $this->db->table('aufgaben_mitglieder');
        $aufgabenMitglieder->select('*');
        $result = $aufgabenMitglieder->get();
        return $result->getResultArray();
    }

    public function getMitgliederForAufgabe($aufgabeId) {
        $aufgabenMitglieder = $this->db->table('aufgaben_mitglieder');
        $aufgabenMitglieder->select('mitglied');
        $aufgabenMitglieder->where('aufgabe', $aufgabeId);
        $result = $aufgabenMitglieder->get();
        $query = $result->getResultArray();

        $array = array();

        foreach ( $query as $key => $val )
        {
            $temp = array_values($val);
            $array[] = $temp[0];
        }
        return $array;
    }

    public function createAufgabeMitglied($aufgabeId, $mitgliedId) {
        $data['aufgabe'] = $aufgabeId;
        $data['mitglied'] = $mitgliedId;

        $aufgabenMitglieder = $this->db->table('aufgaben_mitglieder');
        $aufgabenMitglieder->select('*');
        $aufgabenMitglieder->where('aufgabe', $aufgabeId);
        $aufgabenMitglieder->where('mitglied', $mitgliedId);
        $result = $aufgabenMitglieder->get()->getResultArray();

        if(empty($result)) {
            $aufgabenMitglieder = $this->db->table('aufgaben_mitglieder');
            $aufgabenMitglieder->insert($data);
        }
    }

    public function deleteAufgabeMitglied($aufgabeId, $mitgliedId) {
        $aufgabenMitglieder = $this->db->table('aufgaben_mitglieder');
        $aufgabenMitglieder->select('*');
        $aufgabenMitglieder->where('aufgabe', $aufgabeId);
        $aufgabenMitglieder->where('mitglied', $mitgliedId);
        $result = $aufgabenMitglieder->get()->getResultArray();

        if(!empty($result)) {
            $aufgabenMitglieder->where('aufgabe', $aufgabeId);
            $aufgabenMitglieder->where('mitglied', $mitgliedId);
            $aufgabenMitglieder->delete();
        }
    }
}
