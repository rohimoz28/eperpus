<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\CategoryModel;
/* use phpDocumentor\Reflection\Types\This; */
/* use PhpOffice\PhpSpreadsheet\Reader\Xls; */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Book extends BaseController
{
  public function __construct()
  {
    $this->book = new BookModel();
    $this->category = new CategoryModel();
    session();
  }

  public function index()
  {
    $data['books'] = $this->book->findAll();
    echo view('book/index', $data);
  }

  public function create()
  {
    $data['categories'] = $this->category->findAll();
    return view('book/create', $data);
  }

  public function store()
  {
    $judul = $this->request->getPost('judul');
    $kategori = $this->request->getPost('kategori');
    $penulis = $this->request->getPost('penulis');
    $penerbit = $this->request->getPost('penerbit');
    $th_terbit = $this->request->getPost('th_terbit');
    $gambar = $this->request->getFile('gambar');
    /* dd($gambar); */

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
      if ($gambar->getError() == 4) {
        $gambarName = 'default.jpeg';
      } else {
        $gambarName = $gambar->getName();
        $gambar->move('img/upload', $gambarName);
      }
      /* dd($gambarName); */
      $data = [
        'book_title' => $judul,
        'book_image' => $gambarName,
        'id_category' => $kategori,
        'book_writer' => $penulis,
        'book_publisher' => $penerbit,
        'book_date_publish' => $th_terbit,
      ];

      /* dd($data); */

      $save = $this->book->insert($data);

      if ($save) {
        session()->setFlashdata('success', 'ditambahkan');
        return redirect()->to(base_url('book'));
      }
    }
  }

  public function edit($id)
  {
    $data = [
      'book' => $this->book->getBook($id),
      'category' => $this->category->findAll(),
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
    $gambar = $this->request->getFile('gambar');
    /* dd($gambar); */

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
      ],

    ]);

    $user = $this->book->getBook($id);

    if (!$isValidated) {
      return redirect()->back()->withInput();
    } else {
      /* echo 'tidak masuk'; */
      if ($gambar->getError() == 4) {
        $gambarNama = $user['book_image'];
        /* echo 'tidak ada gambar yg di upload'; */
        $data = [
          'book_title' => $judul,
          'id_category' => $kategori,
          'book_writer' => $penulis,
          'book_publisher' => $penerbit,
          'book_date_publish' => $th_terbit,
          'book_image' => $gambarNama,
        ];
        $update = $this->book->updateBook($data, $id);

        if ($update) {
          session()->setFlashdata('success', 'diubah');
          return redirect()->to(base_url('book'));
        }
      } else {
        $validGambar = $this->validate([
          'gambar' => [
            'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
            'errors' => [
              'mime_in' => 'Format gambar harus jpg, jpeg, atau png',
              'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB'
            ]
          ]
        ]);

        if (!$validGambar) {
          /* echo 'gambar tidak valid'; */
          return redirect()->back()->withInput();
        } else {
          // Gambar baru valid dan siap di upload
          $gambarLama = $user['book_image'];

          if ($gambar->getName() == 'default.jpg') {
            $gambarNama = 'default.jpg';
            $gambar->move(WRITEPATH . '../public/img/upload', $gambarNama);
          } else {
            $path = '../public/img/upload/';
            /* unlink($path . $gambarLama); */
            $gambarNama = $gambar->getRandomName();
            $gambar->move(WRITEPATH . '../public/img/upload', $gambarNama);
          }

          $data = [
            'book_title' => $judul,
            'id_category' => $kategori,
            'book_writer' => $penulis,
            'book_publisher' => $penerbit,
            'book_date_publish' => $th_terbit,
            'book_image' => $gambarNama,
          ];
          $update = $this->book->updateBook($data, $id);

          if ($update) {
            session()->setFlashdata('success', 'diubah');
            return redirect()->to(base_url('book'));
          }
        }
      }
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

  public function ajaxSearchBook()
  {
    helper(['form', 'url']);

    $records = [];

    $database = \Config\Database::connect();
    $sql = $database->table('books');

    $sqlQuery = $sql->like('book_title', $this->request->getVar('term'))
      ->select('book_id as id, book_title as text')
      ->limit(7)->get();

    $records = $sqlQuery->getResult();
    echo json_encode($records);
  }
}
