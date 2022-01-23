<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;


class Permissions extends Component
{
     
    public $permissions;
    public $roles;
    public $users;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->permissions = Permission::get();
      $this->roles = Role::get(); 
      $this->users = User::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.permissions');
    }
}
