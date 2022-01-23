<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoleCreate extends Component
{
    public $role;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vars)
    {
        if ($vars) {
            $this->role = $vars['role'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.role-create');
    }
}
