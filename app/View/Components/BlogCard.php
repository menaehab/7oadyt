<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogCard extends Component
{
    public $title;
    public $content;
    public $image;
    public $url;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $content, $image, $url)
    {
        $this->title = $title;
        $this->image = $image;
        $this->url = $url;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-card');
    }
}