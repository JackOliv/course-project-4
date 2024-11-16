<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Basic Magazine',
                'description' => '+26% Ammo
+15% Weapon Damage',
                'cost' => 500,
                'tier_id' => 1,
                'type_id' => 1,
                'image' => 'Basic Magazine.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Close Quarters',
                'description' => '+25% Weapon Damage Conditional
Condition: 15m Close Range',
                'cost' => 500,
                'tier_id' => 2,
                'type_id' => 2,
                'image' => 'Close Quarters.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
