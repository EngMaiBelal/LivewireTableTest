<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name'=>'car',
        ]);
        Item::create([
            'name'=>'mobile',
        ]);
        Item::create([
            'name'=>'piano',
        ]);
        Item::create([
            'name'=>'screen',
        ]);
    }
}
