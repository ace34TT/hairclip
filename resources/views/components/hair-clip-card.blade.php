<div class="flex flex-col ">
    <h2>{{ $name }}</h2>
    {{-- <img src=" {{ $preview }}" alt=""> --}}
    <img src="{{ asset('images/' . $preview) }}" height="640px" width="640px" alt="">
    <p> {{ $description }}</p>
    <button type="button"
        class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Button
        Voir plus</button>
</div>
