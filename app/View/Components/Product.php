<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Products;

class Product extends Component
{
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products =  Products::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}
