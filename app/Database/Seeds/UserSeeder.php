<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'username' => 'admin',
        'password' => 'admin',
        'role' => 1,
        'created_at' => Time::now()
      ],
      [
        'username' => 'user',
        'password' => 'user',
        'role' => 2,
        'created_at' => Time::now()
      ],
    ];

    $this->db->table('users')->insertBatch($data);
  }
}
