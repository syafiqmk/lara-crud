<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- link css --}}
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    {{-- trix editor --}}
    <link rel="stylesheet" href="/css/trix.css">
    <script src="/js/trix.js"></script>

    {{-- style --}}
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .trix-button-group--file-tools {
            display: none !important;
        }
    </style>
</head>
<body>
    @include('components.dashboard.navbar')
    @include('components.dashboard.sidebar')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
        </div>

        @yield('content')
    </main>

    {{-- link js --}}
    <script src="/js/jquery-3.6.0.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
</body>
</html>