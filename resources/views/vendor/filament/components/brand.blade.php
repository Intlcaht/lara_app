@if (filled($brand = config('filament.brand')))
    <div @class([
        'flex items-center gap-1 text-x5 font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-10">
        {{ $brand }}
    </div>
@endif
