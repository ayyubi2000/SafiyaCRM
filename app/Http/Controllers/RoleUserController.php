<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Gate;
class RoleUserController extends Controller
{
     public function index()
    {
        return $this->render('role-users'); //this is dynamic component
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        Gate::authorize('create');

        return $this->render('role-user-create');
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

         $isUpdate = RoleUser::create($request->all());
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
    public function edit(RoleUser $RoleUser)
    {
       Gate::authorize('update');
        $this->vars['RoleUser'] = $RoleUser;
        return $this->render('role-user-create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleUser $RoleUser)
    {
        Gate::authorize('update');
        $isUpdate = $RoleUser->update($request->all());
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
        $isUpdate = RoleUser::findOrFail($id)->delete();
         return $this->showfinalresult($isUpdate, '  Tozalandi');
    }
}
