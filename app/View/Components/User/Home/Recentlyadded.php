<?php

namespace App\View\Components\User\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Recentlyadded extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($data)
    {
        $this -> data = $data;
        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd($this->data['all_products']);
        return view('components.user.home.recentlyadded');
    }
}
