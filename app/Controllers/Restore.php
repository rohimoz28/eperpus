<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RentModel;
use App\Models\BookFineModel;
use App\Models\LatefineModel;

class Restore extends BaseController
{
    public function __construct()
    {
        $this->dendaBuku = new BookFineModel();
        $this->kembali = new RentModel();
        $this->dendaTelat = new LatefineModel();
    }

    public function index()
    {
        $pager = 5;
        $data['sewa'] = $this->kembali->join('members', 'members.member_id = rents.member_id')
            ->join('books', 'books.book_id = rents.book_id')
            ->join('book_fines', 'book_fines.book_fine_id  = rents.book_fine_id')
            ->where('book_status', 'Kembali')
            ->orderBy('date_return', 'ASC')
            ->paginate($pager, 'pager');
        /* dd($data); */

        /* $data['sewa'] = $this->kembali->getKembali()->paginate(5, 'pager'); */
        $data['pager'] = $this->kembali->pager;
        $data['currentPage'] = $this->request->getVar('page_pager') ? $this->request->getVar('page_pager') : 1;

        return view('restore/index', $data);
    }

    public function edit($id)
    {
        $data = [
            'bookfines' => $this->dendaBuku->findAll(),
            'restore' => $this->kembali->editKembali($id)
        ];

        return view('restore/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_sewa');
        $keterangan_buku = $this->request->getVar('keterangan_buku');
        $tgl_pinjam = $this->request->getPost('tgl_pinjam');
        $tgl_kembali = date('Y-M-d');
        $hitung_telat = abs(strtotime($tgl_kembali) - strtotime($tgl_pinjam));
        $hari_telat = floor($hitung_telat / (60 * 60 * 24));

        // Hitung Denda Hari Telat
        $sewa = $this->dendaTelat->select('rent_day')->where('late_fine_id', 1)->first();
        $sewa_int = (int)$sewa['rent_day'];

        if ($hari_telat > $sewa_int) {
            $telat = $hari_telat - $sewa_int;
            $denda_telat = 1000 * $telat;
        } else {
            $telat = 0;
            $denda_telat = 0;
        }

        // Hitung Denda Buku
        $denda_buku = $this->dendaBuku->select('book_fine')->where('book_fine_id', $keterangan_buku)->first();
        // Ubah tipe data array menjadi integer
        $denda_buku_int = (int)$denda_buku['book_fine'];
        /* dd($denda_buku_int); */


        // Hitung Total Denda
        $total_denda = $denda_telat + $denda_buku_int;

        $status_buku = 'Kembali';

        $data = [
            'date_return' => $tgl_kembali,
            'late' => $hari_telat,
            'book_fine_id' => $keterangan_buku,
            /* 'description' => $keterangan_buku, */
            'late_fine' => $denda_telat,
            /* 'book_fine' => $denda_buku, */
            'sum_fine' => $total_denda,
            'book_status' => $status_buku
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

    public function generatePdf()
    {
        $dompdf = new \Dompdf\Dompdf();

        $data['sewa'] = $this->kembali->join('members', 'members.member_id = rents.member_id')
            ->join('books', 'books.book_id = rents.book_id')
            ->join('book_fines', 'book_fines.book_fine_id=rents.book_fine_id')
            ->where('book_status', 'Kembali')
            ->findAll();
        // Sending data to view file
        $dompdf->loadHtml(view('restore/template-pdf', $data));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream();
        // to give pdf file name
        // $dompdf->stream("myfile");

        return redirect()->to(base_url('restore'));
    }
}
