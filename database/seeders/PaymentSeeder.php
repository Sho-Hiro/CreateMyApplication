<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_categories')->insert([
            'payment_category_name' => '現金',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('payment_categories')->insert([
            'payment_category_name' => 'クレジットカード',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
