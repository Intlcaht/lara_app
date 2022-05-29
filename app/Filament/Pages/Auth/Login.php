<?php

namespace App\Filament\Pages\Auth;

// use Filament\Http\Livewire\Auth\Login as BaseLoginPage;
use Yepsua\Filament\Forms\Components\Captcha;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Login as BaseLoginPage;
class Login extends BaseLoginPage
{
    protected function getFormSchema(): array
    {
        $formSchema = parent::getFormSchema();
        $formSchema[] = Captcha::make('captcha');

        return $formSchema;
    }
}
