<?php namespace App\Models;

use CodeIgniter\Model;

class ReiterModel extends Model
{
    public function getReiter($reiter_id = NULL)
    {
        $reiter = $this->db->table('reiter');
        $reiter->select('*');
        if ($reiter_id != NULL)
            $reiter->where('id', $reiter_id);
        $result = $reiter->get();
        if ($reiter_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }
}
