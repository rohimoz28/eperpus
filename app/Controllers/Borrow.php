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
    $pager = 5;

    $data['pinjam'] = $this->sewa->join('members', 'members.member_id = rents.member_id')
      ->join('books', 'books.book_id = rents.book_id')
      ->where('book_status', 'Pinjam')
      ->paginate($pager, 'pager');

    $data['pager'] = $this->sewa->pager;
    $data['currentPage'] = $this->request->getVar('page_pager') ? $this->request->getVar('page_pager') : 1;

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
    $id_buku = $this->request->getPost('buku');
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

  public function searchMember()
  {
    helper(['form', 'url']);

    $records = [];

    $database = \Config\Database::connect();
    $sql = $database->table('members');

    $sqlQuery = $sql->like('name', $this->request->getVar('term'))
      ->select('member_id as id, name as text')
      ->limit(5)->get();

    $records = $sqlQuery->getResult();
    echo json_encode($records);
  }
}
