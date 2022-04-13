<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name'=>'AAA Company',
        ]);
        Supplier::create([
            'name'=>'BBB Company',
        ]);
        Supplier::create([
            'name'=>'CCC Company',
        ]);
        Supplier::create([
            'name'=>'DDD Company',
        ]);
    }
}
