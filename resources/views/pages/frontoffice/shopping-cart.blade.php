@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
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
                                                        src="{{ asset('images/scranchies/HairClip PackS HD-20.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <p class="text-2xl font-bold">Hair clip noir</p>
                                                    <p class="underline text-cyan-900">Supprimer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                            7€
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg align-middle">
                                            <div class="flex gap-8">
                                                <div
                                                    class="cursor-pointer w-7 h-7 rounded-full border border-black flex justify-center items-center">
                                                    <div class="text-3xl text-black">
                                                        -
                                                    </div>
                                                </div>
                                                <span>1</span>
                                                <div
                                                    class="cursor-pointer w-7 h-7 rounded-full border border-black flex justify-center items-center">
                                                    <div class="text-3xl text-black">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                            7€
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- bottom --}}
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle"></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                        <span class="text-black font-bold">
                                            Sous-total
                                        </span>
                                        <span class="text-black font-bold">7€</span>
                                    </td>
                                </tr>
                                {{--  --}}
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle"></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sml align-middle">
                                        <button type="button"
                                            class="rounded-md bg-cyan-800 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-cyan-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            Paaser la commande
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
