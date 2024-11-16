<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('type')->insert([
            ['name' => 'Weapon', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Vitality', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Spirit', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
