<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Badge;
use App\Models\UserBadge;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = UserBadge::class;

    public function definition()
    {
        return [
            'user_id' =>$this->faker->randomElement(array(1,2,3,4,5)),
            'badge_id' =>$this->faker->randomElement(array(1,2,3,4)),
            'next_badge_id' =>  $this->faker->randomElement(array(1,2,3,4)),
        ];
    }
}
