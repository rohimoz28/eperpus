<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CategorySeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'category_name' => 'Komik',
        'created_at' => Time::now()
      ],
      [
        'category_name' => 'Novel',
        'created_at' => Time::now()
      ],
      [
        'category_name' => 'Cerpen',
        'created_at' => Time::now()
      ]
    ];

    $this->db->table('categories')->insertBatch($data);
  }
}
