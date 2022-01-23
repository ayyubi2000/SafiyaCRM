<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $vars = [];
    
    public function render($page)
    {
        return view('layouts.app',['vars' => $this->vars])->withPage($page);
    }

    public function showfinalresult($isUpdate, $message)
    {
        if ( $isUpdate ) {
            return redirect()->back()->with(['status' => 'success', 'message' => $message]);
        }else{
            return redirect()->back()->with(['status' => 'danger', 'message' => "hatolar mavjud !"]);    
        }
    }
}
