@if (Session::has('error'))
    <x-alert type="error" message="{{ session('error') }}" class="mb-4 bg-red-700 text-white py-4 px-6 mx-auto rounded-md" />
@endif

@if (Session::has('success'))
    <x-alert type="success" message="{{ session('success') }}" class="mb-4 bg-emerald-700 text-white py-4 px-6 mx-auto rounded-md" />
@endif
