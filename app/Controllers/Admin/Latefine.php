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
        return view('late/latefine/index', $data);
    }

    public function edit()
    {
        $data['latefine'] = $this->latefine->first();
        return view('late/latefine/edit', $data);
    }

    public function update($id)
    {
        $telat = $this->request->getVar('telat');
        $denda = $this->request->getVar('denda');

        $data = [
            'late_fine_id' => $id,
            'late_day' => $telat,
            'late_fine' => $denda
        ];

        $this->latefine->replace($data);

        return redirect()->to('latefine')->with('success', 'diubah');
    }
}
