@extends('layouts.frontoffice')

@section('title', 'Accueil')

@push('styles')
    <link href="{{ asset('css/scroll-bar.css') }}" rel="stylesheet">
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
                    <img style=" width: 100% ; height: auto;" class="self-center"
                        src="{{ asset('images/images/HairClip-09.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    {{-- start-section-3 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-section-4 --}}
    <div class="container mx-auto">
        <div class=" max-h-fit py-12 flex flex-col items-center justify-center prose max-w-none">
            <h2 class="text-5xl mt-0 mx-5">Rétractable, souple et résistant.</h2>
            <button id="gallery-btn" onclick="handleAdditionalGalleryImage()" type="button"
                class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Voir plus</button>
            <br>
            <x-gallery />
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
        let showAdditionGallery = false;
        const col_1 = `<div id="first-gallery-additional-item" class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                <img alt="gallery"
                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                    src="{{ asset('images/images/HairClip-04.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-05.jpg') }}" />
                </div>
                <div class="additional-item w-full p-1 md:p-2 max-h-96">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-06.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-07.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-08.jpg') }}" />
                </div>
                <div class="additional-item w-full p-1 md:p-2 max-h-96">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-09.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-10.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-11.jpg') }}" />
                </div>
                <div class="additional-item w-full p-1 md:p-2 max-h-96">
                    <img alt="gallery"
                        class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-12.jpg') }}" />
                </div>`;
        const col_2 = `<div class="additional-item w-full p-1 md:p-2 max-h-96">
                            <img alt="gallery"
                                class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                src="{{ asset('images/images/HairClip-16.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-17.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-18.jpg') }}" />
                            </div>
                            <div class="additional-item w-full p-1 md:p-2 max-h-96">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-19.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-22.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-21.jpg') }}" />
                            </div>
                            <div class="additional-item w-full p-1 md:p-2 max-h-96">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-22.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-01.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-10.jpg') }}" />
                            </div>`;

        const col_1_last_element = document.getElementById('last-col-1-item');
        const col_2_last_element = document.getElementById('last-col-2-item');
        const gallery_btn = document.getElementById('gallery-btn');

        function handleAdditionalGalleryImage() {
            if (showAdditionGallery) {
                var elementsToRemove = document.getElementsByClassName('additional-item');
                while (elementsToRemove.length > 0) {
                    elementsToRemove[0].parentNode.removeChild(elementsToRemove[0]);
                }
                // btn.textContent("voir plus")
                showAdditionGallery = false;
            } else {
                col_1_last_element.insertAdjacentHTML('afterend', col_1);
                col_2_last_element.insertAdjacentHTML("afterend", col_2);
                scrollToAdditionalGalleryItems();
                // btn.textContent("voir moins")
                showAdditionGallery = true;
            }
        }

        function scrollToAdditionalGalleryItems() {
            const div = document.getElementById('first-gallery-additional-item');
            div.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    </script>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
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
        const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
        smoothScrollLinks.forEach(link => {
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
