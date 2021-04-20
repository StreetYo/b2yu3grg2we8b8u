@extends('layouts.base-layout')

@include('frontend.header')
@include('frontend.footer')

@section('body')
    @yield('header')
    @yield('content')
    @yield('footer')
@endsection
