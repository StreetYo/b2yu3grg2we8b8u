@extends('frontend.body')

@section('content')
    @include('frontend.token.list')

    <div class="container px-5 pb-2 mx-auto">
        {{ $tokens->links() }}
    </div>
@endsection
