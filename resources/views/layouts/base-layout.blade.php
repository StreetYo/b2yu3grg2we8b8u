<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{isset($html_title) ? $html_title : env('APP_NAME')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
</head>
    <body class="{{isset($body_class) ? $body_class : ''}}">

        @yield('body')

        @livewireScripts
        <script src="{{ mix('js/app.js') }}}"></script>
    </body>
</html>
