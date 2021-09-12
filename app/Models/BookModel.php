<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $DBGroup              = 'default';
    /* protected $table                = 'books'; */
    protected $table                = 'buku';
    protected $primaryKey           = 'id_buku';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    protected $returnType           = 'array';
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    protected $allowedFields        = ['judul', 'kategori', 'penulis', 'penerbit', 'th_terbit'];

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

    public function getBook($id = false)
    {
        if ($id === false) {
            return $this->table('buku')->get()->getResultArray();
        } else {
            return $this->table('buku')->where('id_buku', $id)->get()->getRowArray();
        }
    }

    public function insertBook($data)
    {
        return $this->table('buku')->insert($data);
    }
}
