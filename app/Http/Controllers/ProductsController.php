<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Gate;
class ProductsController extends Controller
{
    
    // public function __construct()
    // {
       
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return $this->render('product'); //this is dynamic component
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        Gate::authorize('create');

        return $this->render('product-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->flash();
        Gate::authorize('create');
        $validated = $request->validate([
            'name' => 'required|unique:products,name'
        ]);

         $isUpdate = Products::create($request->all());
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
    public function edit($id)
    {
       Gate::authorize('update');
         $products = Products::find($id);
        $this->vars['products'] = $products;
        return $this->render('product-create');
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
        Gate::authorize('update');
        $products = Products::find($id);
        $isUpdate = $products->update($request->all());
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
        $isUpdate = Products::findOrFail($id)->delete();
         return $this->showfinalresult($isUpdate, '  Tozalandi');
    }
}
