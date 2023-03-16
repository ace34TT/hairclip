@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
    <div class="bg-white">
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
                        <p class="text-3xl tracking-tight text-gray-900">{{ $product->price }}</p>
                    </div>
                    <br>
                    <div class="flex gap-8">
                        <div class="cursor-pointer w-7 h-7 rounded-full border border-black flex justify-center items-center"
                            onclick="">
                            <div onclick="updateQuantity(-1)" class="text-3xl text-black" onclick="">
                                -
                            </div>
                        </div>
                        <span data-quantity="" id="quantity">1</span>
                        <div
                            class="cursor-pointer w-7 h-7 rounded-full border border-black flex justify-center items-center">
                            <div onclick="updateQuantity(1)" class="text-3xl text-black" onclick="">
                                +
                            </div>
                        </div>
                    </div>
                    <section aria-labelledby="details-heading" class="mt-12">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>
                        <div class="divide-y divide-gray-200 border-t">
                            <div class="prose prose-sm pb-6" id="disclosure-1">
                                <ul role="list">
                                    <li>Multiple strap configurations</li>
                                    <li>Spacious interior with top zip</li>
                                    <li>Leather handle and tabs</li>
                                </ul>
                            </div>
                            <!-- More sections... -->
                        </div>
                    </section>
                    <form class="mt-6">
                        <!-- Colors -->
                        <div>
                            <h3 class="text-sm text-gray-600">Color</h3>
                            <fieldset class="mt-2">
                                <legend class="sr-only">Couleurs</legend>
                                <span class="flex items-center space-x-3">
                                    @foreach ($colors as $color)
                                        <label
                                            onclick="window.location.href='{{ route('product-overview', ['product_id' => $color->id]) }}'"
                                            class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-700">
                                            <input type="radio" name="color-choice" value="Washed Black" class="sr-only"
                                                aria-labelledby="color-choice-0-label">
                                            <span id="color-choice-0-label" class="sr-only"> Washed Black </span>
                                            <span aria-hidden="true" style="background-color: {{ $color->value }}"
                                                class="h-8 w-8  rounded-full border border-black border-opacity-10"></span>
                                        </label>
                                    @endforeach
                                </span>
                            </fieldset>
                        </div>
                        @if (session('success'))
                            <br>
                            <div class="text-green-700 font-bold">
                                Ajout effecte
                            </div>
                        @endif
                        <div class="sm:flex-col1 mt-10 flex">
                            <button type="button"
                                class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-black py-3 px-8 text-base font-medium text-white hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-zinc-700 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full"
                                onclick="cust_redirect('{{ route('shopping-cart.add-item', ['product_id' => $product->id]) }}')">Ajouter
                                au panier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
            // console.log(url + "/&quantity=" + data.quantity.value);
            window.location.href = url + "/" + data.quantity.value
        }
    </script>
@endsection