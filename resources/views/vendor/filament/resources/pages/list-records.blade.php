<x-filament::page class="filament-resources-list-records-page">
    {{-- @if ($widgets = \Filament\Facades\Filament::getWidgets())
        <x-filament::widgets :widgets="$widgets" />
    @endif --}}
    {{ $this->table }}
</x-filament::page>
