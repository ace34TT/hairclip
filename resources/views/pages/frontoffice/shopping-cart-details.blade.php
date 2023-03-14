@extends('layouts.frontoffice')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center items-cente h-fit py-5">
        <div class="flex h-screen w-11/12">
            <div class="flex-1">
                <form action="{{ route('') }}" method="POST">
                </form>
            </div>
            <div class="flex-1 bg-slate-100"></div>
        </div>
    </div>
@endsection
