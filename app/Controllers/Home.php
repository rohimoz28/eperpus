<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\MemberModel;

class Home extends BaseController
{

  public function __construct()
  {
    $this->memberModel = new MemberModel();
    $this->bookModel = new BookModel();
  }

  public function index()
  {
    $count_member = $this->memberModel->countMember();
    $count_book = $this->bookModel->countBook();
    $count_borrowed = $this->bookModel->countBook();


    $data = [
      'member' => $count_member,
      'book' => $count_book,
      'borrowed' => $count_borrowed,
    ];

    return view('home/index', $data);
  }
}
