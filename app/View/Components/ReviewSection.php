<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ReviewSection extends Component
{
    public $contentId;
    public $reviews;
    /**
     * Create a new component instance.
     */
    public function __construct($contentId,$reviews)
    {
        $this->contentId = $contentId;
        $this->reviews = $reviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-section');
    }
}
