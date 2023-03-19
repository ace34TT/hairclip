<div class="flex w flex-col justify-center items-center rounded-lg px-5 bg-white ">
    <p>{{ $customerName }}</p>
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

    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
