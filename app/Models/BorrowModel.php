<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'sewa';
  protected $primaryKey           = 'id_sewa';
  protected $allowedFields        = ['id_anggota', 'id_buku', 'tgl_pinjam', 'tgl_kembali', 'telat', 'keterangan', 'denda_telat', 'denda_buku', 'total_denda', 'status_buku'];

  public function getPinjam()
  {
    return $this->table('sewa')
      ->join('anggota', 'anggota.id_anggota=sewa.id_anggota')
      ->join('buku', 'buku.id_buku=sewa.id_buku')
      ->where('status_buku', 'Pinjam')
      ->get()->getResultArray();
    /* ->paginate($perPage, $page); */
  }

  public function countBook()
  {
    return $this->table('sewa')
      ->select('id')
      ->countall();
  }

  public function insertPinjam($data)
  {
    return $this->table('sewa')->insert($data);
  }
}
