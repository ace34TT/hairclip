@extends('layouts.frontoffice')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('css/scroll-bar.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- stert-section-1 --}}
    <div class="h-screen flex items-center justify-around">
        <div class="prose">
            <h2 class="text-4xl font-bold">Nouvelle génération de chouchou</h2>
            <p>Penatibus sem vitae mollis luctus mi tellus. Maximus eu eleifend
                aptent dapibus metus maecenas consequat. Elementum interdum a
                semper. Netus nullam eros nisi volutpat nibh ex ultricies. Pharetra
                sagittis sit aliquet at. Magna nam platea justo.</p>
            <button type="button"
                class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Voir plus</button>
        </div>
        <div>
            <img src="{{ asset('images/chouchou_video.png') }}" alt="">
        </div>
    </div>
    {{-- end-section-1 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-2 --}}
    <div class="h-screen w-screen py-4 bg-stone-200 flex flex-col items-center justify-center prose max-w-none">
        <h2 class="text-5xl">Nos Coloris</h2>
        <div class="flex justify-center items-center gap-8">
            <div>
                <x-gmdi-arrow-back-ios-new-r class="h-10 w-10" onclick="scrollProducts('l')" />
            </div>
            <div id="products" class="products flex gap-11 overflow-x-auto p-10" style="width: 40%">
                @foreach ($products as $product)
                    <x-hair-clip-card id="{{ $product->id }}" name="{{ $product->name }}"
                        colorValue="{{ $product->value }}" price="{{ $product->price }}" preview="{{ $product->file_name }}"
                        description="Pour une couleur qui se marie avec tout." />
                @endforeach
            </div>
            <div>
                <x-gmdi-arrow-back-ios-new-r style="transform: scaleX(-1);" class="h-10 w-10"
                    onclick="scrollProducts('r')" />
            </div>
        </div>
    </div>
    {{-- end-section-2 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-3 --}}
    <div class="h-screen flex justify-center items-center gap-8 ">
        <div class="prose h-full max-w-none flex flex-col justify-center items-center">
            <div class="w-11/12 h-full flex flex-col justify-center">
                <h2 class="text-6xl my-10">Rétractable, souple <br>
                    et résistant.</h2>
                <h2 class="text-cyan-900">Crée pour vous simplifier la vie </h2>
                <ul>
                    <li>Eco sustainable : All recyclable materials, 0% CO2 emissions</li>
                    <li>Hyphoallergenic : 100% natural, human friendly ingredients</li>
                    <li>Handmade : All candles are craftly made with love.</li>
                    <li>Long burning : No more waste. Created for last long.</li>
                </ul>
            </div>
        </div>
        <div>
            <img style="height: auto;" src="{{ asset('images/chouchou_bleu.png') }}" alt="">
        </div>
    </div>
    {{-- start-section-3 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-4 --}}
    <div class="h-fit py-10 my-10 flex flex-col items-center justify-center prose max-w-none">
        <h2 class="text-5xl my-10">Rétractable, souple et résistant.</h2>
        <button type="button"
            class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            Voir plus</button>
        <div class="w-10/12 h-2/6 grid grid-rows-2 place-content-center gap-7 grid-flow-col ">
            <div> <img style="width: 100%;height: 100%;object-fit: cover;" class="rounded-2xl"
                    src="{{ asset('images/chouchou1.png') }}" alt=""></div>
            <div class="col-span-2"> <img style="width: 100%;height: 100%;object-fit: cover;" class="rounded-2xl"
                    src="{{ asset('images/video.png') }}" alt="">
            </div>
            <div> <img style="width: 100%;height: 100%;object-fit: cover;" class="rounded-2xl"
                    src="{{ asset('images/chouchou2.png') }}" alt=""></div>
            <div class="row-span-2"> <img style="width: 100%;height: 100%;object-fit: cover;" class="rounded-2xl"
                    src="{{ asset('images/chouchou4.png') }}" alt="">
            </div>
        </div>
    </div>
    {{-- end-section-4 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-5 --}}
    <div class="h-screen bg-stone-200 flex flex-col justify-center items-center prose max-w-none py-14">
        <h2>Témoignages</h2>
        <p class="text-cyan-800">Nos clients sont ravis, c’est à votre tour !</p>
        <div class="w-10/12 flex  justify-around">
            <x-testimonial-card customerName="Luisa" customerProfile="messages-1.jpg"
                message="Je l’adore, je ne m’en sépare plus" stars=4 />
            <x-testimonial-card customerName="Edoardo" customerProfile="messages-3.jpg"
                message="Je le recommande pour toutes" stars=3 />
            <x-testimonial-card customerName="Mart" customerProfile="profile-img.jpg"
                message="Simple, efficace et de qualité" stars=5 />

        </div>
    </div>
@endsection

@section('script')
    <script>
        function scrollProducts(direction) {
            var productsContaier = document.getElementById("products");
            productsContaier.scrollTo({
                left: (direction === "r" ? productsContaier.scrollLeft : productsContaier.scrollRight) + 700,
                behavior: "smooth"
            });
        }
    </script>
@endsection
