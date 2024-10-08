<div {{ $attributes->merge($getExtraAttributes())->class(['px-4 py-3 filament-tables-image-column']) }}>
    @if ($path = $getImagePath())
        @if ($isRounded())
            <div
                class="rounded-full bg-center bg-cover"
                style="
                    background-image: url('{{ addslashes($path) }}');
                    height: {{ $getHeight() ?? '40px' }};
                    width: {{ $getWidth() ?? '40px' }};
                "
            ></div>
        @else
            <img
                src="{{ $path }}"
                style="
                    {!! ($height = $getHeight()) !== null ? "height: {$height};" : null !!}
                    {!! ($width = $getWidth()) !== null ? "width: {$width};" : null !!}
                "
                {{ $getExtraImgAttributeBag() }}
            >
        @endif
    @endif
</div>
