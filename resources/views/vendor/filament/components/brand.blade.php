@if (filled($brand = config('filament.brand')))
    <div @class([
        'text-x5 font-bold tracking-tight filament-brand',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        {{ $brand }}
    </div>
@endif
