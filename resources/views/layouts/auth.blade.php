<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('extra-css')

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100" style="direction: rtl; text-align: right;">

<div class="auth-container">
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    @yield('content')
</div>
 @yield('extra-js')

<script src="{{ asset('js/app.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userMenuButton = document.getElementById('user-menu-button');
        var userMenu = document.getElementById('user-menu');

        if (userMenuButton) {
            userMenuButton.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });
        }
    });
</script>

</body>
</html>
