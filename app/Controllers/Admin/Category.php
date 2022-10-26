<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use CodeIgniter\I18n\Time;

class Category extends BaseController
{
  public function __construct()
  {
    if (!session()->get('logged_in')) {
      return redirect()->to(base_url('auth/login'));
    }

    $this->categories = new CategoryModel();
  }

  public function index()
  {
    $data['categories'] = $this->categories->findAll();
    return view('master/category/index', $data);
  }

  public function create()
  {
    return view('master/category/create');
  }

  public function store()
  {
    $nama_kategori = $this->request->getPost('nama_kategori');

    $data = [
      'category_name' => $nama_kategori,
      'created_at' => Time::now()
    ];

    $save = $this->categories->insert($data);

    if ($save) {
      return redirect()->to('category')->with('success', 'ditambahkan');
    }
  }

  public function edit($id)
  {
    $data['category'] = $this->categories->where('category_id', $id)->first();

    return view('master/category/edit', $data);
  }

  public function update($id)
  {
    $nama = $this->request->getPost('kategori');

    $data = [
      'category_id' => $id,
      'category_name' => $nama,
    ];

    $update = $this->categories->replace($data);

    if ($update) {
      return redirect()->to('category')->with('success', 'diubah');
    }
  }

  public function delete($id)
  {
    $this->categories->delete(['category_id' => $id]);
    return redirect()->to('category')->with('success', 'dihapus');
  }
}
