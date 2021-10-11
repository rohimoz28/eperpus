<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'book_title' => 'Naruto',
        'book_image' => 'ganyu.jpg',
        'id_category' => 1,
        'book_writer' => 'Masashi Kishimoto',
        'book_publisher' => 'Shonen Jump',
        'book_date_publish' => '1998',
        'created_at' => Time::now()
      ],
      [
        'book_title' => 'One Piece',
        'book_image' => 'default.jpg',
        'id_category' => 1,
        'book_writer' => 'Eiichiro Oda',
        'book_publisher' => 'Shonen Jump',
        'book_date_publish' => '1996',
        'created_at' => Time::now()
      ],
      [
        'book_title' => 'Sherlock Holmes',
        'book_image' => 'default.jpg',
        'id_category' => 2,
        'book_writer' => 'Sir Arthur Conan Doyle',
        'book_publisher' => 'Times',
        'book_date_publish' => '1886',
        'created_at' => Time::now()
      ],
      [
        'book_title' => 'Petualangan Suku Apache',
        'book_image' => 'default.jpg',
        'id_category' => 2,
        'book_writer' => 'Karl May',
        'book_publisher' => 'Pustaka Arah',
        'book_date_publish' => '1993',
        'created_at' => Time::now()
      ],
      [
        'book_title' => 'Musashi',
        'book_image' => 'default.jpg',
        'id_category' => 2,
        'book_writer' => 'Masashi Kishimoto',
        'book_publisher' => 'Shonen Jump',
        'book_date_publish' => '1890',
        'created_at' => Time::now()
      ],
      [
        'book_title' => 'Tokyo Revengers',
        'book_image' => 'default.jpg',
        'id_category' => 1,
        'book_writer' => 'Ken Wakui',
        'book_publisher' => 'Shonen Jump',
        'book_date_publish' => '2000',
        'created_at' => Time::now()
      ]
    ];

    $this->db->table('books')->insertBatch($data);
  }
}
