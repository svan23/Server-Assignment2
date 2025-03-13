<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
