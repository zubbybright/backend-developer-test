<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert(
            [
                'name' => "Beginner",
                'achievement_count' => 0,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('badges')->insert(
            [
                'name' => "Intermediate",
                'achievement_count' => 4,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ]
        );

        DB::table('badges')->insert(
            [
                'name' => "Advanced",
                'achievement_count' => 8,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('badges')->insert(
            [
                'name' => "Master",
                'achievement_count' => 10,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );
    }
}
