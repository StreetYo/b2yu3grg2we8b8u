@extends('frontend.body')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                        @isset($token->image->url)
                            <img alt="team" class="w-30 h-30 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400" src="{{ $token->image->url }}">
                        @endisset
                        <div class="flex flex-col items-center text-center justify-center">
                            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $token->name }} <span class="text-gray-400 text-sm">{{ $token->symbol }}</span></h2>
                            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                            <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken gentrify portland.</p>
                        </div>
                    </div>
                    <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        <p class="leading-relaxed text-lg mb-4">Meggings portland fingerstache lyft, post-ironic fixie man bun banh mi umami everyday carry hexagon locavore direct trade art party. Locavore small batch listicle gastropub farm-to-table lumbersexual salvia messenger bag. Coloring book flannel truffaut craft beer drinking vinegar sartorial, disrupt fashion axe normcore meh butcher. Portland 90's scenester vexillologist forage post-ironic asymmetrical, chartreuse disrupt butcher paleo intelligentsia pabst before they sold out four loko. 3 wolf moon brooklyn.</p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <div class="mx-auto container">
        <h1>Investors</h1>
        @include('frontend.investors.organization.list', ['investors' => $token->organizationInvestors])
    </div>
    <div class="mx-auto container">
        <h1>Individual investors</h1>
        @include('frontend.investors.individual.list', ['investors' => $token->individualInvestors])
    </div>
@endsection
