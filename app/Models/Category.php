<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasSlug;
    protected $fillable = [
        "name",
        "slug",
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function books()
    {
        return $this->morphedByMany(Book::class,'categoryable');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class,'categoryable');
    }

    public function audios()
    {
        return $this->morphedByMany(Video::class,'categoryable');
    }
}
