<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;

class MessagePolicy
{
    public function edit(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
    public function delete(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}
