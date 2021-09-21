<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => 'admin',
            'created_at' => Time::now()
        ];

        $this->db->table('users')->insert($data);
    }
}
