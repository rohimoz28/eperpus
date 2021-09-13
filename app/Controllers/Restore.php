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
        $data['sewa'] = $this->kembali->getKembali();
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
            'tgl_kembali' => $tgl_kembali,
            'telat' => $hari_telat,
            'keterangan' => $keterangan_buku,
            'denda_telat' => $denda_telat,
            'denda_buku' => $denda_buku,
            'total_denda' => $total_denda,
            'status_buku' => $status_buku
        ];

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
