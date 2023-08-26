<?php

namespace App\Listeners;

use App\Events\UserLogin;
use App\Models\UserLoggedHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Request;

class LogingHostory
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
    public function handle(UserLogin $event): void
    {
        UserLoggedHistory::create([
            'name'=>$event->user->name,
            'email'=>$event->user->email,
            'ip'=>Request::ip(),
            'user_agent'=> Request::header('User-Agent'),
        ]);
//        $table->string('name');
//        $table->string('email');
//        $table->string('ip');
//        $table->string('user_agent');
    }
}
