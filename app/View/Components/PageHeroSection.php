<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeroSection extends Component
{
    public $title;
    public $image;

    public function __construct($title)
    {
        $this->title = $title;
        $this->image = asset('assets/images/about-banner.jpg');
    }

    public function render()
    {
        return view('components.page-hero-section');
    }
}
