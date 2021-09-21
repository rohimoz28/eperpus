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
                'id_member' => 1,
                'id_book' => 1,
                'date_borrow' => '2021-Sep-06',
                'date_return' => '2021-Sep-13',
                'late' => 1,
                'description' => 'Rusak',
                'late_fine' => 1000,
                'book_fine' => 10000,
                'sum_fine' => 11000,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 2,
                'id_book' => 2,
                'date_borrow' => '2021-Sep-07',
                'date_return' => '2021-Sep-11',
                'late' => 2,
                'description' => 'Baik',
                'late_fine' => 2000,
                'book_fine' => 0,
                'sum_fine' => 2000,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 2,
                'id_book' => 3,
                'date_borrow' => '2021-Sep-07',
                'date_return' => '2021-Sep-11',
                'late' => 2,
                'description' => 'Hilang',
                'late_fine' => 2000,
                'book_fine' => 30000,
                'sum_fine' => 32000,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 1,
                'id_book' => 3,
                'date_borrow' => '2021-Sep-07',
                'date_return' => '2021-Sep-11',
                'late' => 2,
                'description' => 'Rusak',
                'late_fine' => 2000,
                'book_fine' => 10000,
                'sum_fine' => 12000,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 3,
                'id_book' => 4,
                'date_borrow' => '2021-Sep-07',
                'date_return' => '2021-Sep-11',
                'late' => 3,
                'description' => 'Hilang',
                'late_fine' => 3000,
                'book_fine' => 30000,
                'sum_fine' => 33000,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 4,
                'id_book' => 1,
                'date_borrow' => '2021-Sep-07',
                'date_return' => '2021-Sep-11',
                'late' => 0,
                'description' => 'Baik',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Kembali',
                'created_at' => Time::now()
            ],
            // Pinjam
            [
                'id_member' => 1,
                'id_book' => 1,
                'date_borrow' => '2021-Sep-06',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 1,
                'id_book' => 2,
                'date_borrow' => '2021-Sep-04',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 2,
                'id_book' => 1,
                'date_borrow' => '2021-Sep-06',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 2,
                'id_book' => 4,
                'date_borrow' => '2021-Sep-06',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 3,
                'id_book' => 3,
                'date_borrow' => '2021-Sep-06',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
            [
                'id_member' => 3,
                'id_book' => 5,
                'date_borrow' => '2021-Sep-06',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
            ],
        ];

        $this->db->table('rents')->insertBatch($data);
    }
}
