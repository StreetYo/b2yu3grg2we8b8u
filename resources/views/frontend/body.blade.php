@extends('layouts.base-layout')

@include('frontend.header')
@include('frontend.footer')

@section('body')
    @yield('header')
    <div class="min-h-screen">
        @yield('content')
    </div>
    @yield('footer')
@endsection
