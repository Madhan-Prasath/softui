<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SkillCourse;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillCoursePolicy
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
        if ($user->can('viewAny skill_courses')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillCourse  $skillCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SkillCourse $skillCourse)
    {
        if ($user->can('view skill_courses')) {
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
        if ($user->can('create skill_courses')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillCourse  $skillCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SkillCourse $skillCourse)
    {
        if ($user->can('edit skill_courses')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillCourse  $skillCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SkillCourse $skillCourse)
    {
        if ($user->can('delete skill_courses')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillCourse  $skillCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SkillCourse $skillCourse)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillCourse  $skillCourse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SkillCourse $skillCourse)
    {
        //
    }
}
