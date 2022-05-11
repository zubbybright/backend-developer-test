<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The comments that belong to the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * The lessons that a user has access to.
     */
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    /**
     * The lessons that a user has watched.
     */
    public function watched()
    {
        return $this->belongsToMany(Lesson::class)->wherePivot('watched', true);
    }

    //Achievements the user has
    public function userAchievements()
    {
        return $this->hasMany(UserAchievement::class);
    }

    public function getNextAchievements()
    {
        //get current unlocked achievements
        $nextAchievements = [];

        $unlockedAchievements = $this->userAchievements()->where('next_achievement_unlocked', false)->get();

        foreach ($unlockedAchievements as $a) {
            if ($a->id !== $a->achievement_id) {
                //compare achievement types
                $currentAchievement = Achievement::where('id', $a->achievement_id)->first();
                $nextAchievement = Achievement::where('id', $a->next_achievement_id)->first();
                if ($currentAchievement->type === $nextAchievement->type) {
                    $nextAchievements[] =  $nextAchievement;
                }
            }
        }

        return $nextAchievements;
    }

    //Badges the user has
    public function userBages()
    {
        return $this->hasMany(UserBadge::class);
    }
}
