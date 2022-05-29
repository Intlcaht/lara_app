<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\CredentialsAlreadyRegistered;
use App\Libraries\Auth\AuthService as BaseAuthService;
use App\Models\Registration;
use App\Models\User;
use App\Repositories\Auth\RegistrationRepository;
use App\Repositories\Auth\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService implements BaseAuthService
{
    private RegistrationRepository $registrationRepository;
    private UserRepository $userRepository;
    function __construct(RegistrationRepository $registrationRepository,
    UserRepository $userRepository)
    {
        $this->registrationRepository = $registrationRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Undocumented function
     *
     * @param Registration $registration
     * @return Registration|null
     * @throws CredentialsAlreadyRegistered
     */
    public function register(Registration $registration): ?Registration
    {
        $res = Registration::where([
            Registration::EMAIL => $registration->email,
            Registration::PASSWORD => $registration->password
        ])->first();
        if(isset($res)) {
           throw new CredentialsAlreadyRegistered();
        }
        $registration->u_id = uniqid('REG');
        $registration->save();
        return $registration;
    }

    public function loginBasic($username, $password): ?User
    {
        $user = Auth::attempt([$username, $password]);
        return $user;
    }
}
