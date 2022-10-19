<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\CatalogAndPost;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Author::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'avatar'=>$faker->word,
            ]);
        }
        $faker = \Faker\Factory::create();

        Catalog::create([
            'name' => $faker->name,
        ]);
        Catalog::create([
            'name' => $faker->name,
            'parent_id'=>1
        ]);
        Catalog::create([
            'name' => $faker->name,
            'parent_id'=>1
        ]);
        Catalog::create([
            'name' => $faker->name,
            'parent_id'=>3
        ]);
        Catalog::create([
            'name' => $faker->name,
            'parent_id'=>2
        ]);
        Catalog::create([
            'name' => $faker->name,
            'parent_id'=>2
        ]);

        for ($i = 0; $i < 10; $i++) {
           $post= Post::create([
                'title' => $faker->name,
                'announcement' => $faker->sentence,
                'dateTimeOfPublication'=>$faker->dateTime,
                'author_id'=>random_int(1,9)
                ]);
            $post->catalogs()->attach(Catalog::all()->where('id',random_int(1,6))->first->id);
        }

    }
}
