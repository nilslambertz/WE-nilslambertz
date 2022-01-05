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
}
