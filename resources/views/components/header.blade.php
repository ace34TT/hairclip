<header class="h-28 flex justify-between items-center ">
    <div class="flex cursor-pointer gap-5 items-center pl-16" onclick="window.location.href='{{ route('homepage') }}'">
        <img src="{{ asset('images/logo.png') }}" height="120px" width="120px" alt="">
        <h2 class="uppercase text-4xl">HairClip</h2>
    </div>
    <ul class="flex gap-10 pr-40 items-center">
        <li><a href="#">A propos</a></li>
        <li><a href="#">Contact</a></li>
        <li>
            <a href="#">
                <x-akar-person class="h-9 w-9" />
            </a>
        </li>
        <li>
            <a href="{{ route('shopping-cart.') }}" class="flex gap-4">
                <x-bx-cart class="h-9 w-9" />
                <span
                    class="inline-flex items-center rounded-full bg-gray-100 px-3 py-0.5 text-sm font-medium text-gray-800">{{ Cart::count() }}</span>
            </a>
        </li>
    </ul>
</header>
