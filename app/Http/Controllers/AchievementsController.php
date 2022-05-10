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

    private function getNextAchievements()
    {   
        //get current unlocked achievements
        $nextAchievements = [];
        
        $unlockedAchievements = auth()->user()->userAchievements()->get()->map(function($a) use ( $nextAchievements){
            //compare achievement types
            $currentAchievement = Achievement::where('id', $a->achievement_id)->first();
            $nextAchievement = Achievement::where('id', $a->next_achievement_id)->first();
            if($currentAchievement->type === $nextAchievement->type){
                $nextAchievements[] =  $nextAchievement;
            }
        });
        
        return $nextAchievements;
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
