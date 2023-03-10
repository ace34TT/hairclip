<div class="bg-white p-14 flex flex-col justify-center items-center">
    <img class="rounded-full w-40 h-40" src="{{ asset('images/' . $customerProfile) }}" alt="image description">
    <div class="flex h-14 w-full justify-center">
        @for ($i = 0; $i < 5; $i++)
            @if ($i < $stars)
                <x-tni-star class="h-12 w-12" style="color :rgb(168, 235, 168)" />
            @else
                <x-heroicon-o-star class="h-12 w-12" style="color :rgb(168, 235, 168)" />
            @endif
        @endfor
    </div>
    <p>{{ $message }}</p>
    <p>{{ $customerName }}</p>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
