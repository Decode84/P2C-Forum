<div
class="relative bg-pal-4 z-10 flex-shrink-0 flex h-16 bg-white border-b border-neutral-800 lg:border-none">
<button type="button"
    class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden"
    @click="open = true">
    <span class="sr-only">Open sidebar</span>
    <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-1"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h8m-8 6h16"></path>
    </svg>
</button>
<!-- Search bar -->
<div
    class="flex-1 bg-pal-4  px-4 flex justify-between border-b border-neutral-800 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
    <div class="flex-1 flex">

    </div>
    <div class="ml-4 flex items-center md:ml-6">
        <button type="button"
            class=" p-1 rounded-full text-neutral-400 hover:text-gray-500 focus:outline-none">
            <span class="sr-only">View notifications</span>
            <svg class="h-5 w-5" x-description="Heroicon name: outline/bell"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
        </button>

        <!-- Profile dropdown -->
        <div x-data="{ open: false }" @close.stop="open = false" x-init="init()"
            @keydown.escape.stop="open = false; focusButton()" @click.away="open = false"
            class="ml-3 relative">
            <div>
                <button type="button"
                    class="max-w-xs rounded-full flex items-center text-sm focus:outline-none  lg:p-2 lg:rounded-md "
                    id="user-menu-button" x-ref="button" @click="open = !open"
                    @keyup.space.prevent="onButtonEnter()"
                    @keydown.enter.prevent="onButtonEnter()" aria-expanded="false"
                    aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                    @keydown.arrow-up.prevent="onArrowUp()"
                    @keydown.arrow-down.prevent="onArrowDown()">
                    <img class="h-8 w-8 rounded-md object-cover"
                        src="{{ asset('/storage/avatars/' . Auth::user()->avatar) }}"
                        alt="">
                    <span class="hidden ml-3 text-neutral-400 text-sm font-medium lg:block"><span
                            class="sr-only">Open user menu for
                        </span>{{ Auth::user()->username }}</span>
                    <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                        x-description="Heroicon name: solid/chevron-down"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                x-bind:aria-activedescendant="activeDescendant" role="menu"
                aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                @keydown.arrow-up.prevent="onArrowUp()"
                @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                @keydown.enter.prevent="open = false; focusButton()"
                @keyup.space.prevent="open = false; focusButton()">
                <a href="{{ route('profile.show', ['user' => auth()->user()->username]) }}" class="block px-4 py-2 text-sm text-gray-700"
                    x-state:on="Active" x-state:off="Not Active"
                    :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem" tabindex="-1"
                    id="user-menu-item-0" @mouseenter="activeIndex = 0"
                    @mouseleave="activeIndex = -1" @click="open = false; focusButton()">Your
                    Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                    :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                    id="user-menu-item-1" @mouseenter="activeIndex = 1"
                    @mouseleave="activeIndex = -1"
                    @click="open = false; focusButton()">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700"
                    :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                    id="user-menu-item-2" @mouseenter="activeIndex = 2"
                    @mouseleave="activeIndex = -1" @click="open = false; focusButton()">Logout</a>
            </div>

        </div>
    </div>
</div>
</div>
