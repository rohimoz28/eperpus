<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookFineModel;

class Bookfine extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
        $this->bookfines = new BookFineModel();
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['bookfines'] = $this->bookfines->findAll();
        return view('late/bookfine/index', $data);
    }

    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('late/bookfine/create', $data);
    }

    public function store()
    {
        $deskripsi = $this->request->getVar('deskripsi');
        $denda = $this->request->getVar('denda');

        $data = [
            'description' => $deskripsi,
            'book_fine' => $denda
        ];

        // Cek Validasi
        if (!$this->validate([
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom deskripsi harus diisi!'
                ]
            ],
            'denda' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Kolom denda buku harus diisi!',
                    'integer' => 'Harus berupa angka!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('bookfine/create')->withInput()->with('validation', $validation);
        } else {
            $save = $this->bookfines->insert($data);

            if ($save) {
                return redirect()->to('bookfine')->with('success', 'ditambahkan');
            }
        }
    }

    public function edit($id)
    {
        /* $data['bookfine'] = $this->bookfines->getWhere('book_fine_id', $id); */
        $data = [
            'bookfine' => $this->bookfines->Where('book_fine_id', $id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('late/bookfine/edit', $data);
    }

    public function update($id)
    {
        $deskripsi = $this->request->getVar('deskripsi');
        $denda = $this->request->getVar('denda');

        // Cek Validasi
        if (!$this->validate([
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom deskripsi harus diisi!'
                ]
            ],
            'denda' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Kolom denda buku harus diisi!',
                    'integer' => 'Harus berupa angka!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('bookfine/edit/' . $id)->withInput()->with('validation', $validation);
        } else {
            $this->bookfines->save([
                'book_fine_id' => $id,
                'description' => $deskripsi,
                'book_fine' => $denda
            ]);

            return redirect()->to('bookfine')->with('success', 'diubah!');
        }
    }

    public function delete($id)
    {
        $remove = $this->bookfines->delete(['book_fine_id' => $id]);

        if ($remove) {
            return redirect()->to('bookfine')->with('success', 'dihapus');
        }
    }
}
