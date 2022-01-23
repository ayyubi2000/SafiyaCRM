<?php

namespace App\Http\Livewire;

use App\Support\SMS;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Note;
use App\Models\Status;
use Auth;
use Illuminate\Support\Facades\Gate;


class CustomerModal extends Component
{

    public $customer ;
    public $activeTab = "purchaseList"; 
    public $noteText; 
    public $smsText; 

    public $status;

  

    public function openPurchaseListTab()
    {
        $this->activeTab == 'purchaseList'  ? $this->activeTab = "" : $this->activeTab = 'purchaseList';
    }


    public function openNoteListTab()
    {
        $this->activeTab == 'noteList'  ? $this->activeTab = "" : $this->activeTab = 'noteList';
    }

    public function openSmsListTab()
    {
        $this->activeTab == 'smsList'  ? $this->activeTab = "" : $this->activeTab = 'smsList';
    }


    public function openNoteTab()
    {
        $this->activeTab == 'note'  ? $this->activeTab = "" : $this->activeTab = 'note';
    }
    

    public function openSmsTab()
    {
        $this->activeTab == 'sms'  ? $this->activeTab = "" : $this->activeTab = 'sms';
    }



    public function render()
    {
        return view('livewire.customer-modal');
    }



    public function sendMessage()
    {

        if (Gate::denies('sms')) {
            return $this->emit('showSweetAlert' ,'danger' ,'Sizda huquq yo\'q');
        }

        $this->activeTab = 'sms';

        if (empty($this->smsText)) {
            return $this->emit('showSweetAlert', 'warning' , ' Habarni kiritng ');
        }

        if (SMS::send($this->smsText, $this->customer->number) == 'Request is received') {
            $this->emit('showSweetAlert', 'success' ,'Habar jo\'natildi');
            
            $this->smsText = '';
        }
        $this->fillCustomerID($this->customer);
    }


    public function noteSave()
    {
        $this->activeTab = 'note';

        if (empty($this->noteText)) {
            return $this->emit('showSweetAlert', 'warning' , 'Eslatma  kiritng ');
        }

        $isCreate = Note::create([
            'text' => $this->noteText,
            'customer_id' => $this->customer->id,
            'user_id' => Auth::user()->id,
        ]);
        
        if ($isCreate) {
            $this->noteText = "";
             $this->emit('showSweetAlert', 'success' , 'Eslatma Saqlandi');
        }else{
            return $this->emit('showSweetAlert', 'danger', 'texnik hatolik +998911403115' );
        }
        $this->fillCustomerID($this->customer->id);
        
    }



    public function noteDelete($id)
    {
        $isDelete = Note::find($id)->delete();
        
        if ($isDelete) {
            $this->fillCustomerID($this->customer->id);
            return $this->emit('showSweetAlert', 'success' , 'Malumot  o\'chirildi');
        }else{
           return $this->emit('showSweetAlert', 'danger' , 'tehnik hatolik +998911403115');
        }
    }


    public function getStatus($customer)
    {
        
        $customersByStatus = Status::where('amount', '<', $customer->quantity);

       $this->status =  $customersByStatus->first();

    }


    public function fillCustomerID($customer)
    {
        $customered = Customer::find($customer);
        $this->customer = $customered;
        $this->getStatus($customered);
    }
    

}
