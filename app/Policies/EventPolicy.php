<?php

namespace App\Policies;

use App\User;
use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $event)
    {
        return $event->project->isUserCanRead($user);
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Event  $event
     * @return mixed
     */
    public function update(User $user, Event $event)
    {
        return $event->project->isUserCanUpdate($user);
    }
}
