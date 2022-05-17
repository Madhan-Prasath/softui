<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Academic_Year;
use Illuminate\Auth\Access\HandlesAuthorization;

class Academic_YearPolicy
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
        if($user->can('viewAny academic_years')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Academic_Year  $academicYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Academic_Year $academicYear)
    {
        if($user->can('view academic_years')) {
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
        if($user->can('create academic_years')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Academic_Year  $academicYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Academic_Year $academicYear)
    {
        if($user->can('edit academic_years')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Academic_Year  $academicYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Academic_Year $academicYear)
    {
        if($user->can('delete academic_years')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Academic_Year  $academicYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Academic_Year $academicYear)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Academic_Year  $academicYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Academic_Year $academicYear)
    {
        //
    }
}
