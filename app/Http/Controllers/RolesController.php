<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
class RolesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return $this->render('roles'); //this is dynamic component
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        Gate::authorize('create');

        return $this->render('role-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('create');
        $validated = $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

         $isUpdate = Role::create($request->all());
        if ($isUpdate) {
            return $this->showfinalresult($isUpdate, 'Saqlandi');
        }    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('update');
        $this->vars['role'] = $role;
        return $this->render('role-create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        Gate::authorize('update');
        $validated = $request->validate([
        'name' => 'required',
        ]);

        $isUpdate = $role->update($request->all());
        if($isUpdate){
            return $this->showfinalresult($isUpdate, 'Saqlandi');
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
        $isUpdate = Role::findOrFail($id)->delete();
         return $this->showfinalresult($isUpdate, '  Tozalandi');
    }
}
