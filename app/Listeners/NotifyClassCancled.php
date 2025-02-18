<?php

namespace App\Listeners;

use App\Events\classCanceled;
use App\Mail\ClassCanceledMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyClassCancled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(classCanceled $event): void
    {
        // dd($event) ; 
        $scheduledClass = $event->scheduledClass->student()->get() ; 
        $scheduledClass->each(function($user){
            // send mail
            Mail::to($user)->send(new ClassCanceledMail) ; 
        });
        // dd($scheduledClass);
    }
}
