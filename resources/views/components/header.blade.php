<header class="flex my-4 justify-between items-center w-full md:h-24 bg-white">
    <div class="ml-4 md:ml-1 flex cursor-pointer gap-2 lg:gap-5 items-center pl-0 lg:pl-16"
        onclick="window.location.href='{{ route('homepage') }}'">
        <img src="{{ asset('images/logo/1_transparent_logo_black_scroped.png') }}" class="h-14 md:h-20" alt="">
        <h2 class="uppercase text-xl md:4xl font-bold">HairClip</h2>
    </div>
    <ul class="flex gap-10 md:pr-40 items-center ">
        <li class="invisible absolute md:static md:visible"><a href="#about">A propos</a></li>
        <li class="invisible absolute md:static md:visible"><a href="#footer">Contact</a></li>
        <li class="mr-6 md:mr-0">
            <a href="{{ route('shopping-cart.index') }}" class="flex gap-4">
                <div class="relative p-4">
                    <x-bx-cart class="h-9 w-9" />
                    <div class="absolute top-2 right-1 md:top-0 md:-right-3">
                        <spa id="total-cart-items"
                            class="inline-flex items-center rounded-full bg-white md:bg-gray-100 md:px-3 py-0.5 text-sm font-medium text-gray-800">
                            {{ Cart::count(true) }}</spa>
                    </div>
                </div>
            </a>
        </li>
        <li class="invisible absolute md:static md:visible">
            <button onclick="window.location.href='{{ route('product-overview', ['product_id' => 1]) }}'" type="button"
                class="md:w-44 rounded-md bg-d-green py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-d-green-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-d-green-100">
                Acheter </button>
        </li>
    </ul>
</header>

@section('script')
@endsection
