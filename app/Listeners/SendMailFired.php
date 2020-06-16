<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events;
use App\Registration;
use Mail;
class SendMailFired implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {

        $Event = Events::where('userId',$event->userId)
        ->orderBy('id','dsc')->first();
        $user = Registration::find($event->userId)->toArray();
        $eventdate = date("Y-m-d h:i:s", strtotime("-2 hours",strtotime($Event->event_date)));
        $date =  date("Y-m-d h:i:s");
        if($eventdate == $date ){
            Mail::send('home', $user, function($message) use ($user) {
                $message->to($user['email']);
                $message->subject('Event Testing');
            });
        }
    }
}
