<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Comment;
use App\Models\UserAchievement;
use App\Models\UserBadge;
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

        UserBadge::factory()
            ->count(5)
            ->create();

        UserAchievement::factory()
            ->count(5)
            ->create();
    }
}
