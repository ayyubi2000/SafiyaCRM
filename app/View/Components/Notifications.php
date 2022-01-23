<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Auth;
use App\Models\Notification;
class Notifications extends Component
{
    public $events;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
          $this->events = Notification::where('user_id' , Auth::user()->id)->get();
        $this->events = $this->events->merge(Notification::where('note_type', 2)->get());
               
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications');
    }
}
