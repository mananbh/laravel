<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewPostNotify;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Events;
use App\Events\SendMail;
use Event;
class EventController extends Controller
{
    public function index(Request $request)
    {
      return view("event");
    }
    public function store(Request $request)
    {         
        
       $userid = session('userid');
       Event::fire(new SendMail($userid));

        $Event = new Events;
        $Event->event_name = $request->event_name;
        $Event->location = $request->location;
        $Event->userid   = $userid;
        $Event->event_date =date('Y-m-d h:i:s', strtotime($request->event_date));
        $check = $Event->save();
      
    }
}
