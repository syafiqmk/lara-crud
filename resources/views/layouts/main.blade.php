<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- link css --}}
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    @include('components.navbar')

    <div class="container">
        @yield('content')
    </div>
    {{-- link script --}}
    <script src="/js/jquery-3.6.0.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>