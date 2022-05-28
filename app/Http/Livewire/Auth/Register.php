<?php

namespace App\Http\Livewire\Auth;

use App\Models\Registration;
use App\Utils\HttpCode;
use Livewire\Component;

class Register extends Component
{
    public Registration $registration;
    function __construct()
    {
        $this->registration = new Registration();
    }
    public function register()
    {
        dd($this->registration);
        $registration = $this->authService->register($$this->registration);
        if(isset($registration))
        {
            return fractal($registration);
        }

        else return response('Credentials already registered', HttpCode::FOUND);
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
