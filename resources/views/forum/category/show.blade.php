<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="breadcrumbs">
            <div class="flex items-center justify-between">
                <ol class="list-reset py-4 flex text-grey-dark text-sm">
                    <li><a href="{{ route('forum.index') }}" class="text-neutral-400">Forum</a></li>
                    <li><span class="mx-2 text-neutral-400">/</span></li>
                    <li class="font-bold text-neutral-600">{{ $category->title }}</li>
                </ol>
                <x-button class="bg-pal-4 text-neutral-200" href="{{ route('forum.topic.create', $category) }}">
                    Create a topic
                </x-button>
            </div>
        </div>
        <div class="bg-pal-4 rounded-md ">
            <x-block>
                <x-slot name="title">
                    {{ $category->title }}
                </x-slot>
                <x-slot name="description">
                    There has been {{ $amountTopics->count() }} topics in the past 24 hours
                </x-slot>
                <x-slot name="content">
                    @foreach ($topics as $item)
                        <div
                            class="mt-1 border-b border-neutral-900 overflow-hidden grid grid-cols-6 md:grid-cols-12 auto-cols-max">
                            <!-- AVATAR & TOPIC -->
                            <div class="col-span-3 md:col-span-7 flex items-center">
                                <div class="relative flex items-center mr-2">
                                    <img class="object-cover select-none rounded-md h-10 w-10"
                                        src="{{ asset('/storage/avatars/' . $item->user->avatar) }}">
                                </div>
                                <div class="flex flex-col">
                                    <a class="font-medium text-sm text-[#92C4EC]"
                                        href="{{ route('forum.topic.show', [$category, $item]) }}">
                                        {{ $item->title }}
                                    </a>
                                    <a class="text-sm text-neutral-600 truncate w-full"
                                        href="{{ route('profile.show', $item->user) }}">
                                        {{ $item->user->username }}
                                    </a>
                                </div>
                            </div>
                            <!-- REPLIES -->
                            <div class="hidden md:flex col-span-1 flex-col items-center justify-center p-2 text-center">
                                <p class="font-medium text-[#92C4EC] ">{{ $item->reply_count }}</p>
                                <p class="text-neutral-400 text-xs">Replies</p>
                            </div>
                            <!-- VIEW COUNT -->
                            <div class="hidden md:flex col-span-1 flex-col items-center justify-center p-2 text-center">
                                <p class="font-medium text-[#92C4EC] ">{{ $item->view_count }}</p>
                                <p class="text-neutral-400 text-xs">Views</p>
                            </div>
                            <!-- LAST POST -->
                            @if ($item->lastReply)
                                <div class="col-span-3 md:ol-span-3 flex items-center justify-end p-2 overflow-hidden">
                                    <div class="flex flex-col text-right">
                                        <p class="text-neutral-400 text-xs">Last Post</p>
                                        <p class="text-neutral-600 text-sm">
                                            {{ $item->lastReply->created_at->diffForHumans() }} · <a
                                                class="text-[#92B4EC]"
                                                href="{{ route('profile.show', $item->lastReply->user) }}">{{ $item->lastReply->user->username }}</a>
                                        </p>
                                    </div>
                                    <div class="relative flex items-center p-2">
                                        <img class="object-cover select-none rounded-md h-10 w-10"
                                            src="{{ asset('/storage/avatars/' . $item->lastReply->user->avatar) }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </x-slot>
            </x-block>
            {{ $topics->links() }}
        </div>
    </div>
</x-app-layout>
