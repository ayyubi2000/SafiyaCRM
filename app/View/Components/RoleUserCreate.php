<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Role;

class RoleUserCreate extends Component
{
    public $users;
    public $roles;
    public $roleUserEdit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vars)
    {
            $this->roleUserEdit = $vars['RoleUser'] ?? null;
            $this->users = User::get();
            $this->roles = Role::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.role-user-create');
    }
}
