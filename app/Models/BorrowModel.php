<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'sewa';
    protected $primaryKey           = 'id_sewa';
    /* protected $useAutoIncrement     = true; */
    /* protected $insertID             = 0; */
    /* protected $returnType           = 'array'; */
    /* protected $useSoftDeletes       = false; */
    /* protected $protectFields        = true; */
    protected $allowedFields        = ['id_anggota', 'id_buku', 'tgl_pinjam', 'tgl_kembali', 'telat', 'keterangan', 'denda_telat', 'denda_buku', 'total_denda', 'status_buku'];

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

    public function getPinjam()
    {
        return $this->table('sewa')
            ->join('anggota', 'anggota.id_anggota=sewa.id_anggota')
            ->join('buku', 'buku.id_buku=sewa.id_buku')
            ->where('status_buku', 'Pinjam')
            ->get()->getResultArray();
        /* ->paginate($perPage, $page); */
    }

    public function insertPinjam($data)
    {
        return $this->table('sewa')->insert($data);
    }
}
