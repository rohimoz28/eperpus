<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function __construct()
    {
        $this->member = new MemberModel();
        helper(['form', 'url']);
        session();
    }

    public function index()
    {
        $data['members'] = $this->member->getMember();
        echo view('member/index', $data);
    }

    public function create()
    {
        $data['validation'] = \Config\Services::validation();
        return view('member/create', $data);
    }

    public function store()
    {
        $nama = $this->request->getPost('nama');
        $jkel = $this->request->getPost('jkel');
        $tgl_daftar = date('d M Y');
        $alamat = $this->request->getPost('alamat');

        $isValidated = $this->validate([
            'nama' => [
                'rules' => 'required|trim|min_length[3]|max_length[30]',
                'errors' => [
                    'required' => 'Kolom nama harus diisi',
                    'min_length' => 'Tidak boleh kurang dari 3 huruf',
                    'max_length' => 'Tidak boleh lebih dari 30 huruf'
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim|min_length[10]',
                'errors' => [
                    'required' => 'Kolom alamat harus diisi',
                    'min_length' => 'Tidak boleh kurang dari 10 huruf'
                ]
            ]
        ]);

        if (!$isValidated) {
            return redirect()->back()->withInput();
        } else {
            $data = [
                'nama' => $nama,
                'jkel' => $jkel,
                'alamat' => $alamat,
                'tgl_daftar' => $tgl_daftar
            ];

            $save = $this->member->insertData($data);

            if ($save) {
                session()->setFlashdata('success', 'ditambahkan');
                return redirect()->to(base_url('member'));
            }
        }
    }

    public function edit($id)
    {
        $data = [
            'member' => $this->member->getMember($id),
            'validation' => \Config\Services::validation()
        ];

        return view('member/edit', $data);
    }

    public function update($id)
    {
        $nama = $this->request->getPost('nama');
        $jkel = $this->request->getPost('jkel');
        $alamat = $this->request->getPost('alamat');

        $isValidated = $this->validate([
            'nama' => [
                'rules' => 'required|trim|min_length[3]|max_length[30]',
                'errors' => [
                    'required' => 'Kolom nama harus diisi',
                    'min_length' => 'Tidak boleh kurang dari 3 huruf',
                    'max_length' => 'Tidak boleh lebih dari 30 huruf'
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim|min_length[10]',
                'errors' => [
                    'required' => 'Kolom alamat harus diisi',
                    'min_length' => 'Tidak boleh kurang dari 10 huruf'
                ]
            ]
        ]);

        if (!$isValidated) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => $nama,
            'jkel' => $jkel,
            'alamat' => $alamat,
        ];

        $update = $this->member->updateData($data, $id);

        if ($update) {
            session()->setFlashdata('success', 'diubah');
            return redirect()->to(base_url('member'));
        }
    }

    public function delete($id)
    {
        $delete = $this->member->deleteData($id);

        if ($delete) {
            session()->setFlashdata('message', 'dihapus');
            return redirect()->to(base_url('member'));
        }
    }

    protected function _validation()
    {
        $input = $this->validate([
            'nama' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Kolom nama anggota wajib diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Kolom alamat wajib diisi'
                ]
            ]
        ]);
    }
}
