<?php

namespace Database\Factories;

use App\Models\Achievement;
use App\Models\User;
use App\Models\UserAchievement;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = UserAchievement::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(array(1,2,3,4,5)),
            'achievement_id' => $this->faker->randomElement(array(1,2,3,4,5,6,7,8,9,10)),
            'next_achievement_id' => function (array $attributes) {
                //check type of achievement
                $achievement = Achievement::find($attributes['achievement_id']);
                $nextAchievement = $achievement->id + 1;
                $checkNextAchievement = Achievement::find($nextAchievement);
                
                if($checkNextAchievement !== null){
                    if($checkNextAchievement->type === $achievement->type){
                        return $nextAchievement;
                    }else{
                        return $achievement->id; 
                    }
                };
                return $achievement->id;
            },
            'next_achievement_unlocked' => $this->faker->randomElement(array(true,false)),
        ];
    }
}
