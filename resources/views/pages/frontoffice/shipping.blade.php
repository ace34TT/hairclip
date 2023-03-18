@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center items-cente h-fit ">
        <div class="flex flex-col md:flex-row gap-4 md:gap-0 h-fit w-11/12">
            <div class="flex-1 flex flex-col gap-7 prose max-w-none justify-center items-start my-7 md:px-16">
                <h3><span class="text-black"> <span class="text-d-green">Panier > </span> <span class="underline text-black">
                            livraison</span> > Paiement </span></h3>
                <h1>Contact et livraison </h1>
                <form action="{{ route('order.set-shipping') }}" method="POST">
                    @csrf
                    {{-- name --}}
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">
                                <input type="text" name="firstname" id="firstname"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Prenom</label>
                            <div class="mt-2">
                                <input type="text" name="lastname" id="lastname"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- contact --}}
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Addresse
                                email</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="phone"
                                class="block text-sm font-medium leading-6 text-gray-900">Telephone</label>
                            <div class="mt-2">
                                <input type="text" name="phone" id="phone"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- shipping address --}}
                    <div class="flex-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Addresse de la
                            livraison</label>
                        <div class="mt-2">
                            <input type="text" name="shipping_address" id="shipping_address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                aria-describedby="email-description">
                        </div>
                    </div>
                    <br>
                    {{--  --}}
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Province
                            </label>
                            <div class="mt-2">
                                <input type="text" name="province" id="province"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Ville</label>
                            <div class="mt-2">
                                <input type="town" name="town" id="town"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Code Zip</label>
                            <div class="mt-2">
                                <input type="text" name="zip_code" id="zip_code"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 hidden absolute top-0 left-0">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"></label>
                        <div class="mt-2">
                            <input type="text" name="address" id="address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                aria-describedby="email-description" value="{{ json_encode(Cart::content()) }}">
                        </div>
                    </div>
                    <br>
                    <button type="submit"
                        class="float-right rounded-md bg-d-green py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-cyan-900-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Suivant</button>
                </form>
            </div>
            <div class="flex-1 bg-slate-100 px-10">
                <div class="mt-8 flow-root">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    {{-- main data --}}
                                    @foreach (Cart::content() as $cart_item)
                                        <tr class="cart-item-row" data-quantity="{{ $cart_item->qty }}"
                                            data-row-id="{{ $cart_item->rowId }}">
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                <div class="flex gap-10 items-center">
                                                    <div class="w-56">
                                                        <div class="relative" style="height: 150px; width: 150px;">
                                                            <img class="m-0" style="height: 150px; width; 150px"
                                                                src="{{ asset('images/scranchies/' . $cart_item->options['top_view']) }}"
                                                                alt="">
                                                            <span
                                                                class="absolute top-0 right-0 px-2 py-1 bg-[#03524C] text-white text-xs font-bold rounded">{{ $cart_item->qty }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="text-2xl font-bold text-[#03524C]">
                                                            {{ $cart_item->model->name }}
                                                            <span data-id="{{ $cart_item->id }}"
                                                                class="product_id hidden"></span>
                                                        </p>
                                                        <br>
                                                        <span>
                                                            <span data-price=""
                                                                id="{{ 'product_' . $cart_item->id . '_price' }}">
                                                                {{ $cart_item->price }}</span>
                                                            €
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                            </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-lg align-middle">
                                                <div class="flex gap-8 text-center">
                                                </div>
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle text-end">
                                                <span data-subtotal="" id="{{ 'product_' . $cart_item->id . '_total' }}"
                                                    class="sub_total_price">
                                                    {{ $cart_item->price * $cart_item->qty }}</span> €
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- bottom --}}
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span data-total="" class="text-black font-bold ">
                                                Sous-total : {{ Cart::total() }} € </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span data-total="" class="text-black font-bold ">
                                                livrison : {{ Cart::count(true) <= 3 ? 1.99 : 4.99 }} € </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span class="text-black font-bold underline">
                                                Montont total
                                            </span>
                                            <span data-total="" class="text-black font-bold ">
                                                <span id="total_price"> :
                                                    {{ Cart::total() + (Cart::count(true) <= 3 ? 1.99 : 4.99) }} </span>
                                                € </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
