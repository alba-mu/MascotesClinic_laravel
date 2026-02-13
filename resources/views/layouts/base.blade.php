<!DOCTYPE html>
<html lang="ca">
    <head>
        <title>@yield('title', 'Mascotes Clinic')</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
    </head>
    <body class="clinic-body">
        <div id="page">
            <header class="navbar navbar-expand-xl shadow-sm clinic-header">
                <div class="container-fluid">
                    <a href="http://www.ies-provensana.com" class="d-flex align-items-center text-decoration-none">
                        <img src="{{ asset('img/proven.jpg') }}" alt="proven.jpg" class="img rounded-circle shadow-sm logo-img">
                    </a>
                    <h4 class="ms-3 mb-0 fw-bold header-title">
                        <i class="bi bi-building me-2"></i>Institut Provençana
                    </h4>
                </div>
            </header>

            @include('partials.menu')

            <main class="clinic-main">
                @yield('content')
            </main>

            <footer class="clinic-footer">
                <div class="container-fluid">
                    <p class="mb-0">&copy; 2026 Mascotes Clinic - Alba Muñoz | Institut Provençana</p>
                </div>
            </footer>
        </div>
    </body>
</html>
