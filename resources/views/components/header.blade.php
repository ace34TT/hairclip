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
            <a href="{{ route('shopping-cart.') }}">
                <x-bx-cart class="h-9 w-9" />
            </a>
        </li>
    </ul>
</header>
