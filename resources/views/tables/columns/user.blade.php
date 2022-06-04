<div @class([
    'flex items-center gap-1 text-x5 font-bold tracking-tight filament-brand',
    'dark:text-white' => config('filament.dark_mode'),
])>
    @isset($getState()->profile_photo)
        <img src="{{ $getState()->profile_photo }}" alt="profile_pic" class="h-10">
    @endisset
    <p>{{ $getState()->first_name }}</p>
    <p>{{ $getState()->last_name }}</p>
    {{-- {{ $getState() }} --}}
</div>
