<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Products;
use Illuminate\Support\Facades\Gate;
class PurchasesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->render('purchases');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         Gate::authorize('create');
        return $this->render('purchase-create');
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
        Hash::make($request->password);
         $isUpdate = User::create($request->all());
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
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        Gate::authorize('update');
        // $this->vars['purchase'] = $purchase;
        // return $this->render('users-create');
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
        // Gate::authorize('update');
        // $validated = $request->validate([
        // 'email' => 'required|email',
        // 'name' => 'required',
        // 'number' => 'required|digits:12|numeric',
        // 'password' => 'required|min:5',
        // ]);

        // $isUpdate = $user->update($request->all());
        // if($isUpdate){
        //     return $this->showfinalresult($isUpdate, 'Saqlandi');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        Gate::authorize('delete');
         $isDeleted = $purchase->delete();
        if ( $isDeleted ) {
             return $this->showfinalresult($isDeleted, $purchase->name . '  Tozalandi');
        }
    }

    public function autocomplete(Request $request)
    {
        $input = $request->all();

        $data = Products::where("name","LIKE","%{$input['query']}%")
            ->take(10)->get();
   
        $products = [];
      
        if(count($data) > 0){

            foreach($data as $product){
                $products[] = array(
                    "id" => $product->id,
                    "label" => $product->name,
                    "cost" => $product->cost,
                );
            }
        }        
        return response()->json($products);
    }
}
