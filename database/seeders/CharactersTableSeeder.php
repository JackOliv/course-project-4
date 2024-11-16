<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('characters')->insert([
            ['name' => 'Abrams', 'image' => 'Abrams.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bebop', 'image' => 'Bebop.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
