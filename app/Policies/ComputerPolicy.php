<?php

namespace App\Policies;

use App\User;
use App\Computer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComputerPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if( $user->id == 2 ) return true;
    }
    
    /**
     * Determine whether the user can update the computer.
     *
     * @param  \App\User  $user
     * @param  \App\Computer  $computer
     * @return mixed
     */
    public function touch(User $user, Computer $computer)
    {
        return $computer->user_id == $user->id || $user->id == 2;
    }
}
