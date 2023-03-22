@extends('layouts.frontoffice')

@section('title', 'Accueil')

@push('styles')
    <link href="{{ asset('css/scroll-bar.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{-- stert-section-1 --}}
    <div class="pt-10 container -mt-24 mx-auto h-fit min-h-screen flex justify-center items-center">
        <div class="w-full h-fit flex flex-col lg:flex-row items-start justify-around gap-4 px-4 md:px-4">
            <div class="flex-1 mb-5 :mb-0 relative">
                <img id="scranchie-1" class="absolute w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-19-min.webp') }}" alt="">
                <img id="scranchie-2" class="absolute w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-20-min.webp') }}" alt="">
                <img id="scranchie-3" class="absolute w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-21-min.webp') }}" alt="">
                <img id="scranchie-4" class="absolute w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-22-min.webp') }}" alt="">
                <img id="scranchie-5" class="absolute w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-23-min.webp') }}" alt="">
                <img id="scranchie-6" class="absolute w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-24-min.webp') }}" alt="">
                <img id="scranchie-7" class="absolute  w-64 h-64"
                    src="{{ asset('images/cropped-webp/HairClip PackS HD-25-min.webp') }}" alt="">
            </div>
            <div class="flex flex-1 flex-col items-end gap-4 md:items-start prose max-w-none md:pr-10">
                <h2 class="text-right my-1 md:mt-0 text-5xl font-bold">
                    Une <span class="text-d-green"> nouvelle génération </span> de chouchou
                </h2>
                <p class="text-right mb-0 ">
                    Simple, rapide, facile d'utilisation, et tellement léger qu'une fois mis en
                    place,on l'oublie. Tient très bien pour tout type de coiffure, chignon, queue de cheval, demie queue
                    etc..
                    Hair Clip permet de rassembler les cheveux d'un simple clip afin de dégager le contour du visage.
                </p>
                <div class="flex gap-5 justify-end items-center w-full">
                    <div class="flex justify-center items-center gap-2 text-zinc-900">
                        <x-akar-shipping-box-v2 class="w-7 ml-4" />
                        <p class="">
                            Recevez les le {{ $shipping_date }}
                        </p>
                    </div>
                    <button onclick="window.location.href='{{ route('product-overview', ['product_id' => 1]) }}'"
                        type="button"
                        class="rounded-md bg-d-green py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-d-green-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-d-green-100">
                        Acheter </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end-section-1 --}}
    {{-- start-section-2 --}}
    <div
        class="h-fit w-screen  py-4 md:py-12 bg-stone-200 flex flex-col items-center justify-center prose max-w-none overflow-x-hidden">
        <h2 class="text-5xl mb-4 md:mb-12 ">Nos coloris</h2>
        <div class="flex justify-center items-center gap-8">
            <div>
                <x-gmdi-arrow-back-ios-new-r class="h-10 w-10" onclick="scrollProducts('l')" />
            </div>
            <div id="products" class="products flex gap-3 md:gap-11 overflow-x-auto p-5">
                @foreach ($products as $product)
                    <x-hair-clip-card id="{{ $product->id }}" name="{{ $product->name }}"
                        colorValue="{{ $product->value }}" price="{{ $product->price }}"
                        preview="{{ $product->file_name }}" description="Pour une couleur qui se marie avec tout." />
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
    <div
        class="h-fit container mx-auto py-4 md:py-12 flex flex-col lg:flex-row justify-center items-center gap-4 md:gap-8 ">
        <div class="flex-1 flex justify-center">
            <div style="max-width: 95%; height: auto;">
                <div class="cursor-pointer " id="video-preview-1">
                    <img src="{{ asset('images/video-preview/video-preview-1.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="flex-1 prose h-full max-w-none flex flex-col justify-center items-center">
            <div class="w-11/12 h-full flex flex-col justify-center">
                <h2 class="text-5xl mt-0 mb-4 md:mb-12 text-left">Rétractable, souple <br>
                    et résistant.</h2>
                <h2 class="text-cyan-900 mb-0 md:mb-6">Crée pour vous simplifier la vie </h2>
                <ul class="mb-0 md:mb-7">
                    <li class="leading-5">Pratique pour maintenir les cheveux en place pendant les activités physiques.</li>
                    <li class="leading-5">Évite la casse des cheveux et préserve la santé capillaire.</li>
                    <li class="leading-5">Accessoire polyvalent pour créer des coiffures simples et élégantes.</li>
                    <li class="leading-5">Peut être utilisé pour ajouter une touche de couleur ou d'élément décoratif aux
                        cheveux.</li>
                </ul>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="pb-10 container mx-auto prose max-w-none flex justify-center gap-8">
        <div class="flex items-center gap-5 ">
            <div>
                <x-codicon-credit-card class="w-10" />
            </div>
            <div class="">
                <h2 class="m-0 font-bold text-d-green">Paiement Sécurisé</h2>
                <h3 class="m-0 font-bold text-gray-400">Toutes cartes accéptées</h3>
            </div>
        </div>
        <div class="flex items-center gap-5">
            <div>
                <x-lineawesome-shipping-fast-solid class="w-10" />
            </div>
            <div class="">
                <h2 class="m-0 font-bold text-d-green">Livraison Rapide</h2>
                <h3 class="m-0 font-bold text-gray-400">Recevez sous 72h</h3>
            </div>
        </div>
        <div class="flex items-center  gap-5">
            <div>
                <x-bi-check-circle class="w-10 h-10" />
            </div>
            <div class="">
                <h2 class="m-0 font-bold text-d-green">Qualité Garantie</h2>
                <h3 class="m-0 font-bold text-gray-400">Un produit garantie</h3>
            </div>
        </div>
        <div class="flex items-center  gap-5">
            <div>
                <x-bx-support class="w-10" />
            </div>
            <div class="">
                <h2 class="m-0 font-bold text-d-green">Support Client</h2>
                <h3 class="m-0 font-bold text-gray-400">Support mail 24h/24h</h3>
            </div>
        </div>
    </div>
    {{--  --}}
    {{-- end-section-3 --}}
    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-0">
    {{-- start-section-4 --}}
    <div class="container mx-auto ">
        <div class=" max-h-fit py-4 md:py-12 flex flex-col items-center justify-center prose max-w-none">
            <h2 class="text-5xl mt-0 mx-5 mb-6 md:mb-6">Rétractable, souple et résistant.</h2>
            <button id="gallery-btn" onclick="handleAdditionalGalleryImage()" type="button"
                class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Voir plus</button>
            <x-gallery />
        </div>
    </div>
    {{-- end-section-4 --}}
    <hr class="h-px bg-gray-200 border-0">
    {{-- start-section-5 --}}
    <div
        class="h-fit px-12 py-4 md:py-12 bg-stone-200 flex flex-col justify-center items-center prose max-w-none overflow-x-hidden">
        <h2 class="text-5xl text-center mb-4 md:mb-4">Témoignages</h2>
        <p class="text-center text-cyan-800 mb-0 md:mb-5">Nos clients sont ravis, c’est à votre tour !</p>
        <div class="flex justify-center items-center gap-8">
            <div>
                <x-gmdi-arrow-back-ios-new-r class="h-10 w-10" onclick="scrollOpinions('l')" />
            </div>
            <div id="opinions" class="opinions flex items-stretch  gap-2 md:gap-11 overflow-x-auto p-5">
                <x-testimonial-card customerName="Luisa" customerProfile="messages-1.jpg"
                    message="J'aime tellement mes nouveaux chouchous pour cheveux, je les recommande à tous mes amis !"
                    stars=4 />
                <x-testimonial-card customerName="Camille" customerProfile="messages-3.jpg"
                    message="Les chouchous pour cheveux que j'ai achetés sont exactement ce que je cherchais, merci !"
                    stars=3 />
                <x-testimonial-card customerName="Léa" customerProfile="profile-img.jpg"
                    message="Ce chouchou pour cheveux est si doux et confortable, je ne peux plus m'en passer!" stars=5 />
                <x-testimonial-card customerName="Chloé" customerProfile="messages-1.jpg"
                    message="Je recommande vivement ce chouchou pour cheveux, il est facile à utiliser et très résistant."
                    stars=4 />
                <x-testimonial-card customerName="Emma" customerProfile="messages-3.jpg"
                    message="Je suis très contente de mon achat de chouchou, ils sont frais et pratiques." stars=3 />
                <x-testimonial-card customerName="Zoé" customerProfile="profile-img.jpg"
                    message="Ces chouchous sont une excellente achat, je suis heureuse de les avoir achetés." stars=5 />
                <x-testimonial-card customerName="Manon" customerProfile="profile-img.jpg"
                    message="Je suis comblée par la qualité de ces chouchous, ils sont vraiment top." stars=5 />
                <x-testimonial-card customerName="Anaïs" customerProfile="messages-3.jpg"
                    message="J'ai craqué pour toutes les couleurs , ma fille est ravie." stars=3 />
            </div>
            <div>
                <x-gmdi-arrow-back-ios-new-r style="transform: scaleX(-1);" class="h-10 w-10"
                    onclick="scrollOpinions('r')" />
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        window.onload = function() {
            let scranchiesAnimation = new TimelineMax({
                // delay: 5,
                // duration: 5,
            });
            scranchiesAnimation
                .to(
                    "#scranchie-1", 1, {
                        rotate: "150deg",
                        x: 300,
                        y: -150
                    },
                )
                .to(
                    "#scranchie-2", 1, {
                        rotate: "150deg",
                        x: 400,
                        y: -200
                    },
                ).to(
                    "#scranchie-3", 1, {
                        rotate: "150deg",
                        x: 200,
                        y: -250
                    },
                ).to(
                    "#scranchie-4", 1, {
                        rotate: "150deg",
                        x: 150,
                        y: -100
                    },
                ).to(
                    "#scranchie-5", 1, {
                        rotate: "150deg",
                        x: 15,
                        y: -50
                    },
                ).to(
                    "#scranchie-6", 1, {
                        rotate: "150deg",
                        x: 300,
                        y: 250
                    },
                )
        };
    </script>
    <script>
        let showAdditionGallery = false;
        const col_1 = `<div id="first-gallery-additional-item" class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                <img alt="gallery"
                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item block h-full w-full rounded-lg object-cover object-center "
                    src="{{ asset('images/images/HairClip-04.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-05.jpg') }}" />
                </div>
                <div class="additional-item w-full p-1 md:p-2 max-h-96">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-06.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-07.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-08.jpg') }}" />
                </div>
                <div class="additional-item w-full p-1 md:p-2 max-h-96">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-09.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-10.jpg') }}" />
                </div>
                <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-11.jpg') }}" />
                </div>
                <div class="additional-item w-full p-1 md:p-2 max-h-96">
                    <img alt="gallery"
                        class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                        src="{{ asset('images/images/HairClip-12.jpg') }}" />
                </div>`;
        const col_2 = `<div class="additional-item w-full p-1 md:p-2 max-h-96">
                            <img alt="gallery"
                                class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                src="{{ asset('images/images/HairClip-16.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-17.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-18.jpg') }}" />
                            </div>
                            <div class="additional-item w-full p-1 md:p-2 max-h-96">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-19.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-22.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-21.jpg') }}" />
                            </div>
                            <div class="additional-item w-full p-1 md:p-2 max-h-96">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-22.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                                    src="{{ asset('images/images/HairClip-01.jpg') }}" />
                            </div>
                            <div class="additional-item w-1/2 p-1 md:p-2 max-h-80">
                                <img alt="gallery"
                                    class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
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
                gallery_btn.textContent = "Voir plus";
                resetGallery()
                showAdditionGallery = false;
            } else {
                col_1_last_element.insertAdjacentHTML('afterend', col_1);
                col_2_last_element.insertAdjacentHTML("afterend", col_2);
                scrollToAdditionalGalleryItems();
                gallery_btn.textContent = "Voir moins";
                resetGallery();
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

        function scrollOpinions(direction) {
            var opinionsContaier = document.getElementById("opinions");
            opinionsContaier.scrollTo({
                left: (direction === "r" ? opinionsContaier.scrollLeft : opinionsContaier.scrollRight) + 700,
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
