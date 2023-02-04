<x-app-layout>
    <div class="container mx-auto pt-10">
        <div class="mx-auto pb-32 grid grid-cols-12 gap-8">
            <div class="w-full space-y-12 col-span-12 md:col-span-8">
                <x-block class="">
                    <x-slot name="title">
                        Forum
                    </x-slot>
                    <x-slot name="description">
                        All of the categories of forum
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex flex-col mt-4 bg-pal-4">
                            @foreach ($sections as $section)
                                <div class="px-4 py-2 bg-gradient-to-r from-slate-800 to-gray-900 rounded-t-md">
                                    <span class="font-medium text-sm text-neutral-200">TITLE</span>
                                </div>
                                @foreach ($section->categories as $category)
                                    <div
                                        class="overflow-hidden grid grid-cols-6 md:grid-cols-12 auto-cols-max">
                                        <!-- AVATAR & TOPIC -->
                                        <div class="col-span-3 md:col-span-7 flex items-center">
                                            <div class="relative flex items-center mr-2">
                                                <div class="h-10 w-10 flex items-center justify-center">
                                                    <svg class="inline ml-2 w-4 h-4 text-neutral-200"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <a class="font-medium text-sm text-[#92C4EC]" href="{{ route('forum.category.show', $category) }}">
                                                    {{ $category->title }}
                                                </a>
                                                <p class="text-sm text-neutral-600 truncate">
                                                    {{ $category->description }}
                                                </p>
                                            </div>
                                        </div>
                                        <!-- REPLIES -->
                                        <div
                                            class="hidden md:flex col-span-1 flex-col items-center justify-center p-2 text-center">
                                            <p class="font-medium text-[#92C4EC] ">{{ $category->topics->count() }}</p>
                                            <p class="text-neutral-400 text-xs">Topics</p>
                                        </div>
                                        <!-- VIEW COUNT -->
                                        <div
                                            class="hidden md:flex col-span-1 flex-col items-center justify-center p-2 text-center">
                                            <p class="font-medium text-[#92C4EC] ">{{ $category->replies->count() }}</p>
                                            <p class="text-neutral-400 text-xs">Repies</p>
                                        </div>
                                        <!-- LAST POST -->
                                        <div
                                            class="col-span-3 md:ol-span-3 flex items-center justify-end p-2 overflow-hidden">
                                            <div class="flex flex-col text-right">
                                                <p class="text-neutral-400 text-xs">title</p>
                                                <p class="text-neutral-600 text-sm">
                                                    1414 · <a class="text-[#92B4EC]" href="#">USERNAME</a>
                                                </p>
                                            </div>
                                            <div class="relative flex items-center p-2">
                                                <img class="object-cover select-none rounded-md h-10 w-10"
                                                    src="#">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </x-slot>
                </x-block>
            </div>
            <div class="w-full space-y-12 col-span-12 md:col-span-4">
                <x-block>
                    <x-slot name="title">
                        Latest replies
                    </x-slot>
                    <x-slot name="description">
                        The 5 latests replies
                    </x-slot>
                    <x-slot name="content">
                        <div class="relative bg-pal-4 overflow-hidden">
                            <div class=" grid grid-cols-6 md:grid-cols-12 auto-cols-max overflow-hidden">
                                @foreach ($latestReplies as $replyLat)
                                    <div class="col-span-3 md:col-span-10 flex items-center p-1">
                                        <div class="relative flex items-center">
                                            <img class="object-cover select-none rounded-md h-8 w-8"
                                                src="{{ asset('/storage/avatars/' . $replyLat->user->avatar) }}">
                                        </div>
                                        <div class="flex flex-col ml-2">
                                            <a class="font-medium text-sm text-[#92C4EC]"
                                                href="{{ route('forum.topic.show', [$category, $replyLat->topic]) }}">
                                                {{ $replyLat->topic->title }}
                                            </a>
                                            <p>
                                                <span
                                                    class="text-neutral-600 text-xs">{{ $replyLat->created_at->diffForHumans() }}
                                                    ·</span>
                                                <a class="text-xs truncate w-full text-[#92B4EC]"
                                                    href="{{ route('profile.show', $replyLat->user) }}">
                                                    {{ $replyLat->user->username }}</a>
                                            </p>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </x-slot>
                </x-block>
                <x-block>
                    <x-slot name="title">
                        Latest topics
                    </x-slot>
                    <x-slot name="description">
                        The 5 latests topics
                    </x-slot>
                    <x-slot name="content">
                        <div class="relative bg-pal-4 overflow-hidden">
                            <div class=" grid grid-cols-6 md:grid-cols-12 auto-cols-max overflow-hidden">
                                @foreach ($latestTopics as $topicLat)
                                    <div class="col-span-3 md:col-span-10 flex items-center p-1">
                                        <div class="relative flex items-center">
                                            <img class="object-cover select-none rounded-md h-8 w-8"
                                                src="{{ asset('/storage/avatars/' . $topicLat->user->avatar) }}">
                                        </div>
                                        <div class="flex flex-col ml-2">
                                            <a class="font-medium text-sm text-[#92C4EC]"
                                                href="{{ route('forum.topic.show', [$category, $topicLat]) }}">
                                                {{ $topicLat->title }}
                                            </a>
                                            <p>
                                                <span
                                                    class="text-neutral-600 text-xs">{{ $topicLat->created_at->diffForHumans() }}
                                                    ·</span>
                                                <a class="text-xs truncate w-full text-[#92B4EC]"
                                                    href="{{ route('profile.show', $topicLat->user) }}">
                                                    {{ $topicLat->user->username }}</a>
                                            </p>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </x-slot>
                </x-block>
            </div>
        </div>
</x-app-layout>
