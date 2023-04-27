<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'    => 'May',
            'last_name'     => 'Ferrer',
            'email'         => 'admin@gmail.com',
            'phone'         => '0000000000',
            'password'      => bcrypt('admin123')
        ]);
    }
}
