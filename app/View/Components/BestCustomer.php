<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Purchase;

class BestCustomer extends Component
{
    public $customers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $date = date('Y-m-d', strtotime(' -1 months'));
        $this->customers = Purchase::whereDate('created_at' , '>=', $date )->get()->groupBy('customer_id');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.best-customer');
    }
}
