<div class="flex w flex-col justify-center items-center px-5 bg-white ">
    <img class="rounded-full w-40 h-fit md:h-40" src="{{ asset('images/' . $customerProfile) }}" alt="image description">
    <div class="flex justify-center h-14 w-full ">
        @for ($i = 0; $i < 5; $i++)
            @if ($i < $stars)
                <x-tni-star class="h-4 w-4 md:h-12 md:w-12" style="color :rgb(168, 235, 168)" />
            @else
                <x-heroicon-o-star class="h-4 w-4 md:h-12 md:w-12" style="color :rgb(168, 235, 168)" />
            @endif
        @endfor
    </div>
    <p class="text-center m-0 md:m-5">{{ $message }}</p>
    <p>{{ $customerName }}</p>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
