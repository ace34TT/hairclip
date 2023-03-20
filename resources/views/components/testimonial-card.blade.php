<div class="inline-block">
    <div
        class="flex w-80 md:w-72 min-h-[200px] sm:min-h-[280px] flex-col justify-center items-center rounded-lg px-5 bg-white shadow-md">
        <p class="text-left my-0 md:my-5">
            {{ $customerName }}</p>
        <div class="flex justify-center mb-5 md:mb-0 h-fit md:h-14 w-full ">
            @for ($i = 0; $i < 5; $i++)
                {{-- @if ($i < $stars) --}}
                <x-tni-star class="h-8 w-8 md:h-12 md:w-12" style="color :rgb(168, 235, 168)" />
                {{-- @else
                <x-heroicon-o-star class="h-4 w-4 md:h-12 md:w-12" style="color :rgb(168, 235, 168)" />
            @endif --}}
            @endfor
        </div>
        <p class="text-left mb-4 mt-0 md:m-5 leading-5">{{ $message }}</p>
        <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    </div>
</div>
