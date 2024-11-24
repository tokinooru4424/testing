<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Issue</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap-icons.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap-grid.min.css') }}"> --}}
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>