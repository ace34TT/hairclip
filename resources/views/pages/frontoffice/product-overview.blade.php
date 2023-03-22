@extends('layouts.frontoffice')

@section('title', 'Details produit')

@push('styles')
    <link href="{{ asset('css/confetti.css') }}" rel="stylesheet">
    <style>
        .active-selected-item {
            border: solid 2px black;
        }

        .inactive-selected-item {
            border: solid 2px white;
        }
    </style>
@endpush

@section('content')
    <div class="mx-auto max-w-2xl py-4 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-32">
            <h1 id="main-title-mobile" class="md:sr-only text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}
            </h1>
            <div class="h-full w-full rounded-md relative" id="product-color" style="background-color: {{ $product->value }}">
                <h1 id="main-title" class="mb-0 mt-8 ml-10 text-7xl text-slate-50 opacity-50 ">
                    {{ $product->name }}</h1>
                <div class="absolute bottom-20 -right-12">
                    <img id="product-preview" src="{{ asset('images/scranchies/' . $product->file_name) }}"
                        alt="Angled front view with bag zipped and handles upright."
                        class="m-0 h-72 w-72 object-cover object-center sm:rounded-lg">
                </div>
            </div>
            <!-- Product info -->
            <div class="mt-4 px-4 sm:px-0 lg:mt-0">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    <span class="sr-only md:not-sr-only" id="product-name"> {{ $product->name }}</span>
                    <span class="md:sr-only" id="product-price">{{ $product->price }} €</span>
                </h1>
                <div class="mt-3">
                    <p class="text-3xl tracking-tight text-gray-900 sr-only md:not-sr-only" id="product-price">
                        {{ $product->price }} €</p>
                </div>
                <div class="flex gap-4 items-center mt-4">
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
                                <li class="leading-5">Pratique pour maintenir les cheveux en place pendant les activités
                                    physiques.</li>
                                <li class="leading-5">Évite la casse des cheveux et préserve la santé capillaire.</li>
                                <li class="leading-5">Accessoire polyvalent pour créer des coiffures simples et élégantes.
                                </li>
                                <li class="leading-5">Peut être utilisé pour ajouter une touche de couleur ou d'élément
                                    décoratif aux cheveux.
                                </li>
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
                                    <label {{-- onclick="window.location.href='{{ route('product-overview', ['product_id' => $color->id]) }}'" --}} onclick="handleItem({{ $color->id }})"
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-700">
                                        <span aria-hidden="true" style="background-color: {{ $color->value }}"
                                            class="@if ($color->id === $product->id) active-selected-item @else inactive-selected-item @endif; color-picker h-8 w-8 rounded-full border border-opacity-10"
                                            data-product="{{ $color->id }}"></span>
                                    </label>
                                @endforeach
                            </span>
                        </fieldset>
                    </div>
                    <div class="mt-6 py-6 border-t-2 border-b-2">
                        <div class="flex justify-between items-center">
                            <div class="font-bold text-lg">Livraison </div>
                            <button class="mr-9 bg-slate-200" onclick="handleShippingInformation()">
                                <div class="plus">
                                    <div class="horizontal h-7 w-[2px] bg-black"></div>
                                    <div class="vertical h-7 w-[2px] -mt-7 bg-black rotate-90"></div>
                                </div>
                            </button>
                        </div>
                        <div class="mt-2 md:mt-4 h-0 absolute opacity-0" id="shipping-information">
                            <ul class="ml-3">
                                <li>1.99 € pour un achat de moins de 3 chouchou</li>
                                <li>4.99 € pour un achat de plus de 3 chouchou</li>
                                <li>Expédition en 24h et livraison sous 48h / 72h</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sm:flex-1 mt-10 flex">
                        <button id="add-to-cart-btn" type="button" class="confetti-button"
                            data-product-id="{{ $product->id }}" onclick="handleAddToChart()">
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($products->toArray()) }} --}}
    {{-- <button type="button" class="confetti-button">Click me!</button> --}}
@endsection
@section('script')
    {{-- confities js --}}
    <script type="module" src="{{ asset('js/confities.js') }}"></script>
    <script>
        var products = {{ Js::from($products->toArray()) }};
        var productBGColor = document.getElementById("product-color");
        var mainTitle = document.getElementById("main-title");
        var productPreview = document.getElementById("product-preview");
        var productName = document.getElementById("product-name");
        var productPrice = document.getElementById("product-price");
        var colorPicker = document.querySelectorAll(".color-picker");
        var btn = document.getElementById("add-to-cart-btn");

        function handleItem(itemId) {
            var clickedItem = products.find(item => item.id === itemId);
            productBGColor.style.backgroundColor = clickedItem.value;
            mainTitle.textContent = clickedItem.name;
            productPreview.src = "{{ asset('images/scranchies/') }}" + "/" +
                clickedItem.file_name;
            productName.innerText = clickedItem.name;
            colorPicker.forEach(box => {
                btn.dataset.productId = clickedItem.id;
                if (box.dataset.product === clickedItem.id.toString()) {
                    box.classList.remove("inactive-selected-item");
                    box.classList.add("active-selected-item");
                } else {
                    box.classList.remove("active-selected-item");
                    box.classList.add("inactive-selected-item");
                }
            });
        }
    </script>
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
            window.location.href = url + "/" + data.quantity.value
        }
    </script>
    <script>
        function handleAddToChart() {
            const submit_btn = document.getElementById("add-to-cart-btn");
            const productId = submit_btn.dataset.productId;
            let data = {
                quantity: {
                    element: document.getElementById("quantity"),
                    value: parseInt(document.getElementById("quantity").textContent)
                },
            }
            const url = `{{ route('shopping-cart.add-item') }}/${productId}/${data.quantity.value}`
            console.log(url);
            window.location.href = url;
        }
    </script>

    <script>
        let shippingVisibility = false;

        function handleShippingInformation() {
            if (shippingVisibility) {
                gsap.to("#shipping-information", {
                    // position: "absolute",
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
                    height: "75px",
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
