<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Addver;
class CustomerCreate extends Component
{

    public $customer;
    public $cardNumber;
    public $addvers;
    public $addverId;


    public function mount($customer)
    {
        $this->customer = $customer ?? null;
        $this->addvers = Addver::get();
    }

    public function getCardNumber()
    {
        $cardNumber = Customer::max('card_number');
        $this->cardNumber = $cardNumber + 1;
    }

    public function render()
    {
        return view('livewire.customer-create');
    }
}
