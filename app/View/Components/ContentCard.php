<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentCard extends Component
{
    public $title;
    public $description;
    public $image;
    public $url;
    public $avgRating;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $image, $url,$avgRating, $description = null)
    {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
        $this->description = $description;
        $this->avgRating = $avgRating;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content-card');
    }
}