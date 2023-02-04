<textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'shadow-sm focus:ring-neutral-500 focus:border-neutral-500 block w-full bg-pal-1 text-neutral-400 sm:text-sm border-neutral-800 rounded-md']) }}>{{ old($name, $slot) }}</textarea>
