<x-app-layout>
    <header>
        <div class="w-full bg-center bg-cover h-[14rem]"
            style="background-image: url({{ asset('/storage/covers/' . $user->cover) }});">
            <div class="flex w-full h-full bg-gray-900 bg-opacity-50"></div>
        </div>
    </header>
    <main class="relative -mt-14">
        <div class="max-w-6xl mx-auto pb-6">
            <div class="flex items-center bg-pal-4 p-4 rounded-md border border-neutral-800">
                <img class="object-cover  bg-center h-32 w-32 rounded-md"
                    src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="">
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-[{{ $user->username_color }}]">{{ $user->username }}</h1>
                    @foreach ($user->roles as $role)
                        <span style="{{ $role->style }}">
                            {{ $role->name }}
                        </span>
                    @endforeach
                    <div class="pt-4">
                        <p class="text-neutral-400">{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
            @can('mod-user')
                <div class="mt-4">
                    <x-block class="w-full">
                        <x-slot name="title">
                            Admin info
                        </x-slot>
                        <x-slot name="description">
                            Do not share this information with anyone else.
                        </x-slot>
                        <x-slot name="content">
                            <div class="mt-6 flex flex-col gap-6 max-w-4xl">
                                <div class="text-neutral-400 text-sm">
                                    <table>
                                        <tr>
                                            <td class="pr-4">IP address:</td>
                                            <td>{{ $user->ip_address }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </x-slot>
                    </x-block>
                </div>
            @endcan
            <div class="grid grid-cols-2 mt-4 space-x-4">
                <x-block class="col-span-2 sm:col-span-1">
                    <x-slot name="title" class="flex justify-between">
                        Profile info @can('mod-user', $user)
                            <a href="#" class="text-red-400 hover:text-red-600 text-sm">- Edit user</a>
                        @endcan
                    </x-slot>
                    <x-slot name="description">
                        Profile info is used to represent you on the site.
                    </x-slot>
                    <x-slot name="content">

                        <div class="mt-6 flex flex-col gap-6 max-w-4xl">
                            <div class="text-neutral-400 text-sm">
                                <table>
                                    <tr>
                                        <td class="pr-4">Username:</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">Last visit:</td>
                                        <td>15 seconds ago</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">Discord:</td>
                                        <td>#8128</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">Joined:</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </x-slot>
                </x-block>
                <x-block class="col-span-2 sm:col-span-1">
                    <x-slot name="title">
                        Forum stats
                    </x-slot>
                    <x-slot name="description">
                        Forum stats are used to show your activity on the forum.
                    </x-slot>
                    <x-slot name="content">
                        <div class="mt-6 flex flex-col gap-6 max-w-4xl">
                            <div class="text-neutral-400 text-sm">
                                <table>
                                    <tr>
                                        <td class="pr-4">Posts:</td>
                                        <td>{{ $user->replies->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">Threads:</td>
                                        <td>{{ $user->topics->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">Reactions:</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-4">XP:</td>
                                        <td class=""><span class="text-green-500">{{ $user->reputation }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </x-slot>
                </x-block>
            </div>
            <div class="mt-4">
                <x-block>
                    <x-slot name="title">
                        Recent posts
                    </x-slot>
                    <x-slot name="description">
                        Recent posts are used to show your activity on the forum.
                    </x-slot>
                    <x-slot name="content">
                        <div class="">
                            @foreach ($replies as $reply)
                                <div class="bg-pal-1 border border-neutral-800 rounded-md p-2 mt-4">
                                    <div class="flex flex-col">
                                        <a href="{{ $reply->path }}"
                                            class="text-neutral-400 hover:text-neutral-200 text-sm">
                                            {{ $reply->topic->title }}
                                        </a>

                                        <span class="text-sm text-neutral-600">{!! Str::limit(Str::markdown($reply->content), 250) !!}</span>
                                    </div>
                                </div>
                            @endforeach
                            {{ $replies->links() }}
                        </div>
                    </x-slot>
                </x-block>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>
