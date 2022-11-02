<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DataPelita::factory(500)->create();

        

        // \App\Models\Kota::factory()->create(
        //     [
               
        //         'kota' => 'Jakarta'
        //     ],

        // );
    }
}
