<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;

class Book extends BaseController
{
    public function __construct()
    {
        $this->book = new BookModel();
        session();
    }

    public function index()
    {
        /* $data['books'] = $this->book->getBook(); */
        $currentPage = $this->request->getVar('page_pager') ? $this->request->getVar('page_pager') : 1;

        $data = [
            'books' => $this->book->paginate(5, 'pager'),
            'pager' => $this->book->pager,
            'currentPage' => $currentPage,
        ];

        echo view('book/index', $data);
    }

    public function create()
    {
        return view('book/create');
    }

    public function store()
    {
        $judul = $this->request->getPost('judul');
        $kategori = $this->request->getPost('kategori');
        $penulis = $this->request->getPost('penulis');
        $penerbit = $this->request->getPost('penerbit');
        $th_terbit = $this->request->getPost('th_terbit');

        $isValidated = $this->validate([
            'judul' => [
                'rules' => 'required|trim|min_length[3]',
                'errors' => [
                    'required' => 'Kolom judul buku harus diisi',
                    'min_length' => 'Tidak boleh kurang dari 3 huruf'
                ]
            ],
            'penulis' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Kolom penulis harus diisi',
                ]
            ]
        ]);

        if (!$isValidated) {
            return redirect()->back()->withInput();
        } else {
            $data = [
                'judul' => $judul,
                'kategori' => $kategori,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'th_terbit' => $th_terbit
            ];

            $save = $this->book->insertBook($data);

            if ($save) {
                session()->setFlashdata('success', 'ditambahkan');
                return redirect()->to(base_url('book'));
            }
        }
    }

    public function edit($id)
    {
        // $data['book'] = $this->book->getBook($id);
        $data = [
            'book' => $this->book->getBook($id),
            'validation' => \Config\Services::validation()
        ];
        return view('book/edit', $data);
    }

    public function update($id)
    {
        $judul = $this->request->getPost('judul');
        $kategori = $this->request->getPost('kategori');
        $penulis = $this->request->getPost('penulis');
        $penerbit = $this->request->getPost('penerbit');
        $th_terbit = $this->request->getPost('th_terbit');

        $isValidated = $this->validate([
            'judul' => [
                'rules' => 'required|trim|min_length[3]',
                'errors' => [
                    'required' => 'Kolom judul buku harus diisi',
                    'min_length' => 'Tidak boleh kurang dari 3 huruf'
                ]
            ],
            'penulis' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Kolom penulis harus diisi',
                ]
            ]
        ]);

        if (!$isValidated) {
            return redirect()->back()->withInput();
        }

        $data = [
            'judul' => $judul,
            'kategori' => $kategori,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'th_terbit' => $th_terbit
        ];

        $update = $this->book->updateBook($data, $id);

        if ($update) {
            session()->setFlashdata('success', 'diubah');
            return redirect()->to(base_url('book'));
        }
    }

    public function delete($id)
    {
        $delete = $this->book->deleteBook($id);

        if ($delete) {
            return redirect()->to('book/index')->with('success', 'dihapus!');
        }
    }
}
