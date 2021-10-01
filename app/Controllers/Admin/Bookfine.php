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
}
