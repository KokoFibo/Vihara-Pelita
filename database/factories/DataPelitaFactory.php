<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPelita>
 */
class DataPelitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name,
            'mandarin' => fake('zh_TW')->name, 
            'jenis_kelamin' => fake()->numberBetween(1,4), 
            'umur' => fake()->numberBetween(1,99),
            'alamat' => fake()->address,
            'kota' => fake()->city,
            'telp' => fake()->e164PhoneNumber(),
            'hp' => fake()->e164PhoneNumber(),
            'email' => fake()->email,
            'tgl_mohonTao' => fake()->dateTimeThisDecade(),
            'keterangan' => fake()->words(2,true),
            'cabang_id' => '1'
        ];
    }
}
