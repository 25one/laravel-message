<?php

namespace App\Policies;

use App\Models\ {User, Apimessage};

class ApimessagePolicy extends Policy
{
    /**
     * Determine whether the user can manage the comment.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Apimessage $message
     * @return mixed
     */
    public function manage(User $user, Apimessage $message)
    {
        return $user->id === $message->user_id;
    }
}
