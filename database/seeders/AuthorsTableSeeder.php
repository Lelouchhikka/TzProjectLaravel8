<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Author::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'avatar'=>$faker->word,
            ]);
        }
        //
    }
}
