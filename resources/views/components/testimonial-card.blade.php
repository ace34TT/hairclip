<div class="inline-block">
    <div
        class="flex w-80 md:w-96 min-h-[150px] sm:min-h-[150px] flex-col justify-center items-start rounded-lg px-7 bg-d-green text-white shadow-md">
        <div class="flex  justify-start items-center gap-5 w-full">
            <p class="text-left text-lg font-bold p-0 my-0 ">
                {{ $customerName }}</p>
            <div class="justify-self-end flex justify-start items-center mb-5 md:mb-0 h-fit w-full ">
                @for ($i = 0; $i < 5; $i++)
                    <x-tni-star class="h-5 w-5  md:w-" style="color :rgb(15, 57, 46)" />
                @endfor
            </div>
        </div>
        <p class="text-center md:text-left my-0 leading-5">{{ $message }}</p>
    </div>
</div>
