@extends('frontend.body')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-2">

                @foreach($tokens as $token)
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <a href="{{ route('tokens.show', ['token' => strtolower($token->symbol)]) }}">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">{{ $token->name }}</h2>
                                    <p class="text-gray-500">{{ $token->symbol }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <div class="container px-5 pb-2 mx-auto">
        {{ $tokens->links() }}
    </div>
@endsection
