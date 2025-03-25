<?php

namespace App\Models;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        "user_id",
        "content_id",
        "comment",
        "rating",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function content()
    {
    return $this->belongsTo(Content::class);
    }
}
