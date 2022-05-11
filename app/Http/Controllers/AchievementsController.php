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
            'unlocked_achievements' => $user->getUnlockedAchievementNames(),
            'next_available_achievements' => $user->getNextAchievements(),
            'current_badge' => $user->getCurrentBadge(),
            'next_badge' => $user->getNextBadge(),
            'remaining_to_unlock_next_badge' => $user->remainingToUnlockNextBadge()
        ]);
    }




}
