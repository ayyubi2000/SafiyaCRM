<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Role;
class Roles extends Component
{

    public $roles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->roles = Role::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.roles');
    }
}
