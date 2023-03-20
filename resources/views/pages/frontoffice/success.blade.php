@extends('layouts.frontoffice')

@section('title', 'Paiement effectué')

@section('content')
    <div class="flex justify-center items-cente h-fit md:max-h-screen">
        <div class="flex flex-col md:flex-row w-11/12">
            <div class="flex-1 flex flex-col gap-4 justify-center items-center prose max-w-none md:px-16">
                <x-gmdi-check-circle-outline-r class="h-28" style="color: #03524C" />
                <p class="text-xl font-bold m-0 text-center sm:text-left">Paiement effectué</p>
                {{-- <p class="text-xl font-bold m-0">Commande : 123456</p> --}}
                <p class="text-left m-0">
                    Nous avons bien reçu votre commande et sommes heureux de vous confirmer que votre achat a été effectué
                    avec succès.
                    <br> <br>
                    Nous sommes en train de préparer votre colis et vous tiendrons informé(e) de son expédition. Si vous
                    avez des questions ou des préoccupations, n'hésitez pas à nous contacter.
                    <br> <br>
                    Nous vous remercions de votre confiance et espérons que vous apprécierez votre achat. <br>
                </p>
                <button onclick="window.location.href='{{ route('homepage') }}'" type="button"
                    class="rounded-md bg-[#03524C] py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg--500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Retour sur la page d'accueil
                </button>
            </div>
            <div class="flex-1 invisible top-0 left-0 absolute md:visible md:static">
                <img src="{{ asset('images/images/HairClip-17.jpg') }}" style="height: 100%; width: 100%;" alt="">
            </div>
        </div>
    </div>
@endsection
