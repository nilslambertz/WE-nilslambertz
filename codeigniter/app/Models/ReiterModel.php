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

    public function createReiter($data) {
        $reiter = $this->db->table('reiter');
        $reiter->insert($data);
        return $this->db->insertID();
    }

    public function updateReiter($id, $data) {
        $reiter = $this->db->table('reiter');
        $reiter->where('id', $id);
        $reiter->update($data);
    }

    public function deleteReiter($id) {
        $reiter = $this->db->table('reiter');
        $reiter->where('id', $id);
        $reiter->delete();
    }
}
