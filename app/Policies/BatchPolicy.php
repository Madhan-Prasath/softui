<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Batch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchPolicy
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
        if($user->can('viewAny batches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Batch $batch)
    {
        if($user->can('view batches')) {
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
        if($user->can('create batches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Batch $batch)
    {
        if($user->can('edit batches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Batch $batch)
    {
        if($user->can('delete batches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Batch $batch)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Batch $batch)
    {
        //
    }
}
