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

        $data['pinjam'] = $this->sewa->join('anggota', 'anggota.id_anggota = sewa.id_anggota')
            ->join('buku', 'buku.id_buku = sewa.id_buku')
            ->where('status_buku', 'Pinjam')
            ->paginate($pager, 'pager');
        $data['pager'] = $this->sewa->pager;
        $data['currentPage'] = $this->request->getVar('page_pager') ? $this->request->getVar('page_pager') : 1;

        /* $data['pinjam'] = $this->sewa->getPinjam(); */
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
