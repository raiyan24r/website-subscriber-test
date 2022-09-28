<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            [
                'name' => 'Laravel News',
                'url' => "https://www." . Str::random(10) . ".com",
            ],
            [
                'name' => 'Laravel Podcast',
                'url' => "https://www." . Str::random(10) . ".com",

            ]

        ]);
    }
}
