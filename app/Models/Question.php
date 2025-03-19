<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content_id', 'question'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
