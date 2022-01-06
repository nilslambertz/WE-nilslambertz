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
}
