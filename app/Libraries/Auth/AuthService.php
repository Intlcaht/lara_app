<?php

namespace App\Libraries\Auth;

use App\Models\Registration;
use App\Models\User;

/**
 * Undocumented interface
 */
interface AuthService
{
    /**
     * Undocumented function
     *
     * @param Registration $registration
     * @return Registration|null
     */
    function register(Registration $registration): ?Registration;
    /**
     * Undocumented function
     *
     * @param [type] $username
     * @param [type] $password
     * @return User|null
     */
    function loginBasic($username, $password): ?User;
}
