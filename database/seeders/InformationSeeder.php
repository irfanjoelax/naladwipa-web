<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'email'     => 'admin@admin.com',
            'address'   => 'Rapak Indah Street No.127, Samarinda City, East Borneo',
            'facebook'  => 'https://www.facebook.com/search/top?q=master%20digital%20solutions',
            'twitter'   => 'https://twitter.com/2022mds',
            'youtube'   => 'https://www.youtube.com/channel/UCh4oR8zUI5G8oqPMv-fxHnA',
            'instagram' => 'https://www.instagram.com/masterdigitalsolutions2022/',
        ]);
    }
}
