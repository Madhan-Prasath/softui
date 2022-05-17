<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Mentor;
use Illuminate\Auth\Access\HandlesAuthorization;

class MentorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->can('viewAny mentors')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Mentor $mentor)
    {
        if ($user->can('view mentors')) {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('create mentors')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mentor $mentor)
    {
        if ($user->can('edit mentors')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mentor $mentor)
    {
        if ($user->can('delete mentors')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Mentor $mentor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Mentor $mentor)
    {
        //
    }
}
