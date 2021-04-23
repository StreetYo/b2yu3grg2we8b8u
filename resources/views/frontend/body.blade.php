@extends('layouts.app')

@include('frontend.header')
@include('frontend.footer')

@section('body')
    @yield('header')

    @isset($slot)
        <div class="min-h-screen bg-gray-50">
            <main>
                {{ $slot }}
            </main>
        </div>
    @else
        <div class="min-h-screen">
            @yield('content')
        </div>
    @endisset

    @yield('footer')
@endsection
