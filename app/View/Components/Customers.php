<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Customer;
use App\Models\Status;
use App\Models\Addver;
class Customers extends Component
{
    public $customers;
    public $addvers;
    public $statuses;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vars)
    {
        $this->customers = $vars['customers'] ?? null;
        $this->statuses = Status::get();
        $this->addvers = Addver::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customers');
    }
}
