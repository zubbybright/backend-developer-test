<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Achievement;
use App\Models\UserAchievement;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        return response()->json([
            'unlocked_achievements' => $this->getUnlockedAchievementNames(),
            'next_available_achievements' => $this->getNextAchievements(),
            'current_badge' => '',
            'next_badge' => '',
            'remaing_to_unlock_next_badge' => 0
        ]);
    }



    private function getUnlockedAchievementNames(){
        $unlockedAchievementsNames = [];
        auth()->user()->userAchievements()->get()->map(function($a) use ($unlockedAchievementsNames){
            $achivementName = Achievement::where('id', $a->id)->first()->name;
            $unlockedAchievementsNames[] = $achivementName;
        });

        return $unlockedAchievementsNames;
    }
}
