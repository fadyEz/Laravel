<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {        
        DB::table('posts')->insert([
            'title' => $faker->sentence() ,
            'body' => $faker->paragraph(),
            'create_by' => str::random(10),
        ]);
    }

    // Post::factory(50)->create();

    }
}
