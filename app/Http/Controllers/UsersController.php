<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->render('users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create');
        return $this->render('users-create');
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
        'email' => 'required|unique:users,email|email',
        'name' => 'required',
        'number' => 'required|digits:12|unique:users,number|numeric',
        'password' => 'required|min:5',
        ]);
        $hashing = Hash::make($request->password);
            $request->password  = $hashing;
       
        if($hashing){
             $isUpdate = User::create([
                 'password' => $hashing,
                 'email' => $request->email,
                 'name' => $request->name,
                 'number' => $request->number,
                 ]);
            if ($isUpdate) {
                return $this->showfinalresult($isUpdate, 'Saqlandi');
            } 
        }
        else{
              return $this->showfinalresult($isUpdate, 'Hashlamadi');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         Gate::authorize('update');
        $this->vars['user'] = $user;
        return $this->render('users-create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update');
        $validated = $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'number' => 'required|digits:12|numeric',
        'password' => 'required|min:5',
        ]);
         $hashing = Hash::make($request->password);
           
       
        if($hashing){
             $isUpdate = User::create([
                 'password' => $hashing,
                 'email' => $request->email,
                 'name' => $request->name,
                 'number' => $request->number,
                 ]);
        
        if($isUpdate){
            return $this->showfinalresult($isUpdate, 'Saqlandi');
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete');
         $isDeleted = $user->delete();

        if ( $isDeleted ) {
             return $this->showfinalresult($isDeleted, $user->name . '  Tozalandi');
        }
    }
    
}
