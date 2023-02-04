<form action="{{ route('forum.reply.store', [$category, $topic]) }}" method="POST">
    @csrf
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <input type="hidden" name="content" id="content">
    <div class="flex flex-col space-y-2">
        <div class="flex flex-col space-y-2">
            <x-label for="content" :value="__('Content')" />
            <x-textarea id="editor" name="content" class="w-full h-64 bg-pal-4"></x-textarea>
            <div>
                <x-button type="submit">Reply</x-button>
            </div>
        </div>
    </div>
</form>
