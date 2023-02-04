<div class="container">
    <table id="reply-{{ $item->slug }}" class="table w-full mb-4 text-neutral-200 align-top border-gray-200">
        <tbody>
            <tr class="flex">
                <!-- User Profile -->
                <td class="table-cell text-center bg-pal-4 border-t border-l border-b border-neutral-800">
                    <!-- avatar -->
                    <p class="p-2 wp-14">
                        <a href="#">
                            <img src="{{ asset('/storage/avatars/' . $item->user->avatar) }}"
                                class="rounded-md inline-block text-6xl h-24 object-cover bg-center overflow-hidden align-bottom w-24 @if ($item->user->roles->first()->name == 'admin') border-2 border-red-900 @endif"
                                alt="{{ $item->user->username }}">
                        </a>
                    </p>
                    <!-- username -->
                    <p>
                        <a href="{{ route('profile.show', $item->user->username) }}"
                            class="text-[#92B4EC] font-bold overflow-hidden text-center text-sm">
                            {{ $item->user->username }}
                        </a>
                    </p>
                    <!-- user roles -->
                    <p class="mt-2">
                        @foreach ($item->user->roles as $role)
                            <span class="text-xs" style="{{ $role->style }}">{{ $role->name }}</span>
                        @endforeach
                    </p>
                    <!-- user replies -->
                    <p class="text-xs text-neutral-600 mb-2">
                        {{ $item->user->reply_count }}
                        @if ($item->user->reply_count > 1)
                            Replies
                        @else
                            Reply
                        @endif
                    </p>
                </td>
                <!-- Reply content -->
                <td class="w-full p-2 bg-pal-4 border border-neutral-800 markdown">
                    <div class="flex justify-between">
                        <div>
                            <span class="text-xs text-neutral-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4 mr-1">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"
                                        clip-rule="evenodd" />
                                </svg>

                                Posted {{ $item->created_at->diffForHumans() }} @if ($item->created_at != $item->updated_at)
                                    - Edited {{ $item->updated_at->diffForHumans() }}
                                @endif
                            </span>
                        </div>
                        <div class="flex space-x-4">
                            @if (Auth::check() && Auth::user()->id == $item->user->id || Auth::user()->hasRole('admin'))
                                <a href="{{ route('forum.reply.edit', [$category, $topic->slug, $item->slug]) }}"
                                    class="text-xs text-neutral-700 flex items-center">
                                    Edit reply
                                </a>
                            @endif
                            <span class="text-xs text-neutral-700">{{ $item->slug }}</span>
                        </div>
                    </div>
                    <p class="p-1 markdown">
                        {!! Str::markdown($item->content) !!}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
