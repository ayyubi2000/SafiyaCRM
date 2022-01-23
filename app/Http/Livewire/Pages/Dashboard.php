<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Products;
use App\Models\Status;
use App\Models\Addver;

class Dashboard extends Component
{


    public $customersCount;
    public $selled_product_amount;
    public $activeCustomer;
    public $products_count;
    public $purchaseRanking;
    public $customerRanking;
    public $customersByStatusAll;
    public $customersByAddver;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {




        $this->customersCount = Customer::count('id');
        $this->products_count = Products::count('id');
        $this->selled_product_amount = Purchase::sum('amount');
        $this->activeCustomer = Purchase::whereMonth('created_at', '>=', date('m' ,strtotime('first day this month')))->whereMonth('created_at', '>=', date('m' ,strtotime('last day this month')))->get()->groupBy('customer_id')->count();
        $purchaseRankingBasket = [];
        for ($i=1; $i <= 12; $i++) { 
            $purchaseRankingBasket[$i] = Purchase::whereMonth('created_at', $i)->sum('amount');
        }
        $this->purchaseRanking = $purchaseRankingBasket;
        
        $customerRankingBasket = [];
        for ($i=1; $i <= 12; $i++) { 
            $customerRankingBasket[$i] = Customer::whereMonth('created_at', $i)->count();
        }
            $this->customerRanking = $customerRankingBasket;

            //status
            $statuses = Status::get();
            $customersByStatusAll = [];
        foreach ($statuses as $status){

            $nextStatusAmount = Status::where('amount' ,'>' , $status->amount)->min('amount');
           
            $customersByStatus = Customer::where('quantity', '>=', $status->amount);

            if ($nextStatusAmount) {
               $customersByStatus->where('quantity' ,'<=', $nextStatusAmount)->get();
            }
            
            $statusesCustomer = $customersByStatus->count();
            $customersByStatusAll[$status->name] = $statusesCustomer;

        }

        $this->customersByStatusAll = $customersByStatusAll;


        // adverstamaent

        $addverstament = Addver::get();
        $customersByAddverAll = [];
        foreach ($addverstament as $addver){
            $customersAddver = Customer::where('addver_id',  $addver->id)->count();
            $customersByAddverAll[$addver->name] = $customersAddver;
        }
        $this->customersByAddver = $customersByAddverAll;

    }
    public function render()
    {
        return view('livewire.pages.dashboard');
    }
}
