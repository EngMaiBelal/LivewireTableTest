<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'mai mohamed',
            'email'=>'mai.mohamed@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        User::create([
            'name'=>'mona mohamed',
            'email'=>'mona.mohamed@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        User::create([
            'name'=>'ali mohamed',
            'email'=>'ali.mohamed@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
    }
}
