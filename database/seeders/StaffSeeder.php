<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@loman.com',
            'password' => bcrypt('admin'),
            'role' => 'staff',
            'nohp' => '081212121212'
        ]);
        //
    }
}
