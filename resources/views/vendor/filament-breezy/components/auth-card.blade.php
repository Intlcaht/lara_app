@props(['action'])
<div @class([
    'flex items-center justify-center min-h-screen bg-gray-100 text-gray-900 filament-breezy-auth-component filament-login-page',
    'dark:bg-gray-900 dark:text-white' => config('filament.dark_mode'),
])>

    <x-filament::notification-manager />

    <div
        class="max-w-{{ config('filament-breezy.auth_card_max_w') ?? 'md' }} -mt-16 w-screen space-y-8 px-6 md:mt-0 md:px-2">
        <form wire:submit.prevent="{{ $action }}" @class([
            'p-8 space-y-8 bg-white/50 backdrop-blur-xl border border-gray-200 shadow-2xl rounded-2xl relative filament-breezy-auth-card',
            'dark:bg-gray-900/50 dark:border-gray-700' => config('filament.dark_mode'),
        ])>
            {{ $slot }}
        </form>
        <x-filament::footer />
    </div>
</div>
