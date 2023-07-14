<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_categories')->insert([
            'category_name' => 'カフェ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('post_categories')->insert([
            'category_name' => 'ラーメン',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('post_categories')->insert([
            'category_name' => '弁当',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
