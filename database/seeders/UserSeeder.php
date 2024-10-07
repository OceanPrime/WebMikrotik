<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'raven',
                'email'=>'raven@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('raven123'),
            ],
            [
                'name'=>'prime',
                'email'=>'prime@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('prime123'),
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
