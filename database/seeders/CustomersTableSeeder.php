<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name'=>'Ali',
        ]);
        Customer::create([
            'name'=>'Mai',
        ]);
        Customer::create([
            'name'=>'Said',
        ]);
        Customer::create([
            'name'=>'Noha',
        ]);
    }
}
