<?php

namespace App\Filament\Pages\Auth;

use App\Libraries\Auth\AuthService;
use App\Models\Registration;
use Filament\Facades\Filament;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Yepsua\Filament\Forms\Components\Captcha;

class Register extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $captcha;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $initials;
    public $password;
    public $password_confirm;
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = App::make(AuthService::class);
    }

    public function mount()
    {
        if (Filament::auth()->check()) {
            return redirect(config("filament.home_url"));
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make()->schema([
                Forms\Components\Grid::make()->schema([
                    Forms\Components\TextInput::make('first_name')
                        ->label(__('auth.First_Name'))
                        ->required(),
                    Forms\Components\TextInput::make('last_name')
                        ->label(__('auth.Last_Name'))
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->label(__('filament-breezy::default.fields.email'))
                        ->required()
                        ->email()
                        ->unique(table: config('filament-breezy.user_model')),
                    Forms\Components\TextInput::make('phone_number')
                        ->label(__('auth.Phone_Number'))
                        ->required()
                        ->numeric()
                        ->unique(table: config('filament-breezy.user_model')),
                ])->columns(2),
                Forms\Components\Grid::make()->schema([
                    Forms\Components\TextInput::make('password')
                        ->label(__('filament-breezy::default.fields.password'))
                        ->required()
                        ->password()
                        ->rules(config('filament-breezy.password_rules')),
                    Forms\Components\TextInput::make('password_confirm')
                        ->label(__('filament-breezy::default.fields.password_confirm'))
                        ->required()
                        ->password()
                        ->same('password'),
                    Forms\Components\Radio::make('initials')
                        ->label(__('auth.Initials'))
                        ->options([
                            'MR' => 'MR',
                            'MRS' => 'MRS',
                            'SIR' => 'SIR',
                            'MADAM' => 'MADAM'
                        ])
                        ->required(),
                    Captcha::make('captcha'),
                ])->columns(2),
            ]),
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => __('filament-breezy::default.registration.notification_unique'),
            'phone_number.unique' => __('filament-breezy::default.registration.notification_unique'),
        ];
    }

    protected function prepareModelData($data): Registration
    {
        $reg =  new Registration();
        $reg->email = $data['email'];
        $reg->phone_number = $data['phone_number'];
        $reg->first_name = $data['first_name'];
        $reg->last_name = $data['last_name'];
        $reg->password = Hash::make($data['password']);
        return $reg;
    }

    public function register()
    {

        $res = $this->authService->register($this->prepareModelData($this->form->getState()));

        if (isset($res)) {
            $this->notify('success', __('Kindly verify your email or phone number'));
        } else {
            // event(new Registered($user));
            // Auth::login($user, true);
            return redirect()->to(config('filament-breezy.registration_redirect_url'));
            $this->notify('error', __('Credentials already registered'));
        }
    }

    public function render(): View
    {
        $view = view('filament-breezy::register');

        $view->layout('filament::components.layouts.base', [
            'title' => __('filament-breezy::default.registration.title'),
        ]);

        return $view;
    }
}
