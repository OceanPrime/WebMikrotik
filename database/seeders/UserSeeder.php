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
                'no_telepon'=>'082187906552',
                'password'=>bcrypt('raven123'),
                'alamat'=>'cikampek',
            ],
            [
                'name'=>'prime',
                'email'=>'prime@gmail.com',
                'role'=>'user',
                'no_telepon'=>'082187906112',
                'password'=>bcrypt('prime123'),
                'alamat'=>'bandung',
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
