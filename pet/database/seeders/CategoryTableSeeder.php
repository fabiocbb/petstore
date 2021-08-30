<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array('id' => 1, 'name' => 'birds'));
        Category::create(array('id' => 2, 'name' => 'dogs'));
        Category::create(array('id' => 3, 'name' => 'cats'));

    }

}