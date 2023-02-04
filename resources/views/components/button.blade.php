<div>
    @props([
    'type' => 'submit',
])
</div>

<button
    {{ $attributes->merge(['class' => 'inline-block px-6 py-2.5 bg-pal-1 border border-neutral-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-black hover:shadow-lg focus:bg-black focus:shadow-lg focus:outline-none focus:ring-0 active:bg-black active:shadow-lg transition duration-150 ease-in-out']) }}
    type="{{ $type }}">
    {{ $slot }}
</button>
