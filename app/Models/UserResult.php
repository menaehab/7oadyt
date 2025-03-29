<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserResult extends Model
{
    protected $fillable = ['user_id', 'content_id', 'correct_answers', 'total_questions'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function getScorePercentageAttribute()
    {
        return round(($this->correct_answers / $this->total_questions) * 100, 2);
    }
}