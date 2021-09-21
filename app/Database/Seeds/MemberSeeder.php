<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Rohim Muhamad',
                'gender' => 'Pria',
                'address' => 'Jl. ABC no 321',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Yantina Larasati',
                'gender' => 'Wanita',
                'address' => 'Jl. XYZ no 123',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Lina Nur Lathifah',
                'gender' => 'Wanita',
                'address' => 'Jl. JKL no 456',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Muhamad Anas',
                'gender' => 'Pria',
                'address' => 'Jl. DEF no 789',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Wahyu Budi',
                'gender' => 'Pria',
                'address' => 'Jl. XYZ no 123',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Dyah Kumala',
                'gender' => 'Wanita',
                'address' => 'Jl. HJK no 234',
                'created_at' => Time::now()
            ],

        ];
        $this->db->table('members')->insertBatch($data);
    }
}
