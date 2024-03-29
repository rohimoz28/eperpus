<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\RentModel;
use App\Models\MemberModel;
use App\Models\BookModel;

class Borrow extends BaseController
{
  public function __construct()
  {
    $this->sewa = new RentModel();
    $this->anggota = new MemberModel();
    $this->buku = new BookModel();
    helper(['form', 'url']);
  }

  public function index()
  {
    $data['pinjam'] = $this->sewa->getPinjam();
    return view('borrow/index', $data);
  }

  public function create()
  {
    $data['members'] = $this->anggota->getMember();
    $data['books'] = $this->buku->getBook();
    return view('borrow/create', $data);
  }

  public function store()
  {
    $id_anggota =  $this->request->getPost('id_anggota');
    $id_buku = $this->request->getPost('id_buku');
    $tgl_pinjam = date('Y-M-d');

    $data = [
      'member_id' => (int)$id_anggota,
      'book_id' => (int)$id_buku,
      'date_borrow' => $tgl_pinjam,
      'date_return' => '',
      'late' => 0,
      'late_fine' => 0,
      'book_fine_id' => 0,
      'sum_fine' => 0,
      'book_status' => 'Pinjam'
    ];
    // dd($data);

    $store = $this->sewa->insertPinjam($data);
    if ($store) {
      session()->setFlashdata('success', 'ditambahkan');
      return redirect()->to(base_url('borrow'));
    }
  }
}
