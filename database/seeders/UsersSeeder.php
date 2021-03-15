<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@account.com',
                'password' => '$2y$10$g6nsCexhPL0JkFqnMWlaRuInTKb5Cvzom8A5ec8XYChm4/UnXlPT.', //Custom password hashed
            ]
        );
    }
}
