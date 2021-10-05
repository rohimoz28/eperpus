<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class RentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'member_id' => 3,
                'book_id' => 3,
                'date_borrow' => '2021-Sep-10',
                'date_return' => '',
                'late' => 0,
                'book_fine_id' => '',
                'late_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'member_id' => 3,
                'book_id' => 1,
                'date_borrow' => '2021-Sep-20',
                'date_return' => '',
                'late' => 0,
                'book_fine_id' => '',
                'late_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now(),
            ],
            [
                'member_id' => 1,
                'book_id' => 4,
                'date_borrow' => '2021-Sep-30',
                'date_return' => '',
                'late' => 0,
                'book_fine_id' => '',
                'late_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'member_id' => 3,
                'book_id' => 2,
                'date_borrow' => '2021-Sep-27',
                'date_return' => '',
                'late' => 0,
                'book_fine_id' => '',
                'late_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'member_id' => 4,
                'book_id' => 4,
                'date_borrow' => '2021-Sep-27',
                'date_return' => '2021-Sep-30',
                'late' => 0,
                'book_fine_id' => 1,
                'late_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            [
                'member_id' => 5,
                'book_id' => 1,
                'date_borrow' => '2021-Sep-25',
                'date_return' => '2021-Sep-29',
                'late' => 0,
                'book_fine_id' => 1,
                'late_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
        ];

        $this->db->table('rents')->insertBatch($data);
    }
}
