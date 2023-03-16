@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center items-cente h-fit ">
        <div class="flex flex-col md:flex-row h-fit min-h-screen w-11/12">
            <div class="flex-1 flex flex-col gap-4 justify-center items-center prose max-w-none px-16">
                <x-gmdi-check-circle-outline-r class="h-28" style="color: #03524C" />
                <p class="text-xl font-bold m-0 text-center sm:text-left">Paiement effectuee</p>
                {{-- <p class="text-xl font-bold m-0">Commande : 123456</p> --}}
                <p class="text-center m-0">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laudantium molestiae optio dolores
                    officia blanditiis sint enim doloremque ratione, reprehenderit facilis error, repellat rem. Ipsam quod
                    temporibus earum tempore quo?
                </p>
                <button onclick="window.location.href='{{ route('homepage') }}'" type="button"
                    class="rounded-md bg-[#03524C] py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg--500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Retrou sur la page d'accueil
                </button>
            </div>
            <div class="flex-1 invisible absolute top-0 left-0 md:static">
                <img src="{{ asset('images/images/HairClip-17.jpg') }}" style="height: 100%; width: 100%;" alt="">
            </div>
        </div>
    </div>
@endsection
