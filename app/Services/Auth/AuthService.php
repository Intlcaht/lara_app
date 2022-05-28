<?php

namespace App\Services\Auth;

use App\Libraries\AuthService as BaseAuthService;
use App\Models\Registration;
use App\Models\User;
use App\Repositories\Auth\RegistrationRepository;
use App\Repositories\Auth\UserRepository;
use App\Utils\HttpCode;
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
    public function register(Registration $registration): ?Registration
    {
        $res = Registration::where([
            Registration::EMAIL => $registration->email,
            Registration::PASSWORD => $registration->password
        ])->first();
        if(isset($res)) {
           return null;
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
