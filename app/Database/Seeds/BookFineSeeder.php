<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BookFineSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'description' => 'Baik',
                'book_fine' => 0,
                'created_at' => Time::now()
            ],
            [
                'description' => 'Rusak',
                'book_fine' => 25000,
                'created_at' => Time::now()
            ],
            [
                'description' => 'Hilang',
                'book_fine' => 50000,
                'created_at' => Time::now()
            ]
        ];

        $this->db->table('book_fines')->insertBatch($data);
    }
}
