<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RentModel;

class Restore extends BaseController
{
    public function __construct()
    {
        $this->kembali = new RentModel();
    }

    public function index()
    {
        $pager = 5;
        $data['sewa'] = $this->kembali->join('members', 'members.member_id = rents.member_id')
            ->join('books', 'books.book_id = rents.book_id')
            ->where('book_status', 'Kembali')
            ->paginate($pager, 'pager');

        /* $data['sewa'] = $this->kembali->getKembali()->paginate(5, 'pager'); */
        $data['pager'] = $this->kembali->pager;
        $data['currentPage'] = $this->request->getVar('page_pager') ? $this->request->getVar('page_pager') : 1;

        return view('restore/index', $data);
    }

    public function edit($id)
    {
        $data['restore'] = $this->kembali->editKembali($id);
        return view('restore/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_sewa');
        $tgl_pinjam = $this->request->getPost('tgl_pinjam');
        // Hitung Hari Telat
        $tgl_kembali = date('Y-M-d');
        $hitung_telat = abs(strtotime($tgl_kembali) - strtotime($tgl_pinjam));
        $hari_telat = floor($hitung_telat / (60 * 60 * 24));
        // Hitung Denda Hari Telat
        $denda_telat = 1000 * $hari_telat;
        // dd($tgl_pinjam);
        // Hitung Denda Buku
        $keterangan_buku = $this->request->getPost('keterangan_buku');
        switch ($keterangan_buku) {
            case 'Rusak':
                $denda_buku = 10000;
                break;

            case 'Hilang':
                $denda_buku = 50000;
                break;

            default:
                $denda_buku = 30000;
                break;
        }
        // Hitung Total Denda Buku
        $total_denda = $denda_telat + $denda_buku;

        $status_buku = 'Kembali';

        $data = [
            'date_return' => $tgl_kembali,
            'late' => $hari_telat,
            'description' => $keterangan_buku,
            'late_fine' => $denda_telat,
            'book_fine' => $denda_buku,
            'sum_fine' => $total_denda,
            'book_status' => $status_buku
        ];

        // dd($data);

        $update = $this->kembali->updateKembali($data, $id);

        if ($update) {
            return redirect()->to('restore/index')->with('success', 'dikembalikan');
        }
    }

    public function showDetail($id)
    {
        $data['detail'] = $this->kembali->getKembali($id);
        return view('restore/show-detail', $data);
    }
}
