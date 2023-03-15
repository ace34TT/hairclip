@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center items-cente h-fit ">
        <div class="flex h-fit w-11/12">
            <div class="flex-1 flex flex-col gap-4 justify-center items-center prose max-w-none px-16">
                <x-gmdi-check-circle-outline-r class="h-28" style="color: #03524C" />
                <p class="text-xl font-bold m-0"> Paiement effectuee {{ '' }}"</p>
                <p class="text-xl font-bold m-0">Commande : 123456</p>
                <p class="text-center m-0">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laudantium molestiae optio dolores
                    officia blanditiis sint enim doloremque ratione, reprehenderit facilis error, repellat rem. Ipsam quod
                    temporibus earum tempore quo?
                </p>

                <button type="button"
                    class="rounded-md bg-[#03524C] py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg--500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Retrou sur la page d'accueil
                </button>


            </div>
            <div class="flex-1 bg-slate-100 px-7">
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
                                                                class="absolute top-0 right-0 px-2 py-1 bg-[#] text-white text-xs font-bold rounded">{{ $cart_item->qty }}</span>
                                                            <span
                                                                class="absolute top-0 right-0 px-2 py-1 bg-red text-white text-xs font-bold rounded">{{ $cart_item->qty }}</span>
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
                                                    {{ $cart_item->price }}</span> €
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
                                            <span class="text-black font-bold">
                                                Montont total :
                                            </span>
                                            <span data-total="" class="text-black font-bold underline">
                                                <span id="total_price"></span>
                                                €</span>
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
