<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SkillFeedback;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillFeedbackPolicy
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
        if ($user->can('viewAny skill_feedback')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillFeedback  $skillFeedback
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SkillFeedback $skillFeedback)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('create skill_feedback')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillFeedback  $skillFeedback
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SkillFeedback $skillFeedback)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillFeedback  $skillFeedback
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SkillFeedback $skillFeedback)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillFeedback  $skillFeedback
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SkillFeedback $skillFeedback)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillFeedback  $skillFeedback
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SkillFeedback $skillFeedback)
    {
        //
    }
    public function register(User $user)
    {
        if ($user->can('register skill_feedback')) {
            return true;
        }
    }
}
