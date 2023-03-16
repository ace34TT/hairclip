<div class="inline-block">
    <div style="background-color: {{ $colorValue }}" style="min-width: 384px; "
        class=" flex  w-96 p-6 flex-col items-center rounded-3xl prose hover:scale-105 hover:shadow-md transition ease-in-out cursor-pointer break-words"
        onclick="">
        <h2 class="text-white">{{ $name }}</h2>
        <img src="{{ asset('images/scranchies/' . $preview) }}" class="rounded-3xl" style="width:300px;height:300px;"
            alt="">
        <div class="text-slate-50 w-10/12 text-center break-words break-all" style="word-wrap: break-word;">
            {{ $description }}
        </div>
        <p class="text-white font-bold m-3">7e</p>
        <button onclick="window.location.href='{{ route('shopping-cart.add-item', ['product_id' => $id]) }}'"
            type="button"
            class="rounded-md bg-white bg-opacity-0 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:shadow-lg transition ease-in-out">
            Ajouter au panier</button>
    </div>
</div>
