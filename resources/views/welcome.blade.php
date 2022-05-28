<x-guest-layout>
    <x-slot name="header">
        <div class="w-full flex justify-between content-center items-center">
            <ul class="hidden px-6 sm:block">
                <li>
                    <div class="flex items-center">
                        <img src="" alt="logo" class="mx-2 rounded-2xl"/>
                        <a href="{{ url('/') }}"
                    class="text-lg text-blue-500 dark:text-gray-500">IntlCaht</a>
                    </div>
                </li>
            </ul>
            @if (Route::has('login'))
                <div class="hidden px-6  sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </x-slot>

    <div class="py-12">

    </div>
</x-guest-layout>
