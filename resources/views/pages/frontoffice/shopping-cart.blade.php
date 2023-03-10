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
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        Lindsay Walton</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Front-end Developer</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">lindsay.walton@example.com
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">Member</td>
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
