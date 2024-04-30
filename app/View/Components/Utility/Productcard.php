<?php

namespace App\View\Components\Utility;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Productcard extends Component
{
    /**
     * Create a new component instance.
     */
    public $singleProduct;
    public function __construct($singleProduct)
    {
        $this -> singleProduct = $singleProduct;
        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utility.productcard');
    }
}
