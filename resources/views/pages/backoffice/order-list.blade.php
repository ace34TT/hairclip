@extends('layouts.admin-dashboard')

@section('title', 'Home')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Plans</h1>
                <p class="mt-2 text-sm text-gray-700">Your team is on the <strong
                        class="font-semibold text-gray-900">Startup</strong> plan. The next payment of $80 will be due on
                    August 4, 2022.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button"
                    class="block rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update
                    credit card</button>
            </div>
        </div>
        <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            ID</th>
                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">ID du
                            paiement
                        </th>
                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Client
                        </th>
                        <th scope="col"
                            class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Address de
                            livraison</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Quantity</span>
                        </th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Montant</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="max-w-screen-md overflow-scroll">
                    @foreach ($orders as $order)
                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <div class="font-medium text-gray-900">{{ $order['id'] }}</div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
                                <span>{{ $order['payment_intent_id'] }}</span>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
                                <span>{{ $order['customer_last_name'] . ' ' . $order['customer_first_name'] }}</span>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $order['customer_emil'] }}
                            </td>
                            <td class="px-3 py-3.5 text-sm text-gray-500">
                                {{ $order['shipping_address'] }}
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $order['quantity'] }}
                            </td>
                            <td class="relative py-3.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <button type="button"
                                    class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">Select<span
                                        class="sr-only">, Hobby</span></button>
                            </td>
                        </tr>
                    @endforeach




                    <!-- More plans... -->
                </tbody>
            </table>
        </div>
    </div>

@endsection
