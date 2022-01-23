<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Customer;
class Birthdays extends Component
{
    public $customers;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {       
        $day = date('d', strtotime('this day'));
        $month = date('m', strtotime('this month'));
        $this->customers = Customer::whereDay('birthday', $day)->whereMonth('birthday', $month)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.birthdays');
    }

}
