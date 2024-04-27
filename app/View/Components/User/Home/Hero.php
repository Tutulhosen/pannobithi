<?php

namespace App\View\Components\User\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    /**
     * Create a new component instance.
     */

     public $hero;

    public function __construct($hero)
    {
        $this -> hero = $hero;

        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.home.hero');
    }
}
