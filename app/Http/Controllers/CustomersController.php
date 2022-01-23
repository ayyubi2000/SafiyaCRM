<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Status;
use Illuminate\Support\Facades\Gate;
use App\Support\SMS;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->vars['customers'] = Customer::orderByDesc('id')->get();
        return $this->render('customers');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('create');
        return $this->render('customer-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required',
        'number' => 'required|digits:12|unique:customers,number|numeric',
        'birthday' => 'required',
        'addver_id' => 'required',
        ]);
         $isUpdate = Customer::create([
            'name' => $request->name,
            'number' => $request->number,
            'birthday' => $request->birthday,
            'user_id' => $request->user()->id,
            'addver_id' => $request->addver_id,
         ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        Gate::authorize('update');
        $this->vars['customer'] = $customer;
        return $this->render('customer-create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        Gate::authorize('update');
        $validated = $request->validate([
        'name' => 'required',
        'number' => 'required|digits:12',
        'birthday' => 'required',
        'addver_id' => 'required',
        ]);

        $isUpdate = $customer->update([
            'name' => $request->name,
            'number' => $request->number,
            'birthday' => $request->birthday,
            'user_id' => $request->user()->id,
            'addver_id' => $request->addver_id,
        ]);

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
    public function destroy(Customer $customer)
    {
        Gate::authorize('delete');
        $isDeleted = $customer->delete();
        return $this->showfinalresult($isDeleted, ' Tozalandi');
    }



    public function activeCustomer()
    {
        $date = date('Y-m-d', strtotime(' -1 months'));
        $activeCustomer = Purchase::whereDate('created_at' , '>=', $date )->get()->groupBy('customer_id');
        $customers = [];
        $i = 0;
        foreach($activeCustomer as $active){
           $customers[$i++] = $active[0]->customer;
        }
        $this->vars['customers'] = $customers;
        return $this->render('customers');
    }



    public function getByStatus($statusAmount)
    {   
       $nextStatusAmount = Status::where('amount' ,'>' , $statusAmount)->min('amount');
       
        $customersByStatus = Customer::where('quantity', '>=', $statusAmount);

        if ($nextStatusAmount) {
           $customersByStatus->where('quantity' ,'<=', $nextStatusAmount)->get();
        }

       $customer = $customersByStatus->get();


        $this->vars['customers'] = $customer;
        return $this->render('customers');
    }



    public function getByAddverstament($addverstamentType)
    {
        $customersByStatus = Customer::where('addver_id',  $addverstamentType)->get();
        $this->vars['customers'] = $customersByStatus;
        return $this->render('customers');
    }



    public function sendSms()
    {
       
        if (Gate::denies('sms')) {
            return redirect()->back()->with(['status' => 'danger', 'message' => 'Sizda Habar junatish uchun huquq yuq']);
        }


        if (empty($request->smsText)) {
            return redirect()->back()->with(['status' => 'danger', 'message' => 'Habar kiritmadingiz']);
        }

        if ($request->activeOrAll) {
            $dataCustomer = Customer::get();
        }else{
             $date = date('Y-m-d', strtotime(' -1 months'));
            $activeCustomer = Purchase::whereDate('created_at' , '>=', $date )->get()->groupBy('customer_id');
            $customers = [];
            $i = 0;
            foreach($activeCustomer as $active){
               $customers[$i++] = $active[0]->customer;
            }

            $dataCustomer = $customers;
        }
        if (SMS::sendAll($dataCustomer) == 'Request is received') {
            return redirect()->back()->with(['status' => 'success', 'message' => 'Habar yuborildi']);
        }
    }
}
