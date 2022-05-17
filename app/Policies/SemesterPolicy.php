<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Semester;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemesterPolicy
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
        if ($user->can('viewAny semesters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Semester $semester)
    {
        if ($user->can('view semesters')) {
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
        if ($user->can('create semesters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Semester $semester)
    {
        if ($user->can('edit semesters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Semester $semester)
    {
        if ($user->can('delete semesters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Semester $semester)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Semester $semester)
    {
        //
    }
}
