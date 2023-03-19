<header class="flex justify-between items-center w-full md:h-24 bg-white">
    <div class="ml-4 md:ml-1 flex cursor-pointer gap-2 lg:gap-5 items-center pl-0 lg:pl-16"
        onclick="window.location.href='{{ route('homepage') }}'">
        <img src="{{ asset('images/logo/1_transparent_logo_black_scroped.png') }}" class="h-14 md:h-20" alt="">
        <h2 class="uppercase text-xl md:4xl font-bold">HairClip</h2>
    </div>
    <ul class="flex gap-10 md:pr-40 items-center font-bold">
        <li class="invisible absolute md:static md:visible"><a href="#about">A propos</a></li>
        <li class="invisible absolute md:static md:visible"><a href="#footer">Contact</a></li>
        <li class="invisible absolute md:static md:visible">
            <a href="{{ route('admin.login') }}">
                <x-akar-person class="h-9 w-9" />
            </a>
        </li>
        <li class="mr-6 md:-ml-10">
            <a href="{{ route('shopping-cart.index') }}" class="flex gap-4">
                <div class="relative p-4">
                    <x-bx-cart class="h-9 w-9" />
                    <div class="absolute top-0 right-0 ...">
                        <spa id="total-cart-items"
                            class="inline-flex items-center rounded-full bg-white md:bg-gray-100 md:px-3 py-0.5 text-sm font-medium text-gray-800">
                            {{ Cart::count(true) }}</spa>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</header>

@section('script')
@endsection
