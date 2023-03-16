@extends('layouts.frontoffice')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('css/scroll-bar.css') }}" rel="stylesheet">
    <style>
        #fullpage {
            display: none;
            position: absolute;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-size: contain;
            background-repeat: no-repeat no-repeat;
            background-position: center center;
            background-color: rgba(0, 0, 0, 0.363);
        }
    </style>
@endpush

@section('content')
    {{-- stert-section-1 --}}

    <div class="-mt-24 container mx-auto">
        <div class="h-fit min-h-screen flex justify-center items-center">
            <div class=" h-fit flex flex-col lg:flex-row items-start justify-around gap-4 px-6">
                <div class="flex flex-1 flex-col gap-4 justify-center items-center md:items-start prose max-w-none md:px-10">
                    <h2 class="text-center mt-10 md:mt-0 lg:text-left text-5xl font-bold">Nouvelle génération <br> de
                        chouchou</h2>
                    <p class="text-center lg:text-left">Penatibus sem vitae mollis luctus mi tellus. Maximus eu eleifend
                        aptent dapibus metus maecenas consequat. Elementum interdum a
                        semper. Netus nullam eros nisi volutpat nibh ex ultricies. Pharetra
                        sagittis sit aliquet at. Magna nam platea justo.</p>
                    <button onclick="window.location.href='{{ route('product-overview', ['product_id' => 1]) }}'"
                        type="button"
                        class="self-center  rounded-md w-5/6 md:w-2/5 bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Voir plus</button>
                </div>
                <div class="flex-1">
                    <iframe src="https://drive.google.com/file/d/18bNS-Dh_KZczUoFnQ85EYILPfnCa8Npt/preview"
                        class="h-full w-full md:min-h-[400px]" allow="autoplay"></iframe>
                    {{-- <img src="{{ asset('images/chouchou_video.png') }}" alt=""> --}}
                </div>
            </div>
        </div>
    </div>
    <div id="fullpage" onclick="this.style.display='none';"></div>
    {{-- end-section-1 --}}
    {{-- start-section-2 --}}
    <div
        class="h-fit w-screen py-12 bg-stone-200 flex flex-col items-center justify-center prose max-w-none overflow-x-hidden">
        <h2 class="text-5xl ">Nos coloris</h2>
        <div class="flex justify-center items-center gap-8">
            <div>
                <x-gmdi-arrow-back-ios-new-r class="h-10 w-10" onclick="scrollProducts('l')" />
            </div>
            <div id="products" class="products flex gap-11 overflow-x-auto p-5" style="width: 41%">
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
    {{-- start-section-3 --}}
    <div id="about" class="container mx-auto">
        <div class="h-fit py-12 flex flex-col lg:flex-row justify-center items-center gap-8 ">
            <div class="flex-1 prose h-full max-w-none flex flex-col justify-center items-center">
                <div class="w-11/12 h-full flex flex-col justify-center">
                    <h2 class="text-5xl mt-0">Rétractable, souple <br>
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
            <div class="flex-1 flex justify-center">
                <img style="height: 600px;" class="self-center" src="{{ asset('images/chouchou_bleu.png') }}"
                    alt="">
            </div>
        </div>
    </div>

    {{-- start-section-3 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-4 --}}
    <div class="h-screen py-12 flex flex-col items-center justify-center prose max-w-none">
        <h2 class="text-5xl mt-0">Rétractable, souple et résistant.</h2>
        <button onclick="window.location.href='{{ route('product-overview', ['product_id' => 1]) }}'" type="button"
            class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            Voir plus</button>
        <br>
        <div class="gallery w-10/12 overflow-hidden grid grid-rows-2 place-content-center gap-7 grid-flow-col h-500 ">
            <div> <img style="width: 100%;height: 100%;object-fit: cover;" class="my-0 rounded-2xl"
                    src="{{ asset('images/images/HairClip-02.jpg') }}" alt=""></div>
            <div class="col-span-2"> <img style="width: 100%;height: 100%;object-fit: cover;" class="my-0 rounded-2xl"
                    src="{{ asset('images/images/HairClip-06.jpg') }}" alt="">
            </div>
            <div> <img style="width: 100%;height: 100%;object-fit: cover;" class="my-0  rounded-2xl"
                    src="{{ asset('images/images/HairClip-10.jpg') }}" alt=""></div>
            <div class="row-span-2"> <img style="width: 100%;height: 100%;object-fit: cover;" class="my-0  rounded-2xl"
                    src="{{ asset('images/images/HairClip-07.jpg') }}" alt="">
            </div>
        </div>
    </div>
    {{-- end-section-4 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-5 --}}
    <div class="h-fit px-16 py-12 bg-stone-200 flex flex-col justify-center items-center prose max-w-none ">
        <h2 class="text-5xl text-center">Témoignages</h2>
        <p class="text-center text-cyan-800">Nos clients sont ravis, c’est à votre tour !</p>
        <div class=" w-10/12 flex flex-col md:flex-row justify-around gap-2">
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
    <script>
        function getPics() {} //just for this demo
        const imgs = document.querySelectorAll('.gallery img');
        const fullPage = document.querySelector('#fullpage');

        imgs.forEach(img => {
            img.addEventListener('click', function() {
                fullPage.style.top = document.documentElement.scrollTop + "px"
                fullPage.style.backgroundImage = 'url(' + img.src + ')';
                fullPage.style.display = 'block';
            });
        });
    </script>
    <script>
        // Get all anchor tags that have a hash in their href attribute
        const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
        // Loop through all the anchor tags and add a click event listener
        smoothScrollLinks.forEach(link => {
            console.log("hey");
            link.addEventListener('click', function(event) {
                // Prevent the default behavior of the link
                event.preventDefault();

                // Get the target element based on the href attribute
                const targetElement = document.querySelector(this.getAttribute('href'));

                // Scroll smoothly to the target element
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
