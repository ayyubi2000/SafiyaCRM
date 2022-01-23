<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\Customer;
use App\Models\Purchase;
use Auth;

class PurchaseCreate extends Component
{

    public $customer;        
    public $customerSearch;        
    public $customerError; 
    public $amount;
    public string $date;
    public $product;
    public array $productsBag;
    public int $savedCount;
    public $statusAmount;


    protected  $rules = [
        'customer' => 'required',
    ];
  

    public function addProduct()
    {
         
        if (empty($this->product['id'])) {
            return;
        }
        $hasProduct = Products::find($this->product['id']);
        if ($hasProduct->amount >= $this->amount) {
            if(isset($this->productsBag[$this->product['id']])) {

                $this->productsBag[$this->product['id']]['amount'] += $this->amount;

            } else {
               
                    $this->productsBag[$this->product['id']] = [
                        'amount' => $this->amount,
                        'name' => $this->product['label'],
                        'cost' => $this->product['cost'],
                        'id' => $this->product['id'],
                    ];
                }
        } else {
               $this->addError('email', $hasProduct->name. ' yetarli emas '. $hasProduct->amount. ' ta qoldi');
        }
    }



    public function render()
    {
        return view('livewire.purchase-create');
    }

    public function deleteProduct($productId)
    {
        unset($this->productsBag[$productId]);
    }


    public function getCustomer()
    {
        $customer = Customer::where('card_number', $this->customerSearch)
            ->orWhere('name', 'like','%'.$this->customerSearch.'%')
            ->first();
            if ($customer) {
                $this->customer = $customer;
                $this->customerError = "";
            }else{
                $this->customer = null;
                $this->customerError = "Notog'ri malumot kiritildi";
            }
    }

    public function save()
    {
        if ($this->productsBag && $this->customer) {
            $statusAmount = 0;
            foreach ($this->productsBag as $productData) {
               $hasProduct = Products::find($productData['id']);
                if ($hasProduct->amount >= $productData['amount']) {
                    $hasProduct->decrement('amount', $productData['amount']);
                    $model = Purchase::create([
                    'customer_id' => $this->customer->id,
                    'user_id' => Auth::user()->id,
                    'product_id' => $productData['id'],
                    'amount' => $productData['amount'],
                    'PurchaseCost' => $productData['amount'] * $productData['cost'],
                 ]);
                $statusAmount += $productData['amount'] * $productData['cost'];
                }else{
                    $this->addError('email', $hasProduct->name. ' yetarli emas '. $hasProduct->amount. ' qoldi');
                }
              
            }

            $this->addToAllCost($statusAmount);

            if ($model) {
                $this->emit('showSweetAlert', "success" , 'Saqlandi');
                $this->setVars();
            }else {
                $this->emit('showSweetAlert', "danger" , 'Hatolik bor biz bilan bog\'laning  + 998911403115');
            }
            return;
        }

       $this->emit('showSweetAlert', "danger" , 'Mijozni kiriting');
        $this->validate();
    }

    public function addToAllCost($amount)
    {
        Customer::where('id', $this->customer->id)->increment('quantity', $amount);
    }


    private function setVars()
    {
        $this->customer = null;
        $this->amount = 1;
        $this->product = null;
        $this->productsBag = [];
        $this->savedCount = 0;
    }

}
