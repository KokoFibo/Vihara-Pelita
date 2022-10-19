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
        \App\Models\DataPelita::factory(15)->create();

        \App\Models\Cabang::factory()->create(
            [
                'kode_id' => 'JKT-01',
                'negara' => 'Indonesia',
                'kota' => 'Jakarta',
                'daerah' => 'BNI'
            ],

        );
    }
}
