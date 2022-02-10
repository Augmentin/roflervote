<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Vote</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('styles')
    @stack('scripts')
</head>
<body>
<div class="container p-0 w-100" style="max-width: inherit;"  id="main-page">
    @yield('content')
</div>

</body>
</html>