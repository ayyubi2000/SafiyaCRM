<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    public array $vars;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function __construct($vars)
    {
        $this->vars = $vars;
    }

    public function render()
    {
        return view('layouts.app');
    }
}
