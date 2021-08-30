<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;



class PetTableSeeder extends Seeder {

    /**
     * Seed pets table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->delete();

        Pet::create(array('category' => 1,
                            'name' => 'checco',
                            'photoUrls' => '["https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.ilverdemondo.it%2Fit%2Fblog%2Fallevare-canarini-consigli-e-considerazioniil-ve-82&psig=AOvVaw010iJWw_a9l_DU8C-YUTRr&ust=1630369755140000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCPCEyOm-1_ICFQAAAAAdAAAAABAP"]',
                            'tags' => '[1,5]',
                            'status' => 'sold'));
        Pet::create(array('category' => 1,
                            'name' => 'checco 2',
                            'photoUrls' => '["https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.ilverdemondo.it%2Fit%2Fblog%2Fallevare-canarini-consigli-e-considerazioniil-ve-82&psig=AOvVaw010iJWw_a9l_DU8C-YUTRr&ust=1630369755140000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCPCEyOm-1_ICFQAAAAAdAAAAABAP"]',
                            'tags' => '[1,5]',
                            'status' => 'available'));
        Pet::create(array('category' => 2,
                            'name' => 'ringo',
                            'photoUrls' => '["https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FAustralian_Kelpie&psig=AOvVaw18itn8LStP-cHkGNb41ej_&ust=1630369858708000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMDWopi_1_ICFQAAAAAdAAAAABAD"]',
                            'tags' => '[2,3,4]',
                            'status' => 'available'));
        Pet::create(array('category' => 2,
                            'name' => 'ringo 2',
                            'photoUrls' => '["https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FAustralian_Kelpie&psig=AOvVaw18itn8LStP-cHkGNb41ej_&ust=1630369858708000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMDWopi_1_ICFQAAAAAdAAAAABAD"]',
                            'tags' => '[2,3,4]',
                            'status' => 'pending'));
        Pet::create(array('category' => 2,
                            'name' => 'ringo 3',
                            'photoUrls' => '[]',
                            'tags' => '[2,3,4]',
                            'status' => 'pending',
                            'created_at' => '2021-08-30T01:52:04.000000Z',
                            'updated_at' => '2021-08-30T01:52:04.000000Z'));
    }

}