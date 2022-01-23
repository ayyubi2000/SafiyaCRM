<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UsersCreate extends Component
{
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vars)
    {
        if ($vars) {
        $this->user = $vars['user'] ;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users-create');
    }
}
