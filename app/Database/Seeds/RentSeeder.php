<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class RentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            /* [ */
            /*     'member_id' => 1, */
            /*     'book_id' => 1, */
            /*     'date_borrow' => '2021-Sep-06', */
            /*     'date_return' => '2021-Sep-13', */
            /*     'late' => 1, */
            /*     'book_fine_id' => 1, */
            /*     'late_fine' => 1000, */
            /*     /1* 'book_fine' => 10000, *1/ */
            /*     'sum_fine' => 11000, */
            /*     'book_status' => 'Kembali', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 2, */
            /*     'book_id' => 2, */
            /*     'date_borrow' => '2021-Sep-07', */
            /*     'date_return' => '2021-Sep-11', */
            /*     'late' => 2, */
            /*     'book_fine_id' => 2, */
            /*     'late_fine' => 2000, */
            /*     /1* 'book_fine' => 0, *1/ */
            /*     'sum_fine' => 2000, */
            /*     'book_status' => 'Kembali', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 2, */
            /*     'book_id' => 3, */
            /*     'date_borrow' => '2021-Sep-07', */
            /*     'date_return' => '2021-Sep-11', */
            /*     'late' => 2, */
            /*     'book_fine_id' => 1, */
            /*     'late_fine' => 2000, */
            /*     /1* 'book_fine' => 30000, *1/ */
            /*     /1* 'book_fine' => 30000, *1/ */
            /*     'sum_fine' => 32000, */
            /*     'book_status' => 'Kembali', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 1, */
            /*     'book_id' => 3, */
            /*     'date_borrow' => '2021-Sep-07', */
            /*     'date_return' => '2021-Sep-11', */
            /*     'late' => 2, */
            /*     'book_fine_id' => 2, */
            /*     'late_fine' => 2000, */
            /*     /1* 'book_fine' => 10000, *1/ */
            /*     'sum_fine' => 12000, */
            /*     'book_status' => 'Kembali', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 3, */
            /*     'book_id' => 4, */
            /*     'date_borrow' => '2021-Sep-07', */
            /*     'date_return' => '2021-Sep-11', */
            /*     'late' => 3, */
            /*     'description' => 'Hilang', */
            /*     'late_fine' => 3000, */
            /*     'book_fine' => 30000, */
            /*     'sum_fine' => 33000, */
            /*     'book_status' => 'Kembali', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 4, */
            /*     'book_id' => 1, */
            /*     'date_borrow' => '2021-Sep-07', */
            /*     'date_return' => '2021-Sep-11', */
            /*     'late' => 0, */
            /*     'description' => 'Baik', */
            /*     'late_fine' => 0, */
            /*     'book_fine' => 0, */
            /*     'sum_fine' => 0, */
            /*     'book_status' => 'Kembali', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* // Pinjam */
            /* [ */
            /*     'member_id' => 1, */
            /*     'book_id' => 1, */
            /*     'date_borrow' => '2021-Sep-06', */
            /*     'date_return' => '', */
            /*     'late' => 0, */
            /*     'description' => '', */
            /*     'late_fine' => 0, */
            /*     'book_fine' => 0, */
            /*     'sum_fine' => 0, */
            /*     'book_status' => 'Pinjam', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 1, */
            /*     'book_id' => 2, */
            /*     'date_borrow' => '2021-Sep-04', */
            /*     'date_return' => '', */
            /*     'late' => 0, */
            /*     'description' => '', */
            /*     'late_fine' => 0, */
            /*     'book_fine' => 0, */
            /*     'sum_fine' => 0, */
            /*     'book_status' => 'Pinjam', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 2, */
            /*     'book_id' => 1, */
            /*     'date_borrow' => '2021-Sep-06', */
            /*     'date_return' => '', */
            /*     'late' => 0, */
            /*     'description' => '', */
            /*     'late_fine' => 0, */
            /*     'book_fine' => 0, */
            /*     'sum_fine' => 0, */
            /*     'book_status' => 'Pinjam', */
            /*     'created_at' => Time::now() */
            /* ], */
            /* [ */
            /*     'member_id' => 2, */
            /*     'book_id' => 4, */
            /*     'date_borrow' => '2021-Sep-06', */
            /*     'date_return' => '', */
            /*     'late' => 0, */
            /*     'description' => '', */
            /*     'late_fine' => 0, */
            /*     'book_fine' => 0, */
            /*     'sum_fine' => 0, */
            /*     'book_status' => 'Pinjam', */
            /*     'created_at' => Time::now() */
            /* ], */
            [
                'member_id' => 3,
                'book_id' => 3,
                'date_borrow' => '2021-Sep-10',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now()
                /* 'created_at' => '' */
            ],
            [
                'member_id' => 3,
                'book_id' => 5,
                'date_borrow' => '2021-Sep-20',
                'date_return' => '',
                'late' => 0,
                'description' => '',
                'late_fine' => 0,
                'book_fine' => 0,
                'sum_fine' => 0,
                'book_status' => 'Pinjam',
                'created_at' => Time::now(),
                /* 'created_at' => '' */

            ],
        ];

        $this->db->table('rents')->insertBatch($data);
    }
}
