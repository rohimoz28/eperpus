<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;
use App\Models\MemberModel;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $member = new MemberModel();

        $data = [
            [
                'name' => 'Rohim Muhamad',
                'gender' => 'Pria',
                'number' => '081299880121',
                'email' => 'rohim@gmail.com',
                'address' => 'Jl. ABC no 321',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Noelle Sukmadi',
                'gender' => 'Wanita',
                'number' => '081200911290',
                'email' => 'noelle@yahoo.com',
                'address' => 'Jl. XYZ no 123',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Lina Nur Lathifah',
                'gender' => 'Wanita',
                'number' => '081200981290',
                'email' => 'lina@yahoo.com',
                'address' => 'Jl. JKL no 456',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Muhamad Anas',
                'gender' => 'Pria',
                'number' => '081207887290',
                'email' => 'anas@rocketmail.com',
                'address' => 'Jl. DEF no 789',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Wahyu Budi',
                'gender' => 'Pria',
                'number' => '08560788690',
                'email' => 'budi@gmail.com',
                'address' => 'Jl. XYZ no 123',
                'created_at' => Time::now()
            ],
            [
                'name' => 'Dyah Kumala',
                'gender' => 'Wanita',
                'number' => '08560787766',
                'email' => 'kumala@yahoo.com',
                'address' => 'Jl. HJK no 234',
                'created_at' => Time::now()
            ],

        ];

        for ($i = 0; $i <= 190; $i++) {

            ($i <= 50) ? $gender = 'Pria' : 'Wanita';

            $member->save([
                'name' => $faker->name(),
                'gender' => $gender,
                'number' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'created_at' => Time::now()
            ]);
        }

        $this->db->table('members')->insertBatch($data);
    }
}
