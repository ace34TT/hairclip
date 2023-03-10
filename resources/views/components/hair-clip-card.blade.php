<div style="background-color: {{ $colorValue }}" class="flex p-6 flex-col items-center rounded-3xl prose">
    <h2 class="text-white">{{ $name }}</h2>
    {{-- <img src=" {{ $preview }}" alt=""> --}}
    <img src="{{ asset('images/' . $preview) }}" class="rounded-3xl" style="width:400px;height:400px;" alt="">
    <p class="text-slate-300 m-0"> {{ $description }}</p>
    <p class="text-white font-bold m-3">Au prix de 7€</p>
    <button type="button"
        class="rounded-md bg-white bg-opacity-0 py-2.5 px-3.5 text-sm font-semibold text-white shadow-xl ring-1 ring-inset ring-gray-300 ">Button
        Voir plus</button>
</div>
