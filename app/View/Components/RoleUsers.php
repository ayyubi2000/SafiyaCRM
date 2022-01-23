<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\RoleUser;

class RoleUsers extends Component
{
    public $roleUsers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->roleUsers = RoleUser::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.role-users');
    }
}
