<x-app-layout>
    <div class="max-w-6xl mx-auto">
        <div class="py-12">
            <form method="POST" action="{{ route('forum.topic.store', $category) }}">
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <input type="hidden" name="content" id="content">
                @csrf
                <x-block>
                    <x-slot name="title">
                        Thread
                    </x-slot>
                    <x-slot name="description">
                        Creating a new thread in the category "{{ $category->title }}"
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex flex-col mt-4">
                            <x-label for="title" :value="__('Title')" />
                            <x-input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="mb-4" />
                            <x-label for="content" :value="__('Content')" />
                            <x-textarea id="content" name="content" rows="20" class="mb-4">
                                {{ old('content') }}</x-textarea>
                            <div class="pt-4 flex">
                                <x-button class="w-full">
                                    {{ __('Create') }}
                                </x-button>
                            </div>
                        </div>
                    </x-slot>
                </x-block>
            </form>
        </div>
    </div>
</x-app-layout>
