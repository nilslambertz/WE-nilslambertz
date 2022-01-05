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
}
