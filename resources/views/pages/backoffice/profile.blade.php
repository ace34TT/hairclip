@extends('layouts.admin-dashboard')

@section('title', 'profile')

@section('content')
    <h1>{{ Auth::user()->name }}</h1>
@endsection
