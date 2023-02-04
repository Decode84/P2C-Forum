<x-app-layout>
    <div class="max-w-6xl mx-auto">
        <p class="text-neutral-100 font-bold mb-4">Forum</p>
        <div class="mx-auto pb-32 grid grid-cols-12 gap-8">
            <div class="w-full space-y-12 col-span-12 md:col-span-8">
                <div>
                    @foreach ($sections as $section)
                        <div class="w-full space-y-12 col-span-12 md:col-span-8">
                            <div class="mb-4">
                                <div class="bg-pal-4">
                                    <div class="px-4 py-2 bg-gradient-to-r from-slate-800 to-gray-900 rounded-t-md">
                                        <span class="font-medium text-sm text-neutral-200">{{ $section->title }}</span>
                                    </div>
                                    @foreach ($section->categories as $category)
                                        <div
                                            class="relative border-b border-neutral-900 overflow-hidden grid grid-cols-6 md:grid-cols-12 auto-cols-max items-center">
                                            <!-- ICON -->
                                            <div class="col-span-1 flex items-center justify-center p-2">
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
                                            <!-- TITLE -->
                                            <div class="col-span-2 md:col-span-7 flex flex-col p-2">
                                                <a class="font-medium text-neutral-300"
                                                    href="{{ route('forum.category.show', [$category]) }}">
                                                    {{ $category->title }}
                                                </a>
                                                <span class="text-sm text-neutral-500 truncate w-full">
                                                    <span class="font-medium">Topics</span>:
                                                    {{ $category->topics->count() }}
                                                    <span class=" font-medium">Posts</span>:
                                                    {{ $category->replies->count() }}
                                                </span>
                                            </div>
                                            <!-- LAST POST -->
                                            @if ($category->lastReply || $category->lastTopic)
                                                <div
                                                    class="col-span-4 md:ol-span-3 flex items-center justify-end p-2 overflow-hidden">
                                                    <div class="flex flex-col text-right">
                                                        <a class="text-neutral-200 font-medium text-sm"
                                                            href=""></a>
                                                        @if ($category->lastReply)
                                                            <a class="text-[#92C4EC] text-xs"
                                                                href="{{ route('forum.topic.show', [$category, $category->lastReply->topic]) }}">
                                                                {{ $category->lastReply->topic->title }} </a>
                                                        @else
                                                            <a class="text-[#92C4EC] text-xs"
                                                                href="{{ route('forum.topic.show', [$category, $category->lastTopic]) }}">
                                                                {{ $category->lastTopic->title }} </a>
                                                        @endif
                                                        </a>
                                                        <p class="text-neutral-600 text-xs">
                                                            @if ($category->lastReply)
                                                                {{ $category->lastReply->created_at->diffForHumans() }}
                                                            @else
                                                                {{ $category->lastTopic->created_at->diffForHumans() }}
                                                            @endif ·
                                                            @if ($category->lastReply)
                                                                <a class="text-[#92B4EC]"
                                                                    href="{{ route('profile.show', $category->lastReply->user) }}">
                                                                    {{ $category->lastReply->user->username }} </a>
                                                            @else
                                                                <a class="text-[#92B4EC]"
                                                                    href="{{ route('profile.show', $category->lastTopic->user) }}">
                                                                    {{ $category->lastTopic->user->username }} </a>
                                                            @endif
                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div class="relative flex items-center p-2">
                                                        <img class="object-cover select-none rounded-md h-10 w-10"
                                                            src="@if ($category->lastReply) {{ asset('/storage/avatars/' . $category->lastReply->user->avatar) }} @else {{ asset('/storage/avatars/' . $category->lastTopic->user->avatar) }} @endif">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="relative bg-pal-4 rounded-t-md overflow-hidden">
                    <div class="relative">
                        <div class="relative px-4 py-2 bg-gradient-to-r from-slate-800 to-gray-900 rounded-t-md">
                            <span class="font-medium text-neutral-200 text-sm">Online users</span>
                        </div>
                        <div class="relative grid grid-cols-6 md:grid-cols-12 auto-cols-max overflow-hidden">

                            <div class="col-span-3 md:col-span-10 flex items-center p-2">
                                <div class="flex">
                                    <a class="font-medium text-xs text-neutral-400" href="#">
                                        asd, aosd, iw, isai, iwqoid92, iajsd8, i2j1, iasjd, 2j, iajs, asjdi, ijasid,
                                        ausidh, jaisd, ihua, uy7821m, kasd, idsf, jifj3, jua
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full space-y-12 col-span-12 md:col-span-4">
                <div class="relative bg-pal-4 overflow-hidden">
                    <div class="relative">
                        <div class="relative px-4 py-2 bg-gradient-to-r from-slate-800 to-gray-900 rounded-t-md ">
                            <span class="font-medium text-neutral-200 text-sm">Latest posts</span>
                        </div>

                        <div class="relative grid grid-cols-6 md:grid-cols-12 auto-cols-max overflow-hidden">
                            @foreach ($latestReplies as $replyLat)
                                <div class="col-span-3 md:col-span-10 flex items-center p-1">
                                    <div class="relative flex items-center p-1">
                                        <img class="object-cover select-none rounded-md h-8 w-8"
                                            src="{{ asset('/storage/avatars/' . $replyLat->user->avatar) }}">
                                    </div>
                                    <div class="flex flex-col">
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
                </div>
                <div class="relative bg-pal-4 overflow-hidden">
                    <div class="relative">
                        <div class="relative px-4 py-2 bg-gradient-to-r from-slate-800 to-gray-900 rounded-t-md ">
                            <span class="font-medium text-neutral-200 text-sm">Latest threads</span>
                        </div>
                        <div class="relative grid grid-cols-6 md:grid-cols-12 auto-cols-max overflow-hidden">
                            @foreach ($latestTopic as $latest)
                                <div class="col-span-3 md:col-span-10 flex items-center p-1">
                                    <div class="relative flex items-center p-1">
                                        <img class="object-cover select-none rounded-md h-8 w-8"
                                            src="{{ asset('/storage/avatars/' . $latest->user->avatar) }}">
                                    </div>

                                    <div class="flex flex-col ml-2">
                                        <a class="font-medium text-sm text-[#92C4EC]"
                                            href="{{ route('forum.topic.show', [$category, $latest]) }}">
                                            {{ $latest->title }}
                                        </a>
                                        <p>
                                            <span
                                                class="text-neutral-600 text-xs">{{ $latest->created_at->diffForHumans() }}
                                                ·</span>
                                            <a class="text-xs truncate w-full text-[#92B4EC]"
                                                href="{{ route('profile.show', [$latest->user]) }}">
                                                {{ $latest->user->username }}</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
