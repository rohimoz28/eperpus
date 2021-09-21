<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'members';
    protected $primaryKey           = 'member_id';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    /* protected $returnType           = 'array'; */
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    protected $allowedFields        = ['name', 'gender', 'address', 'created_at', 'updated_at'];

    public function getMember($id = false)
    {
        if ($id === false) {
            return $this->table('members')
                ->orderBy('name', 'asc')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('members')
                ->where('member_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function insertData($data)
    {
        return $this->db->table('members')->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->db->table('members')->update($data, ['member_id' => $id]);
    }

    public function deleteData($id)
    {
        return $this->db->table('members')->delete(['member_id' => $id]);
    }
}
