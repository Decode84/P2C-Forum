<x-app-layout>
    <div class="lg:max-w-6xl md:max-w-6xl sm:max-w-xl mx-auto">
        <div class="py-12">
            <form method="POST" action="{{ route('forum.topic.update', [$category, $topic]) }}">
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                <input type="hidden" name="content" id="content">
                {{ method_field('PUT') }}
                @csrf
                <x-block class="bg-pal-4">
                    <x-slot name="title">
                        Thread
                    </x-slot>
                    <x-slot name="description">
                        Editing the thread "{{ $topic->title }}"
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex flex-col mt-4">
                            <x-label for="title" :value="__('Title')" />
                            <x-input type="text" id="title" name="title"
                                value="{{ old('title', $topic->title) }}" class="mb-4" />
                            <x-label for="content" :value="__('Content')" />
                            <x-textarea id="content" name="content" rows="20" class="mb-4">
                                {{ $reply->content }}
                            </x-textarea>
                            <div class="pt-4 flex">
                                <x-button class="w-full">
                                    {{ __('Update') }}
                                </x-button>
                            </div>
                        </div>
                    </x-slot>
                </x-block>
            </form>
        </div>
    </div>
</x-app-layout>
