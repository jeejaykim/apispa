@extends('apispa.master')

@section('content')
    @include('home.preload')
    @include('home.slide')
    @include('home.table')
    {{-- @include('home.service') --}}
    @include('home.about')
@endsection