<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Gate;
class NotificationController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->render('notifications');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create');
        return $this->render('notification-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Gate::authorize('create');
        $validated = $request->validate([
        'note' => 'required',
        'note_type' => 'required',
        'user_id' => 'required',
        'reminder_time' => 'required',
        ]);

         $isUpdate = Notification::create([
            'note' => $request->note,
            'note_type' => $request->note_type,
            'user_id' =>  $request->user_id,
            'reminder_time' => $request->reminder_time,
         ]);
        
        if ($isUpdate) {
            return $this->showfinalresult($isUpdate, 'Saqlandi');
        }    


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        Gate::authorize('update');
        $this->vars['notification'] = $notification;
        return $this->render('notification-create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
       Gate::authorize('update');
        $validated = $request->validate([
        'note' => 'required',
        'note_type' => 'required',
        'user_id' => 'required',
        'reminder_time' => 'required',
        ]);

         if (!$request->input('close') == null) {
            $isUpdate = $notification->update([
                'note' => $request->note,
                'note_type' => $request->note_type,
                'user_id' =>  $request->user_id,
                'reminder_time' => $request->reminder_time,
                'answear' => $request->answear ?? null,
                'closed' =>  'closed',
             ]);

            if($isUpdate){
                return $this->showfinalresult($isUpdate, 'Yoildi');
            }
        }else { 

               $isUpdate = $notification->update([
                'note' => $request->note,
                'note_type' => $request->note_type,
                'user_id' =>  $request->user_id,
                'reminder_time' => $request->reminder_time,
                'answear' => $request->answear ?? null,
             ]);

            if($isUpdate){
                return $this->showfinalresult($isUpdate, 'Saqlandi');
            }
        } 
       
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
          Gate::authorize('delete');
        $isDeleted = $notification->delete();
        if ( $isDeleted ) {
             return $this->showfinalresult($isDeleted, $notification->name . '  Tozalandi');
        }
    }
}
