<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Libraries\Auth\AuthService;
use App\Utils\HttpCode;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;
    function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function register(AuthRegisterRequest $authRegisterRequest)
    {
        $registration = $this->authService->register($authRegisterRequest->body());
        if(isset($registration))
        return fractal($registration);
        else return response('Credentials already registered', HttpCode::FOUND);
    }
}
