<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tier')->insert([
            ['name' => 'I', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'II', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'III', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'IV', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
