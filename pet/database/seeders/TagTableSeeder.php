<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder {

    /**
     * Seed tags table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        Tag::create(array('id' => 1, 'name' => 'yellow'));
        Tag::create(array('id' => 2, 'name' => 'brown'));
        Tag::create(array('id' => 3, 'name' => 'active'));
        Tag::create(array('id' => 4, 'name' => 'fast'));
        Tag::create(array('id' => 5, 'name' => 'tiny'));
    }

}
