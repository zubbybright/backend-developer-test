<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(User $user)
    {   
        return response()->json([
            'unlocked_achievements' => $this->getUnlockedAchievementNames($user),
            'next_available_achievements' => User::find($user)->getNextAchievements(),
            'current_badge' => User::find($user)->getCurrentBadge(),
            'next_badge' => User::find($user)->getNextBadge(),
            'remaining_to_unlock_next_badge' => User::find($user)->remainingToUnlockNextBadge()
        ]);
    }



    private function getUnlockedAchievementNames($user){
        $unlockedAchievementsNames = [];

        $userAchievements = User::find($user)->userAchievements()->get();
        
        foreach($userAchievements as $a){
            $achivementName = Achievement::where('id', $a->id)->first()->name;
            $unlockedAchievementsNames[] = $achivementName;
        }

        return $unlockedAchievementsNames;
    }
}
