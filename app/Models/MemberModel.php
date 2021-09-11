<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'anggota';
    protected $primaryKey           = 'id_anggota';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    /* protected $returnType           = 'array'; */
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    /* protected $allowedFields        = []; */

    // Dates
    /* protected $useTimestamps        = false; */
    /* protected $dateFormat           = 'datetime'; */
    /* protected $createdField         = 'created_at'; */
    /* protected $updatedField         = 'updated_at'; */
    /* protected $deletedField         = 'deleted_at'; */

    // Validation
    /* protected $validationRules      = []; */
    /* protected $validationMessages   = []; */
    /* protected $skipValidation       = false; */
    /* protected $cleanValidationRules = true; */

    // Callbacks
    /* protected $allowCallbacks       = true; */
    /* protected $beforeInsert         = []; */
    /* protected $afterInsert          = []; */
    /* protected $beforeUpdate         = []; */
    /* protected $afterUpdate          = []; */
    /* protected $beforeFind           = []; */
    /* protected $afterFind            = []; */
    /* protected $beforeDelete         = []; */
    /* protected $afterDelete          = []; */

    public function getMember($id = false)
    {
        if ($id == false) {
            return $this->table('anggota')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('anggota')
                ->get()
                ->getRowArray();
        }
    }

    public function insertData($data)
    {
        return $this->db->table('anggota')->insert($data);
    }
}
