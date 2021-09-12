<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BorrowModel;
use App\Models\MemberModel;
use App\Models\BookModel;

class Borrow extends BaseController
{
    public function __construct()
    {
        $this->sewa = new BorrowModel();
        $this->anggota = new MemberModel();
        $this->buku = new BookModel();
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
        $id_anggota = $this->request->getPost('anggota');
        $id_buku = $this->request->getPost('buku');
        $tgl_pinjam = date('Y-M-d');

        $data = [
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => '',
            'telat' => 0,
            'keterangan' => '',
            'denda_telat' => 0,
            'denda_buku' => 0,
            'total_denda' => 0,
            'status_buku' => 'Pinjam'
        ];

        $store = $this->sewa->insertPinjam($data);

        if ($store) {
            return redirect()->to('borrow/index')->with('success', 'ditambahkan');
        }
    }
}
