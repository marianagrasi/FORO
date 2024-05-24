<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;

class ThreadPolicy
{
    public function update(User $user, Thread $thread )
    {
        //responde a true o false
        return $user->id === $thread->user_id;
    }
}
