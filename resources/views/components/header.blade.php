<header class="lg:h-28 flex justify-between items-center ">
    <div class="flex cursor-pointer lg:gap-5 items-center pl-0 lg:pl-16"
        onclick="window.location.href='{{ route('homepage') }}'">
        <img src="{{ asset('images/logo/1_transparent_logo_black.png') }}" class="h-20 md:h-32" alt="">
        <h2 class="uppercase text-xl md:4xl">HairClip</h2>
    </div>
    <ul class="lg:visible md:flex gap-10 md:pr-40 items-center">
        <li class="invisible absolute md:static md:visible"><a href="#">A propos</a></li>
        <li class="invisible absolute md:static md:visible"><a href="#">Contact</a></li>
        <li class="invisible absolute md:static md:visible">
            <a href="#">
                <x-akar-person class="h-9 w-9" />
            </a>
        </li>
        <li class="mr-4">
            <a href="{{ route('shopping-cart.index') }}" class="flex gap-4">
                <x-bx-cart class="h-9 w-9" />
                <spa id="total-cart-items"
                    class="inline-flex items-center rounded-full bg-white md:bg-gray-100 md:px-3 py-0.5 text-sm font-medium text-gray-800">
                    {{ Cart::count(true) }}</spa>
            </a>
        </li>
    </ul>
</header>
