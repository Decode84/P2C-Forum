<x-admin-layout>
    <h2 class="text-lg leading-6 font-medium text-neutral-400">Overview</h2>
    <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <x-card>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="text-neutral-400 w-5 h-5">
                    <path
                        d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                </svg>
            </x-slot>
            <x-slot name="title">
                Users
            </x-slot>
            <x-slot name="data">
                {{ $totalUsers }}
            </x-slot>
        </x-card>

        <x-card>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="text-neutral-400 w-5 h-5">
                    <path
                        d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                </svg>
            </x-slot>
            <x-slot name="title">
                Posts
            </x-slot>
            <x-slot name="data">
                {{ $totalReplies }}
            </x-slot>
        </x-card>

        <x-card>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="text-neutral-400 w-5 h-5">
                    <path
                        d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                </svg>
            </x-slot>
            <x-slot name="title">
                Topics
            </x-slot>
            <x-slot name="data">
                {{ $totalTopics }}
            </x-slot>
        </x-card>

        <x-card>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="text-neutral-400 w-5 h-5">
                    <path
                        d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                </svg>
            </x-slot>
            <x-slot name="title">
                Active subscriptions
            </x-slot>
            <x-slot name="data">
                5
            </x-slot>
        </x-card>
    </div>
    <section class="mt-10">
        <h2 class="text-lg leading-6 font-medium text-neutral-400">Lattest registrated users</h2>

        <div class="mt-4">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-md overflow-hidden border-b border-neutral-800 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-neutral-800 border border-neutral-800">
                                <thead class="bg-pal-4">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">
                                            Username
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">
                                            IP-address
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">
                                            Reputation
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">
                                            Role
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-neutral-500 uppercase tracking-wider">
                                            Created at
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-pal-4 divide-y divide-neutral-800">

                                    @foreach ($latestUsers as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-neutral-400">
                                                {{ $user->username }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-400">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-400">
                                                {{ $user->ip_address }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-400">
                                                {{ $user->reputation }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-400">
                                                @foreach ($user->roles as $item)
                                                    {{ $item->name }}
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-400">
                                                {{ $user->created_at->diffForHumans() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-blue-400 hover:text-blue-900">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-admin-layout>
