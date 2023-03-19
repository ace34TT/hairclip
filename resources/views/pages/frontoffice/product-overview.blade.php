@extends('layouts.frontoffice')

@section('title', 'Details produit')

@push('styles')
    <link href="{{ asset('css/confetti.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
            <!-- Image gallery -->
            <div class="flex flex-col-reverse">
                <!-- Image selector -->
                <div class="aspect-w-1 aspect-h-1 w-full">
                    <!-- Tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                        <img src="{{ asset('images/scranchies/' . $product->file_name) }}"
                            alt="Angled front view with bag zipped and handles upright."
                            class="h-full w-full object-cover object-center sm:rounded-lg">
                    </div>
                    <!-- More images... -->
                </div>
            </div>
            <!-- Product info -->
            <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>
                <div class="mt-3">
                    <h2 class="sr-only">Information du produit</h2>
                    <p class="text-3xl tracking-tight text-gray-900">{{ $product->price }} €</p>
                </div>
                <br>
                <div class="flex gap-8">
                    <x-ei-minus class="cursor-pointer w-7 h-7 flex justify-center items-center text-3xl text-black "
                        onclick="updateQuantity(-1)" />
                    <span data-quantity="" id="quantity">1
                    </span>
                    <x-ei-plus class="cursor-pointer w-7 h-7  text-3xl text-black" onclick="updateQuantity(1)" />
                </div>
                <section aria-labelledby="details-heading" class="mt-4">
                    <h2 id="details-heading" class="sr-only">Additional details</h2>
                    <div class="divide-y divide-gray-200">
                        <div class="prose prose-sm " id="disclosure-1">
                            <ul role="list">
                                <li>Multiple strap configurations</li>
                                <li>Spacious interior with top zip</li>
                                <li>Leather handle and tabs</li>
                            </ul>
                        </div>
                        <!-- More sections... -->
                    </div>
                </section>
                <div class="mt-6">
                    <!-- Colors -->
                    <div>
                        <h3 class="text-sm text-gray-600">Couleurs
                        </h3>
                        <fieldset class="mt-2">
                            <legend class="sr-only">Couleurs</legend>
                            <span class="flex items-center space-x-3">
                                @foreach ($colors as $color)
                                    <label
                                        onclick="window.location.href='{{ route('product-overview', ['product_id' => $color->id]) }}'"
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-700">
                                        <span aria-hidden="true"
                                            style="border : solid 2px @if ($color->id === $product->id) black @else white @endif; background-color: {{ $color->value }}"
                                            class="h-8 w-8  rounded-full border border-opacity-10"></span>
                                    </label>
                                @endforeach
                            </span>
                        </fieldset>
                    </div>
                    <div class="mt-6 py-6 border-t-2 border-b-2">
                        <div class="flex justify-between items-center">
                            <div class="font-bold text-lg">Livraison & retours </div>
                            <button class="mr-9" onclick="handleShippingInformation()">
                                <div class="plus">
                                    <div class="horizontal h-7 w-1 bg-black"></div>
                                    <div class="vertical h-7 w-1 -mt-7 bg-black rotate-90"></div>
                                </div>
                            </button>
                        </div>
                        <div class="mt-4 h-0 absolute opacity-0" id="shipping-information">
                            <ul class="ml-3">
                                <li>1.99 € pour un achat de moins de 3 chouchou</li>
                                <li>4.99 € pour un achat de plus de 3 chouchou</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sm:flex-1 mt-10 flex">
                        <button type="button" class="confetti-button"
                            onclick="cust_redirect('{{ route('shopping-cart.add-item', ['product_id' => $product->id]) }}')">
                            Ajouter
                            au panier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <button type="button" class="confetti-button">Click me!</button> --}}
@endsection
@section('script')
    {{-- confities js --}}
    <script type="module" src="{{ asset('js/confities.js') }}"></script>

    {{--  --}}
    <script>
        function updateQuantity(increment) {
            let data = {
                quantity: {
                    element: document.getElementById("quantity"),
                    value: parseInt(document.getElementById("quantity").textContent)
                },
            }
            //check if quantity is equal to 1 so we avoid quantity 0 or negativ value while dicreasing quantity
            if (data.quantity.value === 1 && increment === -1) return;
            // incrementing quantity
            data.quantity.value += increment;
            // updating quantity in the DOM
            data.quantity.element.textContent = data.quantity.value;
        }

        function cust_redirect(url) {
            let data = {
                quantity: {
                    element: document.getElementById("quantity"),
                    value: parseInt(document.getElementById("quantity").textContent)
                },
            }
            window.location.href = url + "/" + data.quantity.value
        }
    </script>
    <script>
        let shippingVisibility = false;

        function handleShippingInformation() {
            if (shippingVisibility) {
                gsap.to("#shipping-information", {
                    position: "absolute",
                    height: "0",
                    opacity: "0",
                });
                gsap.to(".horizontal", {
                    opacity: "1",
                    rotate: "0",
                });
                shippingVisibility = false;
            } else {
                gsap.to("#shipping-information", {
                    position: "static",
                    height: "50px",
                    opacity: "1",
                });
                gsap.to(".horizontal", {
                    opacity: "0",
                    rotate: "90",
                });
                shippingVisibility = true;
            }
        }
    </script>
@endsection
