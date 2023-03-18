@extends('layouts.frontoffice')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('css/scroll-bar.css') }}" rel="stylesheet">
    <style>
        #fullpage {
            visibility: hidden;
            position: absolute;
            z-index: 9999;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            padding-top: 64px;
            padding-bottom: 64px;
            background-color: rgba(0, 0, 0, 0.5);
            filter: blur(1);
        }

        #full_image {
            width: 50vw;
            height: 80vh;
            background-size: cover;
            background-repeat: no-repeat no-repeat;
            background-position: center center;
        }
    </style>
@endpush

@section('content')
    {{-- stert-section-1 --}}
    <div class="md:-mt-24 container mx-auto ">
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
                <div class="flex-1 flex justify-center mb-5 :mb-0 ">
                    <iframe src="https://drive.google.com/file/d/18bNS-Dh_KZczUoFnQ85EYILPfnCa8Npt/preview"
                        class="h-full w-full md:min-h-[400px]" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
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
                    <h2 class="text-5xl mt-0 text-left">Rétractable, souple <br>
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
                <div style="max-width: 100%; height: auto;">
                    <img style=" width: 100% ; height: 600px;" class="self-center"
                        src="{{ asset('images/images/HairClip-09.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    {{-- start-section-3 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-4 --}}
    <div class="container mx-auto">
        <div class="h-screen py-12 flex flex-col items-center justify-center prose max-w-none">
            <h2 class="text-5xl mt-0 mx-5">Rétractable, souple et résistant.</h2>
            <button onclick="window.location.href='{{ route('product-overview', ['product_id' => 1]) }}'" type="button"
                class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Voir plus</button>
            <br>
            <div class="gallery w-10/12 overflow-hidden grid grid-rows-2 place-content-center gap-7 grid-flow-col h-500 ">
                <div class="cursor-pointer rounded-2x">
                    <img style="width: 100%;height: 100%;object-fit: cover;"
                        class="my-0 l hover:scale-105 transition ease-in-out"
                        src="{{ asset('images/images/HairClip-16.jpg') }}" alt="">
                </div>
                <div class="col-span-2 rounded-2xl hover:scale-105 transition ease-in-out">
                    {{-- <iframe src="https://drive.google.com/file/d/18bNS-Dh_KZczUoFnQ85EYILPfnCa8Npt/preview" class="h-full"
                        allow="autoplay"></iframe> --}}
                    <img style="width: 100%;height: 100%;object-fit: cover;" class="my-0 cursor-pointer"
                        src="{{ asset('images/images/HairClip-03.jpg') }}" alt="">
                </div>
                <div class="cursor-pointer rounded-2xl hover:scale-105 transition ease-in-out"> <img
                        style="width: 100%;height: 100%;object-fit: cover;" class="my-0 "
                        src="{{ asset('images/images/HairClip-15.jpg') }}" alt=""></div>
                <div class="row-span-2 rounded-2xl cursor-pointer hover:scale-105 transition ease-in-out"> <img
                        style="width: 100%;height: 100%;object-fit: cover;" class="my-0"
                        src="{{ asset('images/images/HairClip-07.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div id="fullpage" class="flex justify-around gap-10">
        <div class="left-arrow h-96 flex items-center hover:bg-white hover:bg-opacity-10 transition ease-in-out">
            <x-gmdi-arrow-back-ios-new-r class="h-10 w-10 text-white" onclick="scrollProducts('l')" />
        </div>
        <div id="full_image" class="rounded-lg">
        </div>
        <div class="right-arrow h-96 flex items-center hover:bg-white hover:bg-opacity-10 transition ease-in-out">
            <x-gmdi-arrow-back-ios-new-r style="transform: scaleX(-1);" class="h-10 w-10 text-white"
                onclick="scrollProducts('r')" />
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
        const imgs = document.querySelectorAll('.gallery img');
        const container = document.querySelector('#fullpage');
        const image = document.querySelector("#full_image");
        let current_index = 0;
        //
        imgs.forEach((img) => {
            img.addEventListener('click', function(e) {
                container.style.top = document.documentElement.scrollTop + "px"
                container.style.visibility = 'visible';
                image.style.backgroundImage = 'url(' + img.src + ')';
                //
                current_index = Array.prototype.indexOf.call(imgs, img);
                disableScroll(e);
            });
        });

        function disableScroll() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            window.onscroll = function() {
                window.scrollTo(scrollLeft, scrollTop);
            };
        }
        container.addEventListener("click", function(e) {
            e.stopPropagation();
            if (e.target !== e.currentTarget) return;
            container.style.visibility = "hidden"
            window.onscroll = function() {};
        })
        //
        const left_arrow = document.querySelector('.left-arrow');
        const right_arrow = document.querySelector('.right-arrow');
        //
        left_arrow.addEventListener('click', (e) => {

            if (current_index === 0) {
                image.style.backgroundImage = 'url(' + imgs[imgs.length - 1].src + ')';
                current_index = imgs.length - 1;
                return;
            }
            image.style.backgroundImage = 'url(' + imgs[current_index - 1].src + ')';
            current_index--;

        });
        right_arrow.addEventListener('click', (e) => {
            if (current_index === imgs.length - 1) {
                image.style.backgroundImage = 'url(' + imgs[0].src + ')';
                current_index = 0;
                return;
            }
            image.style.backgroundImage = 'url(' + imgs[current_index + 1].src + ')';
            current_index++;
        });
    </script>
    <script>
        const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
        smoothScrollLinks.forEach(link => {
            console.log("hey");
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetElement = document.querySelector(this.getAttribute('href'));
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
