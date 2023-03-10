@extends('layouts.frontoffice')

@section('title', 'Home')

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
    <div class="h-screen bg-stone-200 flex flex-col items-center justify-center prose max-w-none">
        <h2 class="text-5xl">Nos Coloris</h2>
        <div class="flex justify-center items-center gap-8">
            <x-gmdi-arrow-back-ios-new-r class="h-36 w-36" />
            <x-hair-clip-card name="Framboise" colorValue="#8A0326" preview="c1.png"
                description="Pour une couleur qui se marie avec tout." />
            <x-hair-clip-card name="Framboise" colorValue="#838F8C" preview="c2.png"
                description="Pour une couleur qui se marie avec tout." />
            <x-hair-clip-card name="Framboise" colorValue="#827A31" preview="c3.png"
                description="Pour une couleur qui se marie avec tout." />
            <x-gmdi-arrow-back-ios-new-r style="transform: scaleX(-1);" class="h-36 w-36" />
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
    <div class="h-fit py-10 flex flex-col items-center justify-center prose max-w-none">
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
@endsection
