<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Events\LessonWatched;
use App\Models\User;
use App\Models\Badge;
use App\Models\Achievement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserWatchedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LessonWatched $event, User $user)
    {

        // get the number of watched lessons the user has
        $numberOfWatchedLessons = $user->watched()->get()->count();
        //get user's next achievements
        $userNextAchievements = $user->getNextAchievements();
        //get next lesson watched achievement
        $nextLessonWatchedAchievement = $userNextAchievements->map(function ($a) {
            if ($a->type === 'LESSON_WATCHED') {
                return $a;
            } else {
                return null;
            }
        });

        if ($nextLessonWatchedAchievement !== null) {
            //if comment count is equal to next comment achievement count
            if ($numberOfWatchedLessons == $nextLessonWatchedAchievement->count) {
                //fire achievement unlocked event
                event(new AchievementUnlocked($nextLessonWatchedAchievement->name, $user));

                $nextAchievementId = $this->getNextAchievementId($user);
                //unlock achievement
                $user->userAchievements()->create([
                    'user_id' => $user->id,
                    'achievement_id' => $nextLessonWatchedAchievement->id,
                    'next_achievement_id' => $nextAchievementId,
                    'next_achievement_unlocked' => false
                ]);

                //mark next achievement as unlocked
                $user->userAchievements()->where('next_achievement_id', $nextLessonWatchedAchievement->id)
                    ->update(['next_achievement_unlocked' => true]);

                //check if the user can unlock a badge
                //count number of achievements
                $numberOfAchievements = $user->userAchievements()->count();
                $eligibleBadge = Badge::where('achievement_count', $numberOfAchievements)->first();

                if ($eligibleBadge !== null) {
                    //fire badge unlocked event
                    event(new BadgeUnlocked($eligibleBadge->name, $user));

                    //unlock badge
                    $user->userBadges()->create([
                        'user_id' => $user->id,
                        'badge_id' => $eligibleBadge->id,
                        'next_badge_id' => $eligibleBadge->id + 1,
                    ]);
                }
            }
        }
    }

    private function getNextAchievementId($user)
    {
        //get next achievement id 
        $currentAchievement = $user->userAchievements()->latest()->first();

        $nextAchievement = Achievement::where('id', ($currentAchievement->achievement_id + 1))->first();

        if ($currentAchievement->achievement()->type === $nextAchievement->type) {
            return $nextAchievement->id;
        } else {
            return $currentAchievement->id;
        }
    }
}
