@extends('layouts.frontoffice')

@section('title', 'Mon panier')

@section('content')
    <x-loading-screen />
    <div
        class="h-fit min-h-screen flex flex-col @if (Cart::count() === 0) justify-center @else justify-start @endif items-center prose max-w-none">
        <h2>Mon panier</h2>
        <a class="text-cyan-800" href="{{ route('homepage') }}">Retrour sur la page d'accueil</a>
        <br>
        @if (count(Cart::content()) === 0)
            <div>
                Votre panier est vide
            </div>
        @else
            <form class="hidden absolute top-0 left-0" action="{{ route('shopping-cart.update-items') }}" method="POST">
                @csrf
                <input id="rows-json-data" style="border: solid black 1px" type="text" name="updated_data">
                <input type="submit" id="proceed-to-payment">
            </form>
            <div class="px-4 w-10/12 sm:px-6 lg:px-8">
                <div class="mt-8 flow-root">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                            Produit(s)</th>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                            Prix</th>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                            Quantité</th>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                            Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    {{-- main data --}}
                                    @foreach (Cart::content() as $cart_item)
                                        <tr class="cart-item-row" data-quantity="{{ $cart_item->qty }}"
                                            data-row-id="{{ $cart_item->rowId }}">
                                            <td
                                                class="whitespace-nowrap  pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                <div class="flex gap-10 items-center">
                                                    <div class="w-56">
                                                        <img class="h-28 w-28 object-contain my-0"
                                                            src="{{ asset('images/scranchies/' . $cart_item->options['top_view']) }}"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <p class="text-2xl font-bold">{{ $cart_item->model->name }}
                                                            <span data-id="{{ $cart_item->id }}"
                                                                class="product_id hidden"></span>
                                                        </p>
                                                        <a class="underline text-cyan-900"
                                                            href="{{ route('shopping-cart.remove-item', ['rowId' => $cart_item->rowId]) }}">Supprimer</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap  px-3 text-lg font-bold text-black align-middle">
                                                <span class="text-center" data-price=""
                                                    id="{{ 'product_' . $cart_item->id . '_price' }}">
                                                    {{ $cart_item->price }}</span>
                                                €
                                            </td>
                                            <td class="whitespace-nowrap  px-3 text-lg align-middle">
                                                <div class="flex gap-8">
                                                    <x-ei-minus
                                                        class="cursor-pointer w-7 h-7 flex justify-center items-center text-3xl text-black "
                                                        onclick="updateQuantity('{{ $cart_item->rowId }}', {{ $cart_item->id }} , -1)" />
                                                    <span data-quantity=""
                                                        id={{ 'product_' . $cart_item->id . '_quantity' }}>{{ $cart_item->qty }}
                                                    </span>
                                                    <x-ei-plus class="cursor-pointer w-7 h-7  text-3xl text-black"
                                                        onclick="updateQuantity('{{ $cart_item->rowId }}', {{ $cart_item->id }} , 1)" />
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap  px-3 text-lg font-bold text-black align-middle">
                                                <span data-subtotal="" id="{{ 'product_' . $cart_item->id . '_total' }}"
                                                    class="sub_total_price">
                                                    {{ $cart_item->price * $cart_item->qty }}</span> €
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- bottom --}}
                                    <tr>
                                        <td class="whitespace-nowrap  pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        </td>
                                        <td class="whitespace-nowrap  px-3 text-lg font-bold text-black align-middle">
                                        </td>
                                        <td class="whitespace-nowrap  px-3 text-lg align-middle"></td>
                                        <td class="whitespace-nowrap  px-3 text-sml align-middle text-xl">
                                            <span class="text-black font-bold">
                                                Sous-total :
                                            </span>
                                            <span data-total="" class="text-black font-bold underline">
                                                <span id="total_price"></span>
                                                €</span>
                                        </td>
                                    </tr>
                                    {{--  --}}
                                    <tr>
                                        <td class="whitespace-nowrap  pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            <h3>Livraison : </h3>
                                            <ul class="ml-3">
                                                <li>1.99 pour un achat de moins de 3 chouchou</li>
                                                <li>4.99 pour un achat de plus de 3 chouchou</li>
                                                <li>Expédition en 24h et livraison sous 48 / 72h</li>
                                            </ul>
                                        </td>
                                        <td class="whitespace-nowrap  px-3 text-lg font-bold text-black align-middle">
                                        </td>
                                        <td class="whitespace-nowrap  px-3 text-lg align-middle"></td>
                                        <td class="whitespace-nowrap  px-3 text-sml align-middle">
                                            <button onclick="proceedToPayment()" type="button"
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
        @endif
        {{-- hidden form that will contains all the data to update or to proceed form payment --}}
    </div>
@endsection
@section('script')
    @if (count(Cart::content()) >= 0)
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log(window.onpagehide !== undefined ? "pagehide is supported" : "pagehide is not supported");
                initJsondata()
                // define total price on page load
                updateTotalPrice()
            })

            function updateQuantity($rowId, productId, increment) {
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
                // update json
                updateJSONData($rowId, increment);
                // incrementing quantity
                data.quantity.value += increment;
                // updating quantity in the DOM
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

            function initJsondata() {
                let rows = document.querySelectorAll(".cart-item-row");
                let data = [];
                rows.forEach(cartItem => {
                    data.push({
                        "rowId": cartItem.dataset.rowId,
                        "quantity": cartItem.dataset.quantity,
                    })
                });
                document.getElementById("rows-json-data").value = JSON.stringify(data);
            }

            function updateJSONData(rowId, increment) {
                const data = JSON.parse(document.getElementById("rows-json-data").value);
                const index = data.findIndex((obj => obj.rowId === rowId));
                data[index].quantity = parseInt(data[index].quantity) + parseInt(increment);
                document.getElementById("rows-json-data").value = JSON.stringify(data);
                // update total items
                const sum = data.reduce((acc, obj) => {
                    return parseInt(acc) + parseInt(obj.quantity);
                }, 0);
                document.getElementById("total-cart-items").textContent = sum;
            }
        </script>
        <script>
            function proceedToPayment() {
                document.getElementById("proceed-to-payment").click();
            }
        </script>
    @endif

@endsection
