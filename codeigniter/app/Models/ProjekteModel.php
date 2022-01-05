<?php namespace App\Models;

use CodeIgniter\Model;

class ProjekteModel extends Model
{
    public function getProjekte($projekt_id = NULL)
    {
        $projekte = $this->db->table('projekte');
        $projekte->select('*');
        if ($projekt_id != NULL)
            $projekte->where('id', $projekt_id);
        $result = $projekte->get();
        if ($projekt_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }
}
