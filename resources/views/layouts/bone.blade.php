<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery Photo | @yield('title')</title>
    @stack('before-styles')
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    @stack('after-styles')
</head>

<body>

    @yield('content')

    @yield('footer')
    @stack('before-scripts')
    <script src="/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </script>
    <script src="/fontawesome/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
        });
    </script>
    @stack('after-scripts')
</body>

</html>
