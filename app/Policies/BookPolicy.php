<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if a given user can save his book
     * 
     * @param App\Models\User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->role == "AUTHOR";
    }
}
