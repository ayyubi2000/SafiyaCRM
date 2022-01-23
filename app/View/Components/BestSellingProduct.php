<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Purchase;

class BestSellingProduct extends Component
{
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = Purchase::get()->groupBy('product_id');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.best-selling-product');
    }
}
