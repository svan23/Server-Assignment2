<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username'   => 'a@a.a',
                'password'   => password_hash('P@$$w0rd', PASSWORD_DEFAULT),
                'first_name' => 'AA',
                'last_name'  => 'AA',
                'is_approved'=> true,
                'role'       => 'admin',
            ],
            [
                'username'   => 'c@c.c',
                'password'   => password_hash('P@$$w0rd', PASSWORD_DEFAULT),
                'first_name' => 'CC',
                'last_name'  => 'CC',
                'is_approved'=> true,
                'role'       => 'contributor',
            ]
        ]);
    }
}
