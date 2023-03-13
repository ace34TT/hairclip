@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
    <x-loading-screen />
    <div class="h-fit flex flex-col justify-center items-center prose max-w-none">
        <h2>Mon panier</h2>
        <a class="text-cyan-800" href="">Retrour sur la page d'accueil</a>
        <div class="px-4 w-10/12 sm:px-6 lg:px-8">
            <div class="mt-8 flow-root">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        Produit</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        Prix</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        Quantite</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                {{-- main data --}}
                                @foreach ($cart_items as $cart_item)
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            <div class="flex gap-10 items-center">
                                                <div class="w-56">
                                                    <img class="h-full w-full object-contain"
                                                        src="{{ asset('images/scranchies/' . $cart_item->file_name) }}"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <p class="text-2xl font-bold">{{ $cart_item->name }}
                                                        <span data-id="{{ $cart_item->id }}"
                                                            class="product_id hidden"></span>
                                                    </p>
                                                    <p class="underline text-cyan-900">Supprimer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                            <span data-price="" id="{{ 'product_' . $cart_item->id . '_price' }}">
                                                {{ $cart_item->price }}</span>
                                            €
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg align-middle">
                                            <div class="flex gap-8">
                                                <div class="cursor-pointer w-7 h-7 rounded-full border border-black flex justify-center items-center"
                                                    onclick="">
                                                    <div class="text-3xl text-black"
                                                        onclick="updateQuantity({{ $cart_item->id }} , -1)">
                                                        -
                                                    </div>
                                                </div>
                                                <span data-quantity=""
                                                    id={{ 'product_' . $cart_item->id . '_quantity' }}>1</span>
                                                <div
                                                    class="cursor-pointer w-7 h-7 rounded-full border border-black flex justify-center items-center">
                                                    <div class="text-3xl text-black"
                                                        onclick="updateQuantity({{ $cart_item->id }} , 1)">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                            <span data-subtotal="" id="{{ 'product_' . $cart_item->id . '_total' }}"
                                                class="sub_total_price">
                                                {{ $cart_item->price }}</span> €
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- bottom --}}
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                        <span class="text-black font-bold">
                                            Montont total :
                                        </span>
                                        <span data-total="" class="text-black font-bold underline">
                                            <span id="total_price"></span>
                                            €</span>
                                    </td>
                                </tr>
                                {{--  --}}
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sml align-middle">
                                        <button type="button"
                                            class="rounded-md bg-cyan-800 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-cyan-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                            onclick="postData()">
                                            <span id="is-not-loading"> Paaser la commande</span>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // define total price on page load
            updateTotalPrice()
        })

        function updateQuantity(productId, increment) {
            let data = {
                price: {
                    value: parseFloat(document.getElementById("product_" + productId + "_price").textContent)
                },
                quantity: {
                    element: document.getElementById("product_" + productId + "_quantity"),
                    value: parseInt(document.getElementById("product_" + productId + "_quantity").textContent)
                },
                total: {
                    element: document.getElementById("product_" + productId + "_total"),
                    value: parseFloat(document.getElementById("product_" + productId + "_total").textContent)
                }
            }
            //check if quantity is equal to 1 so we avoid quantity 0 or negativ value while dicreasing quantity
            if (data.quantity.value === 1 && increment === -1) return;
            //incrementing quantity
            data.quantity.value += increment;
            // updating quantity
            data.quantity.element.textContent = data.quantity.value;
            data.total.element.textContent = data.price.value * data.quantity.value;
            //
            updateTotalPrice();
        }

        function updateTotalPrice() {
            let subTotalPrices = document.querySelectorAll(".sub_total_price");
            let total = 0;
            // if there is no item in shopping cart
            if (addEventListener.length === 0) {
                document.getElementById("total_price").textContent = 0;
                return;
            }
            // else
            subTotalPrices.forEach(subTotal => {
                total += parseFloat(subTotal.textContent);
            });
            document.getElementById("total_price").textContent = total;
        }
    </script>
    <script>
        function postData() {
            const xhr = new XMLHttpRequest();
            1
            xhr.open('POST', 'http://127.0.0.1:8000/api/shopping-cart/update');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200 || xhr.status === 201) {
                    const response = JSON.parse(xhr.responseText);
                    console.log(response);
                } else {
                    console.log("Error:" + xhr.status);
                    console.error('Error:', xhr.statusText);
                }
            };
            xhr.onerror = function() {
                console.error('Network error');
            };
            xhr.addEventListener("loadstart", () => {
                showLoadingScrenn()
            });

            xhr.addEventListener("load", () => {
                hideLoadingScrenn()
            });
            //
            const data = generateData()
            const jsonData = JSON.stringify(data);
            xhr.send(jsonData);
        }

        function generateData() {
            let data = [];
            let items = document.querySelectorAll(".product_id");
            items.forEach((item) => {
                data.push({
                    product_id: item.getAttribute("data-id"),
                    quantity: parseInt(
                        document.getElementById(
                            "product_" + item.getAttribute("data-id") + "_quantity"
                        ).textContent
                    ),
                });
            });
            return data;
        }
    </script>

@endsection
