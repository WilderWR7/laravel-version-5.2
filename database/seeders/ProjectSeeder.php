<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('projects')->insert([
            "image"=> "images/IQt3iaX7euaoNM4OKL7qF0oFngX5mgCAvbVyH4Oi.png",
            "title"=>"laravel seeder",
            "url"=>"laravel-seeder",
            "description"=>"create data seeder"
        ]);
    }
}
