<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievements')->insert(
            [
                'name' => "First Lesson Watched",
                'description' => "user watches first lesson",
                'type' => 'LESSON_WATCHED',
                'count'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "5 Lessons Watched",
                'description' => "user watches five lessons",
                'type' => 'LESSON_WATCHED',
                'count'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "10 Lessons Watched",
                'description' => "user watches ten lessons",
                'type' => 'LESSON_WATCHED',
                'count'=> 10,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "25 Lessons Watched",
                'description' => "user watches twenty-five lessons",
                'type' => 'LESSON_WATCHED',
                'count'=> 25,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "50 Lessons Watched",
                'description' => "user watches fifty lessons",
                'type' => 'LESSON_WATCHED',
                'count'=> 50,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "First Comment Written",
                'description' => "user writes first comment",
                'type' => 'COMMENT_WRITTEN',
                'count'=> 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "3 Comments Written",
                'description' => "user writes three comments",
                'type' => 'COMMENT_WRITTEN',
                'count'=> 3,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "5 Comments Written",
                'description' => "user writes five comments",
                'type' => 'COMMENT_WRITTEN',
                'count'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "10 Comments Written",
                'description' => "user writes ten comments",
                'type' => 'COMMENT_WRITTEN',
                'count'=> 10,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );

        DB::table('achievements')->insert(
            [
                'name' => "20 Comments Written",
                'description' => "user writes twenty comments",
                'type' => 'COMMENT_WRITTEN',
                'count'=> 20,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        );
    }
}
