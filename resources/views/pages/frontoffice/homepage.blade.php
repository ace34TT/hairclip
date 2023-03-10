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
                class="rounded-md bg-white py-2.5 px-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Button
                Voir plus</button>
        </div>
        <div>
            <img src="{{ asset('images/chouchou_video.png') }}" alt="">
        </div>
    </div>
    {{-- end-section-1 --}}
    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
    {{-- start-colors --}}
    <div class="h-screen flex justify-center items-center gap-4">
        <x-gmdi-arrow-back-ios-new-r class="h-36 w-36" />
        <x-hair-clip-card name="Framboise" colorValue="#8A0326" preview="c1.png"
            description="Pour une couleur qui se marie avec tout." />
        <x-hair-clip-card name="Framboise" colorValue="#8A0326" preview="c2.png"
            description="Pour une couleur qui se marie avec tout." />
        <x-hair-clip-card name="Framboise" colorValue="#8A0326" preview="c3.png"
            description="Pour une couleur qui se marie avec tout." />
        <x-gmdi-arrow-back-ios-new-r style="transform: scaleX(-1);" class="h-36 w-36" />
    </div>
    {{-- end-colors --}}
@endsection
