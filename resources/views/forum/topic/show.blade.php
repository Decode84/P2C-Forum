<x-app-layout>
    <div class="container mx-auto">
        <div class="py-8">
            @include('layouts.partials._alert')

            <div class="breadcrumbs">
                <div class="flex items-center justify-between">
                    <ol class="list-reset py-4 flex text-grey-dark text-sm">
                        <li>
                            <a href="{{ route('forum.index') }}" class="text-neutral-400">Forum</a>
                        </li>
                        <li>
                            <span class="mx-2 text-neutral-400">/</span>
                        </li>
                        <li class="text-neutral-400">
                            <a href="{{ route('forum.category.show', $category) }}">{{ $category->title }}</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="flex justify-between items-center mb-2">
                <h1 class="text-lg text-neutral-200">
                    {{ $topic->title }}</h1>
                <div class="flex items-center space-x-4">
                    <a class="text-xs text-neutral-700" href="{{ route('forum.topic.edit', [$category, $topic]) }}">Edit
                        thread</a>
                    <a class="text-xs text-neutral-700" href="#">Delete thread</a>
                </div>
            </div>

            @foreach ($replies as $item)
                <div class="flex">
                    @include('forum.topic.components._poster')
                </div>
            @endforeach
            @can('create-reply')
            @include('forum.topic.components._reply')
            @endcan
            {{ $replies->links() }}
        </div>
    </div>
</x-app-layout>
