<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LateFine extends Seeder
{
    public function run()
    {
        $data = [
            'late_day' => 1,
            'late_fine' => 1000,
            'created_at' => Time::now()
        ];

        $this->db->table('late_fines')->insert($data);
    }
}
