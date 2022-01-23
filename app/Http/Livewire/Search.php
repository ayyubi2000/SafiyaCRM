<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class Search extends Component
{

    public string $searchText;

    public function mount()
    {
        $this->searchText = '';
    }

    public function search()
    {
        if (!empty( $this->searchText)) {
            $customer = Customer::where('card_number', $this->searchText)->orWhere('name', 'like' , '%'.$this->searchText.'%')->first();
        }

        if (empty($customer)) {
            return $this->emit('showSweetAlert','danger', 'mijoz topilmadi');
        }else{
            $this->emit('showCustomerModal', $customer->id);
        }
        
        $this->searchText = '';
    }


    public function render()
    {
        return view('livewire.search');
    }

}
