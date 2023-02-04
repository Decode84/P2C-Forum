<x-guest-layout>
    <main class="container mx-auto max-w-lg">
        <img class="mx-auto py-10 h-56 w-full object-cover bg-center"
            src="https://64.media.tumblr.com/620a5a102da33d33085c997a54bc66db/tumblr_ogl33qmAdF1up42jgo1_540.gifv"
            alt="">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <x-block>
                <x-slot name="title">
                    Registration
                </x-slot>
                <x-slot name="description">
                    We will not share this information with anyone else.
                </x-slot>
                <x-slot name="content">
                    <div class="flex flex-col mt-4">

                        <x-label for="username" :value="__('Username')" />
                        <x-input type="text" id="username" name="username" value="{{ old('username') }}"
                            class="mb-4" />

                        <x-label for="email" :value="__('Email')" />
                        <x-input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="mb-4" />

                        <x-label for="password" :value="__('Password')" />
                        <x-input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="mb-4" />

                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input type="password" id="password_confirmation" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" class="mb-4" />

                        <x-label for="invite" :value="__('Invite')" />
                        <x-input type="text" id="invite" name="invite" value="{{ old('invite') }}"
                            class="mb-4" />

                        <div class="pt-4 flex">
                            <x-button class="w-full">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                        <a href="{{ route('login') }}" class="text-indigo-500 text-sm pt-4">Already have an account?</a>
                    </div>
                </x-slot>
            </x-block>
        </form>
    </main>
</x-guest-layout>
