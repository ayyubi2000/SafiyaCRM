<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Gate;
class PermissionsController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return $this->render('permissions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Gate::authorize('create');
        return $this->render('roles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gate::authorize('create');
         $roles = Role::get();

        foreach($roles as $role) {
            if (isset($request->roles[$role->id])) {
                $role->permissions()->sync($request->roles[$role->id]);
            } else {
                $role->permissions()->detach();
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        // Gate::authorize('update');
        $this->vars['permission'] = $permission;
        return $this->render('permission-create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Gate::authorize('update');
        $isUpdate = RoleUser::find($id)->update($request->all());
        if ($isUpdate) {
            return $this->showfinalresult($isUpdate, 'Yangilandi');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           Gate::authorize('delete');
    }
}
