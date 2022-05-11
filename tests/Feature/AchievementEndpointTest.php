<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

use function PHPUnit\Framework\assertIsArray;
use function PHPUnit\Framework\assertIsString;

class AchievementEndpointTest extends TestCase
{   
    
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->user = User::first();
    }

    public function test_achievements_endpoint_can_be_gotten()
    {
        
        $response = $this->get("/users/{$this->user->id}/achievements");

        $response->assertStatus(200);
    }

    public function test_that_next_achievements_is_an_array(){
        $response = $this->user->getNextAchievements();

        assertIsArray($response);
    }

    public function test_that_unlocked_achievements_is_an_array(){
        $response = $this->user->getUnlockedAchievementNames();

        assertIsArray($response);
    }

    public function test_that_current_badge_is_a_string(){
        $response = $this->user->getCurrentBadge();

        assertIsString($response);
    }

    public function test_that_next_badge_is_a_string(){
        $response = $this->user->getNextBadge();

        assertIsString($response);
    }

    public function test_that_remaining_to_unlock_is_an_integer(){
        $response = $this->user->remainingToUnlockNextBadge();

        $this->assertIsInt($response);
    }



}
