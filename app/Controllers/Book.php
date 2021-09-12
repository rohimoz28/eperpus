<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;

class Book extends BaseController
{
    public function __construct()
    {
        $this->book = new BookModel();
    }

    public function index()
    {
        $data['books'] = $this->book->getBook();
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

        $data = [
            'judul' => $judul,
            'kategori' => $kategori,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'th_terbit' => $th_terbit
        ];

        $save = $this->book->insertBook($data);

        if ($save) {
            return redirect()->back()->with('success', 'ditambahkan!');
        }
    }

    public function edit($id)
    {
        $data['book'] = $this->book->getBook($id);
        return view('book/edit', $data);
    }

    public function update($id)
    {
        $judul = $this->request->getPost('judul');
        $kategori = $this->request->getPost('kategori');
        $penulis = $this->request->getPost('penulis');
        $penerbit = $this->request->getPost('penerbit');
        $th_terbit = $this->request->getPost('th_terbit');

        $data = [
            'judul' => $judul,
            'kategori' => $kategori,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'th_terbit' => $th_terbit
        ];

        $update = $this->book->updateBook($data, $id);

        if ($update) {
            return redirect()->to('book/index')->with('success', 'diubah!');
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
