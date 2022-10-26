<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LatefineModel;

class Latefine extends BaseController
{
    public function __construct()
    {
        $this->latefine = new LatefineModel();
    }

    public function index()
    {
        $data['latefine'] = $this->latefine->findAll();
        return view('master/latefine/index', $data);
    }

    public function edit()
    {
        /* $data['latefine'] = $this->latefine->first(); */
        $data = [
            'latefine' => $this->latefine->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('master/latefine/edit', $data);
    }

    public function update($id)
    {
        $sewa = $this->request->getVar('sewa');
        $telat = $this->request->getVar('telat');
        $denda = $this->request->getVar('denda');

        if (!$this->validate([
            'sewa' => [
                'rules' => 'required|integer|max_length[2]',
                'errors' => [
                    'required' => 'Kolom lama sewa harus diisi!',
                    'integer' => 'Harus berupa angka!',
                    'max_length' => 'Tidak boleh lebih dari 2 angka!'
                ]
            ],
            'denda' => [
                'rules' => 'required|integer|min_length[4]',
                'errors' => [
                    'required' => 'Kolom lama sewa harus diisi!',
                    'integer' => 'Harus berupa angka!',
                    'min_length' => 'Denda harus di atas > Rp.1000'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('latefine/edit')->withInput()->with('validation', $validation);
        } else {
            $this->latefine->save([
                'late_fine_id' => $id,
                'rent_day' => $sewa,
                'late_fine' => $denda
            ]);

            return redirect()->to('latefine')->with('success', 'diubah');
        }
    }
}
