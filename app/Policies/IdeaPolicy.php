<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
//    /**
//     * Determine whether the user can view the model.
//     */
//    public function view(User $user, Idea $idea): bool
//    {
//        return false;
//    }
//
//    /**
//     * Determine whether the user can create the model.
//     */
//    public function create(User $user): bool
//    {
//        return $user->isAdmin();
//    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Idea $idea): bool
    {
//        return $user->id === $idea->user_id ? Response::allow() : Response::denyAsNotFound();

//        return $user->id === $idea->user_id;

          return $user->is($idea -> user);

    }
}
