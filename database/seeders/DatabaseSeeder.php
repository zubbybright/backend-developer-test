<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $lessons = Lesson::factory()
            ->count(20)
            ->create();

        $this->call([
            UserSeeder::class,
            AchievementSeeder::class,
            BadgeSeeder::class,
        ]);
    }
}
