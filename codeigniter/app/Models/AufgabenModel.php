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
}
