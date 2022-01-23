<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Addver;
use App\Models\Status;


class AdverstementCreate extends Component
{
    public $addvers;
    public $newAddver;
    public $newStatus;
    public $statusAmount;
    public $statuses;

    public function mount()
    {
        $this->addvers = Addver::get();
        $this->statuses = Status::get();
    }


    public function adverCreate()
    {
        Addver::create([
            "name" => $this->newAddver,
        ]);

        $this->mount();
    }


    public function addverDelete($id)
    {
        Addver::find($id)->delete();
         $this->mount();
    }



    public function statusCreate()
    {
        Status::create([
            "name" => $this->newStatus,
            "amount" => $this->statusAmount,
        ]);
        $this->mount();
    }


    public function statusDelete($id)
    {
        Status::find($id)->delete();
         $this->mount();
    }


    public function render()
    {
        return view('livewire.adverstement-create');
    }
}
