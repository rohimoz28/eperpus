<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookFineModel;

class Bookfine extends BaseController
{
    public function __construct()
    {
        $this->bookfines = new BookFineModel();
    }

    public function index()
    {
        $data['bookfines'] = $this->bookfines->findAll();
        return view('late/bookfine/index', $data);
    }

    public function create()
    {
        return view('late/bookfine/create');
    }

    public function store()
    {
        $deskripsi = $this->request->getVar('deskripsi');
        $denda = $this->request->getVar('denda');

        $data = [
            'description' => $deskripsi,
            'book_fine' => $denda
        ];

        /* dd($data); */

        $save = $this->bookfines->insert($data);

        if ($save) {
            return redirect()->to('bookfine')->with('success', 'ditambahkan');
        }
    }

    protected function _validation()
    {
    }
}
