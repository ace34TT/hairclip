@extends('layouts.frontoffice')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('css/scroll-bar.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="flex justify-center items-cente h-fit py-5">
        <div class="flex h-screen w-11/12">
            <div class="flex-1"></div>
            <div class="flex-1 bg-slate-100"></div>
        </div>
    </div>
@endsection