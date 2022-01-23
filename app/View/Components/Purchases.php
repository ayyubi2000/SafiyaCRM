<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Purchase;
class Purchases extends Component
{
    public $purchases;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->purchases = Purchase::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.purchases');
    }
}
