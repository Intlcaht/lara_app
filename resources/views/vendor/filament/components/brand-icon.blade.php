@if (filled($brand = config('filament.brand')))
    <div @class([
        'text-xl font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        <img src="{{ asset('/images/logo.png') }}" alt="Icon" class="h-full w-full object-contain" />
    </div>
@endif
