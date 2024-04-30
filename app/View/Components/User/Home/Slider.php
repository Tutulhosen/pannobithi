<?php

namespace App\View\Components\User\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public $slider;
    public function __construct($slider)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
       
        return view('components.user.home.slider');
    }
}
