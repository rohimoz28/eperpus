<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
/* use PhpOffice\PhpSpreadsheet\Reader\Xls; */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Book extends BaseController
{
  public function __construct()
  {
    $this->book = new BookModel();
    session();
  }

  public function index()
  {
    $data['books'] = $this->book->findAll();
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
        'book_title' => $judul,
        'book_category' => $kategori,
        'book_writer' => $penulis,
        'book_publisher' => $penerbit,
        'book_date_publish' => $th_terbit
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
      'book_title' => $judul,
      'book_category' => $kategori,
      'book_writer' => $penulis,
      'book_publisher' => $penerbit,
      'book_date_publish' => $th_terbit
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

  public function export()
  {
    /* $members = new MemberModel(); */
    $members = $this->book->findAll();
    $spreadsheet = new Spreadsheet();
    // Tulis header/nama kolom
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'Judul Buku')
      ->setCellValue('B1', 'Kategori')
      ->setCellValue('C1', 'Penulis')
      ->setCellValue('D1', 'Penerbit')
      ->setCellValue('E1', 'Tanggal Terbit');
    $column = 2;
    // Tulis data member ke cell
    foreach ($members as $member) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $member['book_title'])
        ->setCellValue('B' . $column, $member['book_category'])
        ->setCellValue('C' . $column, $member['book_writer'])
        ->setCellValue('D' . $column, $member['book_publisher'])
        ->setCellValue('E' . $column, $member['book_date_publish']);
      $column++;
    }

    // Tulis dalam format .xls
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Data Buku';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
