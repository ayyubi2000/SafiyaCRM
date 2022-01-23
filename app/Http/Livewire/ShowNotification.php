<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Auth;
class ShowNotification extends Component
{
    public $events;
    public $eventCount;

    public function mount()
    {
        $this->events = Notification::whereNull('closed')->where('user_id', Auth::user()->id)->where('reminder_time' ,'<=' , date('Y-m-d'))->where('note_type', 1)->get();
        $this->events = $this->events->merge(Notification::whereNull('closed')->where('note_type', 2)->where('reminder_time' ,'<=' , date('Y-m-d'))->get());

        $this->eventCount = $this->events->count();
    }


    public function render()
    {
        return view('livewire.show-notification');
    }
}
