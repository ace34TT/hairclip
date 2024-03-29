@extends('layouts.frontoffice')

@section('title', 'Détails de la livraison')

@section('content')
    <div class="flex justify-center items-cente h-fit my-5 ">
        <div class="flex flex-col md:flex-row gap-4 bg-slate-50  md:gap-0 h-fit w-11/12 rounded-md">
            <div class="flex-1 flex flex-col gap-7 prose max-w-none justify-center items-start px-4 py-4 md:px-16">
                <h3>
                    <span class="text-black">
                        <span class="text-d-green">Panier > Livraison </span>
                        <span> > Paiement </span>
                    </span>
                </h3>
                <h1>Détails de la livraison </h1>
                <form id="shipping-form" action="{{ route('order.set-shipping') }}" method="POST">
                    @csrf
                    {{-- name --}}
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">Nom </label>
                            <div class="mt-2">
                                <input type="text" required name="firstname" id="firstname"
                                    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                            <div class="mt-2">
                                <input type="text" required name="lastname" id="lastname"
                                    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- contact --}}
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse
                                email</label>
                            <div class="mt-2">
                                <input type="email" required name="email" id="email"
                                    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Numéro de
                                téléphone</label>
                            <div class="mt-2">

                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        <img src="{{ asset('images/france.png') }}" class="my-0" height="15px"
                                            width="50px" alt="" srcset="">
                                    </span>
                                    <input type="tel" required name="phone" id="phone" placeholder="+33"
                                        class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                        aria-describedby="email-description">
                                </div>
                                <div id="phonenumber-error"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- shipping address --}}
                    <div class="flex-1">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> Adresse de la
                            livraison</label>
                        <div class="mt-2">
                            <input type="text" required name="shipping_address" id="shipping_address"
                                class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                aria-describedby="email-description">
                        </div>
                    </div>
                    <br>
                    {{--  --}}
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Ville</label>
                            <div class="mt-2">
                                <input type="town" required name="town" id="town"
                                    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Code Zip</label>
                            <div class="mt-2">
                                <input type="text" required name="zip_code" id="zip_code"
                                    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Département
                            </label>
                            <div class="mt-2">
                                <input type="text" required name="province" id="province"
                                    class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    aria-describedby="email-description">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 hidden absolute top-0 left-0">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"></label>
                        <div class="mt-2">
                            <input type="text" required name="carts" id="carts"
                                class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                aria-describedby="email-description" value="{{ json_encode(Cart::content()) }}">
                        </div>
                    </div>
                    <br>
                    <p class="my-0 font-bold">
                    <div class="flex justify-center items-start md:items-center gap-2 text-zinc-900">
                        <x-akar-shipping-box-v2 class="w-7 m-0 md:ml-4" />
                        <p class="m-0 sm:m-5 text-xs">
                            Expédition en 24h et livraison sous 48h/72h
                        </p>
                    </div>
                    <br>
                    <button type="submit"
                        class="float-right rounded-md bg-d-green py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-cyan-900-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Suivant</button>
                </form>
            </div>
            <div class="flex-1 bg-slate-100 px-5 sm:px-10  prose max-w-none rounded-md">
                <h1 class="text-center mx-auto mt-4 mb-0">Récapitulatif</h1>
                <div class="flow-root">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y my-0 divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                            Produits
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                            Prix
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    {{-- main data --}}
                                    @foreach (Cart::content() as $cart_item)
                                        <tr class="cart-item-row" data-quantity="{{ $cart_item->qty }}"
                                            data-row-id="{{ $cart_item->rowId }}">
                                            <td colspan="2"
                                                class="table-cell sm:hidden whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                <div class="flex gap-10 items-center">
                                                    <div class="w-fit sm:w-56">
                                                        <div class="relative" style="height: 150px; width: 150px;">
                                                            <img class="m-0 rounded-md"
                                                                style="height: 150px; width; 150px"
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
                                                class="hidden sm:table-cell whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                <div class="flex gap-10 items-center">
                                                    <div class="w-fit sm:w-56">
                                                        <div class="relative" style="height: 150px; width: 150px;">
                                                            <img class="m-0 rounded-md"
                                                                style="height: 150px; width; 150px"
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
                                                class="hidden sm:table-cell whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle text-end">
                                                <span data-subtotal="" id="{{ 'product_' . $cart_item->id . '_total' }}"
                                                    class="sub_total_price">
                                                    {{ $cart_item->price * $cart_item->qty }}</span> €
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- bottom --}}
                                    <tr>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span data-total="" class="text-black font-bold ">
                                                Sous-total : {{ Cart::total() }} € </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span data-total="" class="text-black font-bold ">
                                                Livraison : {{ Cart::count(true) < 3 ? 1.99 : 4.99 }} € </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span class="text-black font-bold underline">
                                                Montant total
                                            </span>
                                            <span data-total="" class="text-black font-bold ">
                                                <span id="total_price"> :
                                                    {{ Cart::total() + (Cart::count(true) < 3 ? 1.99 : 4.99) }} </span>
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
@section('script')
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script>
        const validator = new JustValidate('#shipping-form');
        validator
            .addField('#firstname', [{
                rule: 'required',
                errorMessage: 'Ce champs est obligatoire',
            }, ]).addField("#lastname", [{
                rule: "required",
                errorMessage: 'Ce champs est obligatoire',
            }]).addField("#email", [{
                rule: "required",
                errorMessage: 'Ce champs est obligatoire',
            }, {
                rule: "email",
                errorMessage: 'Mail incorrecte',
            }])
            // .addField("#phone", [{
            //     rule: "required",
            //     errorMessage: 'Ce champs est obligatoire',
            // }, {
            //     rule: 'customRegexp',
            //     value: /^(0|\+33)[1-9]([-. ]?\d{2}){4}$/,
            //     errorMessage: 'Valeur invalide!',
            //     errorsContainer: document.getElementById("")
            // }])
            .addField("#shipping_address", [{
                rule: "required",
                errorMessage: 'Ce champs est obligatoire',
            }]).addField("#town", [{
                rule: "required",
                errorMessage: 'Ce champs est obligatoire',
            }]).addField("#zip_code", [{
                rule: "required",
                errorMessage: 'Ce champs est obligatoire',
            }]).addField("#province", [{
                rule: "required",
                errorMessage: 'Ce champs est obligatoire',
            }]).onSuccess(() => {
                document.getElementById("shipping-form").submit();
                // console.log("success");
            })
    </script>
@endsection
