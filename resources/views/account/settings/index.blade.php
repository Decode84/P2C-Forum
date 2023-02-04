<x-app-layout>
    <main class="container max-w-7xl mx-auto pb-10 lg:py-12 lg:px-8">
        @include('layouts.partials._alert')
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            @include('account.settings.partials._sidebar')
            <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
                <section>
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <x-block>
                            <x-slot name="title">
                                Update Profile
                            </x-slot>
                            <x-slot name="description">
                                We will not share this information with anyone else.
                            </x-slot>
                            <x-slot name="content">
                                <div class="mt-6 flex flex-col gap-6 max-w-4xl">
                                    <div class="col-span-4 sm:col-span-2">
                                        <x-label for="email" :value="__('email')" />
                                        <x-input id="email" name="email" type="email"
                                            value="{{ $user->email }}" class="mt-1 block w-full" />
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <x-label for="bio" :value="__('Bio')" />
                                        <x-textarea id="bio" name="bio" type="text"
                                            value="{{ $user->bio }}" class="mt-1 block w-full">{{ $user->bio }}
                                        </x-textarea>
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <x-label for="discord" :value="__('Discord')" />
                                        <x-input id="discord" name="discord" type="text" value="4141"
                                            class="mt-1 block w-full" />
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <x-label for="location" :value="__('Location')" />
                                        <x-input id="location" name="location" type="text" value="network"
                                            class="mt-1 block w-full" />
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <x-button>
                                        Update info
                                    </x-button>
                                </div>
                            </x-slot>
                        </x-block>
                    </form>
                </section>
                <section>
                    <x-block>
                        <x-slot name="title">
                            Profile Visuals
                        </x-slot>
                        <x-slot name="description">
                            Profile visuals are used to represent you on the site.
                        </x-slot>
                        <x-slot name="content">
                            <div class="mt-5">
                                <form action="{{ route('avatar.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="py-4">
                                        <img class="object-cover  bg-center h-32 w-32 rounded-md"
                                            src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="">
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <x-label for="Choose file" :value="__('avatar')" />
                                        <x-input id="avatar" name="avatar" type="file" value=""
                                            class="mt-1 block w-full" />
                                    </div>
                                    <div class="mt-5">
                                        <x-button>
                                            Update avatar
                                        </x-button>
                                    </div>
                                </form>
                                <form action="{{ route('cover.update') }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="py-4">
                                        <img class="object-cover  bg-center h-32 w-full rounded-md"
                                            src="{{ asset('/storage/covers/' . $user->cover) }}" alt="">
                                    </div>
                                    <div class="col-span-4 sm:col-span-2">
                                        <x-label for="Choose file" :value="__('Cover')" />
                                        <x-input id="cover" name="cover" type="file" value=""
                                            class="mt-1 block w-full" />
                                    </div>
                                    <div class="mt-5">
                                        <x-button>
                                            Update cover
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </x-slot>
                    </x-block>
                </section>
            </div>
        </div>
    </main>
</x-app-layout>
