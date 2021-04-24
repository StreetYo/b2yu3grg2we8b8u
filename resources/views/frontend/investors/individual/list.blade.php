<section class="text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-wrap -m-2">

            @foreach($investors as $investor)
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
{{--                    <a href="{{ route('tokens.show', ['token' => strtolower($token->symbol)]) }}">--}}
                    <a>
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            @isset($investor->image->url)
                                <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ $investor->image->url }}">
                            @endisset
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">{{ $investor->first_name }} {{ $investor->last_name }}</h2>
                                <p class="text-gray-500">{{ $investor->title ?? '' }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
