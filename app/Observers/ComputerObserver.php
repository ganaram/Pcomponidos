<?php
namespace App\Observers;
use App\Computer;
use App\Mail\ComputerCreated;
use Illuminate\Support\Facades\Mail;
class COmputerObserver
{
    /**
     * Handle the computer "created" event.
     * @param  \App\Computer  $computer
     * @return void
     */
    public function created(Computer $computer)
    {
        Mail::to($computer->user->email)->send(
            new ComputerCreated($computer)
        );
    }
}