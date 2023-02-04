<nav x-data="{ open: false }" class="bg-pal-4 border-b border-neutral-800 shadow-md">
    <div class="container mx-auto ">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="space-x-8 sm:-my-px flex">
                    @auth
                        <a class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-neutral-100 hover:text-neutral-300"
                            href="{{ route('forum.index') }}">
                            <svg class="w-4 h-4 items-center mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z"
                                    clip-rule="evenodd" />
                            </svg>
                            Dashboard
                        </a>
                    @endauth

                    @can('view panel')
                        <a class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-neutral-100 hover:text-neutral-300"
                            href="#">
                            <svg class="w-4 h-4 items-center mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.5 9.75a6 6 0 0111.573-2.226 3.75 3.75 0 014.133 4.303A4.5 4.5 0 0118 20.25H6.75a5.25 5.25 0 01-2.23-10.004 6.072 6.072 0 01-.02-.496z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="text-xs uppercase">Panel </span>
                        </a>
                    @endcan


                    @can('view admin panel')
                        <a class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-neutral-100 hover:text-neutral-300"
                            href="{{ route('admin.index') }}">
                            <svg class="w-4 h-4 items-center mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.5 9.75a6 6 0 0111.573-2.226 3.75 3.75 0 014.133 4.303A4.5 4.5 0 0118 20.25H6.75a5.25 5.25 0 01-2.23-10.004 6.072 6.072 0 01-.02-.496z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="text-xs uppercase">Admin Panel </span>
                        </a>
                    @endcan

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-100 hover:text-gray-400 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                    href="/docs">
                    <svg class="w-4 h-4 items-center mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                            clip-rule="evenodd" />
                    </svg>
                    N/A
                </a>
                <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-100 hover:text-gray-400 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                    href="/docs">
                    <svg class="w-4 h-4 items-center mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" class="w-6 h-6">
                        <path
                            d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                        <path
                            d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                    </svg>

                    0
                </a>
                <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                    <div @click="open = ! open">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="relative flex items-center p-2">
                                <img class="object-cover select-none rounded-md h-8 w-8"
                                    src="{{ asset('/storage/avatars/' . Auth::user()->avatar) }}">
                            </div>
                            <div class="text-[{{ Auth::user()->username_color }}]">
                                {{ Auth::user()->username }}
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0"
                        style="display: none;" @click="open = false">
                        <div class="rounded-md shadow-xs py-1 bg-pal-4">
                            <div class="block px-4 py-2 text-xs text-neutral-400">
                                Manage Account
                            </div>

                            <a class="block px-4 py-2 text-sm leading-5 text-neutral-400 hover:text-neutral-600 focus:outline-none transition duration-150 ease-in-out"
                                href="{{ route('profile.show', ['user' => auth()->user()->username]) }}">Profile</a>

                            <a class="block px-4 py-2 text-sm leading-5 text-neutral-400 hover:text-neutral-600 focus:outline-none transition duration-150 ease-in-out"
                                href="{{ route('settings.index') }}">Settings</a>

                            <div class="border-t border-neutral-900"></div>

                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <a class="block px-4 py-2 text-sm leading-5 text-neutral-400 hover:text-neutral-600 focus:outline-none transition duration-150 ease-in-out"
                                    href="{{ route('auth.logout') }}"
                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">Logout</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
