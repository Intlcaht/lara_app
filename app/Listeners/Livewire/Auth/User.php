<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Base\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasAvatar, HasName
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, '@intlcaht.com') && $this->hasVerifiedEmail();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->user_profile->photo_url;
    }

    public function getFilamentName(): string
    {
        $profile = $this->user_profile;
        return "{$profile->first_name} {$profile->last_name}";
    }

    public function getProfilePhotoUrlAttribute()
    {
        return 'user_profile.photo_url';
    }

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at != null;
    }

    public function markEmailAsVerified()
    {
        $this->email_verified_at = Carbon::now();
        $this->save();
    }

    public function sendEmailVerificationNotification()
    {
    }

    public function getEmailForVerification()
    {
        return $this->email;
    }
}
