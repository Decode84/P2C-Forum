<x-app-layout>
    <div class="lg:max-w-7xl md:max-w-4xl sm:max-w-xl mx-auto">
        <div class="py-8">
            <div class="py-2">
                <h6 class="text-neutral-400 py-2">You're viewing a post from the topic : <a
                        class="text-neutral-400 font-medium"
                        href="{{ route('forum.topic.show', [$category, $topic]) }}">{{ $reply->topic->title }}</a></h6>
                <div class="flex">
                    <div class="w-1/4 wp-14">
                        <div class="bg-pal-4 border border-neutral-800 text-neutral-400 text-center mx-auto rounded-l">
                            <div class="flex flex-col">
                                <div class="z-0 w-full">
                                    <div class="p-2">
                                        <img class="rounded-md inline-block text-6xl h-24 object-cover bg-center overflow-hidden align-bottom w-24"
                                            src="{{ $reply->user->avatar }}" alt="">
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <div class="w-full">
                                        <a href="{{ route('account.show', $reply->user) }}"
                                            class="text-[#92B4EC] font-bold overflow-hidden text-center text-sm">{{ $reply->user->username }}</a>
                                    </div>
                                </div>

                                <div class="px-4 py-2 mx-auto">
                                    <div class="space-y-1">
                                        <div class="flex items-center">
                                            <div class="w-full px-2 ">
                                                <div class="flex flex-col items-center font-10">
                                                    @foreach ($reply->user->roles as $role)
                                                        <span class="text-xs" style="{{ $role->style }}">
                                                            {{ $role->name }}
                                                        </span>
                                                    @endforeach
                                                    <span class="">{{ $reply->user->reply_count }}
                                                        @if ($reply->user->reply_count > 1)
                                                            Replies
                                                        @else
                                                            Reply
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-5/6 flex-1">
                        <div class="bg-pal-4 border-r border-t border-b border-neutral-800 text-neutral-200 h-full">
                            <div class="w-full p-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-neutral-600">Posted
                                        {{ $reply->created_at->diffForHumans() }}</span>
                                    <div class="flex">
                                        <span class="text-xs text-neutral-700">{{ $reply->slug }}</span>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <div class="py-5">
                                        <p class="text-neutral-400 leading-5 text-sm">{!! $reply->body !!}</p>
                                    </div>
                                    <div class="flex space-x-4 justify-end">
                                        <button id="btn-quote"
                                            class="inline-block px-6 py-1 bg-dark-1 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                            Quote
                                        </button>
                                        <a href="#"
                                            class="inline-block px-6 py-1 bg-dark-1 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                            Report
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
