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
        /* dd($data); */
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
        $id_anggota = $this->request->getPost('anggota');
        $id_buku = $this->request->getPost('buku');
        $tgl_pinjam = date('Y-M-d');

        $data = [
            'member_id' => $id_anggota,
            'book_id' => $id_buku,
            'date_borrow' => $tgl_pinjam,
            'date_return' => '',
            'late' => 0,
            'description' => '',
            'late_fine' => 0,
            'late_book' => 0,
            'sum_fine' => 0,
            'book_status' => 'Pinjam'
        ];
        // dd($data);
        $store = $this->sewa->insertPinjam($data);
        // $store = $this->sewa->insert($data);

        if ($store) {
            return redirect()->to('borrow/index')->with('success', 'ditambahkan');
        }
    }
}
