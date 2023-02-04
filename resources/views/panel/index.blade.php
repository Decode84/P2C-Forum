<x-app-layout>
    <div class="container mx-auto">
        <main class="py-8">
            <div class="grid grid-cols-2 space-x-4">
                <x-block class="bg-pal-4 border border-neutral-800 p-4 text-neutral-200">
                    <x-slot name="title">
                        HWID
                    </x-slot>
                    <x-slot name="description">
                        You can freely update your HWID as you please. This will not affect your subscription.
                    </x-slot>
                    <x-slot name="content">
                        <form action="{{ route('panel.updateHwid', $user) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="flex flex-col">
                                <label class="text-neutral-400 text-sm mb-2 pt-5" for="">HWID token</label>
                                <input type="text" name="hwid" value="{{ $user->hwid }}"
                                    class="rounded border border-neutral-800 text-neutral-400 text-sm bg-pal-1 focus:outline-none px-2 py-1">
                                <div class="">
                                    <button type="submit" class="text-xs text-neutral-700">Update your HWID</button>
                                </div>
                            </div>
                        </form>
                    </x-slot>
                </x-block>
                <x-block class="bg-pal-4 border border-neutral-800 p-4 text-neutral-200">
                    <x-slot name="title">
                        Active subscriptions
                    </x-slot>
                    <x-slot name="description">
                        You currently have access to the following subscriptions.
                    </x-slot>
                    <x-slot name="content">
                        <div class="flex flex-col">
                            <div class="mt-4 flex items-center">
                                <span class="text-neutral-400">- Counter-Stike: Global Offensive</span>
                            </div>
                        </div>
                    </x-slot>
                </x-block>
            </div>
        </main>
    </div>
</x-app-layout>
