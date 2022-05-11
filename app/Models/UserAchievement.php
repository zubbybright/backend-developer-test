<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','achievement_id','next_achievement_id','next_achievement_unlocked'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function achievement(){
        return $this->belongsTo(Achievement::class);
    }
}
