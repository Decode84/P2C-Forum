<x-guest-layout>
    <div class="py-24">
        <main class="mx-auto max-w-lg">
            @include('layouts.partials._alert')
            <form action="{{ route('auth.authenticate') }}" method="POST">
                @csrf
                <x-block class="bg-pal-4">
                    <x-slot name="title">
                        Authentication
                    </x-slot>
                    <x-slot name="description">

                    </x-slot>
                    <x-slot name="content">
                        <div class="flex flex-col mt-4">
                            <x-label for="username" :value="__('Username')" />
                            <x-input type="text" id="username" name="username" value="{{ old('username') }}"
                                class="mb-4" />
                            <x-label for="password" :value="__('Password')" />
                            <x-input type="password" id="password" name="password" value="{{ old('password') }}"
                                class="mb-4" />
                            <div class="pt-4 flex">
                                <x-button class="w-full">
                                    {{ __('Login') }}
                                </x-button>
                            </div>
                            <a href="{{ route('auth.register') }}" class="text-indigo-500 text-sm pt-4">Don't have an
                                account?</a>
                        </div>
                    </x-slot>
                </x-block>
            </form>
        </main>
    </div>
</x-guest-layout>
