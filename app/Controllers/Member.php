<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function __construct()
    {
        $this->member = new MemberModel();
    }

    public function index()
    {
        $data['members'] = $this->member->getMember();
        echo view('member/index', $data);
    }

    public function create()
    {
        return view('member/create');
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        $jkel = $this->request->getPost('jkel');
        $tgl_daftar = date('d M Y');
        $alamat = $this->request->getPost('alamat');

        $data = [
            'nama' => $nama,
            'jkel' => $jkel,
            'alamat' => $alamat,
            'tgl_daftar' => $tgl_daftar
        ];

        $save = $this->member->insertData($data);

        if ($save) {
            session()->setFlashdata('message', 'ditambahkan');
            return redirect()->to(base_url('member'));
        }
    }

    public function edit($id)
    {
        $data['member'] = $this->member->getMember($id);
        return view('member/edit', $data);
    }

    public function update($id)
    {
        $nama = $this->request->getPost('nama');
        $jkel = $this->request->getPost('jkel');
        $alamat = $this->request->getPost('alamat');

        $data = [
            'nama' => $nama,
            'jkel' => $jkel,
            'alamat' => $alamat,
        ];

        $update = $this->member->updateData($data, $id);

        if ($update) {
            session()->setFlashdata('message', 'diubah');
            return redirect()->to(base_url('member'));
        }
    }
}
