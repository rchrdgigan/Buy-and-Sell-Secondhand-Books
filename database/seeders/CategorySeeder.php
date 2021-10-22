<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_title' => 'Arts and Music',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Comics',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Biographies',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
        DB::table('categories')->insert([
            'category_title' => 'Mysteries',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Sports',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Medical',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'category_title' => 'Business',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Cooking',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Comp and Tech',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Education and Reference',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Sci-Fi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Entertainment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Health and Fitness',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Mathematics',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'English',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Science',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Filipino',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Horror',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'category_title' => 'Romance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
