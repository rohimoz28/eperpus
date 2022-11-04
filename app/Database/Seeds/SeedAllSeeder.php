<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedAllSeeder extends Seeder
{
    public function run()
    {
        $this->call('BookFineSeeder');
        $this->call('BookSeeder');
        $this->call('CategorySeeder');
        $this->call('LateFine');
        $this->call('MemberSeeder');
        $this->call('RentSeeder');
        $this->call('UserSeeder');
    }
}
