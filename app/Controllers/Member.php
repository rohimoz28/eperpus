<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
/* use PhpOffice\PhpSpreadsheet\Reader\Xls; */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    $data['members'] = $this->member->findAll();
    echo view('member/index', $data);
  }

  public function create()
  {
    $data['validation'] = \Config\Services::validation();
    return view('member/create', $data);
  }

  public function detail($id)
  {
    $data['detail'] = $this->member->where('member_id', $id)->first();
    return view('member/detail', $data);
  }

  public function store()
  {
    $nama = $this->request->getPost('nama');
    $jkel = $this->request->getPost('jkel');
    // $tgl_daftar = date('d M Y');
    $alamat = $this->request->getPost('alamat');
    $no_telp = $this->request->getPost('no_telp');
    $email = $this->request->getPost('email');

    $isValidated = $this->validate([
      'nama' => [
        'rules' => 'required|trim|min_length[3]|max_length[30]',
        'errors' => [
          'required' => 'Nama harus diisi',
          'min_length' => 'Tidak boleh kurang dari 3 huruf',
          'max_length' => 'Tidak boleh lebih dari 30 huruf'
        ]
      ],
      'alamat' => [
        'rules' => 'required|trim|min_length[10]',
        'errors' => [
          'required' => 'Alamat harus diisi',
          'min_length' => 'Tidak boleh kurang dari 10 huruf'
        ]
      ],
      'no_telp' => [
        'rules' => 'required|trim',
        'errors' => [
          'required' => 'Nomer Telepon harus diisi',
        ]
      ],
      'email' => [
        'rules' => 'required|trim|valid_email',
        'errors' => [
          'required' => 'Email harus diisi',
          'valid_email' => 'Alamat email tidak valid'
        ]
      ]
    ]);

    if (!$isValidated) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'name' => $nama,
        'gender' => $jkel,
        'address' => $alamat,
        'number' => $no_telp,
        'email' => $email,
        // 'tgl_daftar' => $tgl_daftar
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
    $no_telp = $this->request->getPost('no_telp');
    $email = $this->request->getPost('email');

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
      ],
      'no_telp' => [
        'rules' => 'required|trim',
        'errors' => [
          'required' => 'Nomer Telepon harus diisi',
        ]
      ],
      'email' => [
        'rules' => 'required|trim|valid_email',
        'errors' => [
          'required' => 'Email harus diisi',
          'valid_email' => 'Alamat email tidak valid'
        ]
      ]
    ]);

    if (!$isValidated) {
      return redirect()->back()->withInput();
    }

    $data = [
      'name' => $nama,
      'gender' => $jkel,
      'address' => $alamat,
      'number' => $no_telp,
      'email' => $email,
      // 'tgl_daftar' => $tgl_daftar
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

  public function export()
  {
    /* $members = new MemberModel(); */
    $members = $this->member->findAll();
    $spreadsheet = new Spreadsheet();
    // Tulis header/nama kolom
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'Nama Anggota')
      ->setCellValue('B1', 'Jenis Kelamin')
      ->setCellValue('C1', 'Alamat')
      ->setCellValue('D1', 'Bergabung');
    $column = 2;
    // Tulis data member ke cell
    foreach ($members as $member) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $member['name'])
        ->setCellValue('B' . $column, $member['gender'])
        ->setCellValue('C' . $column, $member['address'])
        ->setCellValue('D' . $column, $member['created_at']);
      $column++;
    }

    // Tulis dalam format .xls
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Anggota';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
