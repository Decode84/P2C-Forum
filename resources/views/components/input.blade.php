<input name="{{ $name }}" type="{{ $type }}" id="{{ $id }}"
    @if ($value) value="{{ $value }}" @endif
    {{ $attributes->merge(['class' => 'mt-1 block text-neutral-400 bg-pal-1 border border-neutral-800 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm']) }} />
