<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Struktur;
use Illuminate\Auth\Access\HandlesAuthorization;

class StrukturPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_struktur');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Struktur $struktur): bool
    {
        return $user->can('view_struktur');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_struktur');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Struktur $struktur): bool
    {
        return $user->can('update_struktur');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Struktur $struktur): bool
    {
        return $user->can('delete_struktur');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_struktur');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Struktur $struktur): bool
    {
        return $user->can('force_delete_struktur');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_struktur');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Struktur $struktur): bool
    {
        return $user->can('restore_struktur');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_struktur');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Struktur $struktur): bool
    {
        return $user->can('replicate_struktur');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_struktur');
    }
}
