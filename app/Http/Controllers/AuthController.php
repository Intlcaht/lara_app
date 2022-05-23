<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Libraries\AuthService;
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
        return fractal($registration);
    }
}
