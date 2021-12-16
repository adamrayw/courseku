<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        html {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        @media (min-width: 1024px) {
            .top-navbar {
                display: inline-flex !important;
            }
        }

        /*
        .hero {
            width: 100%;
            height: auto;
        } */

        .dropdown:focus-within .dropdown-menu {
            opacity: 1;
            transform: translate(0) scale(1);
            visibility: visible;
        }

        .carousel-cell {
            width: 40%;
            height: 160px;
            margin-right: 10px;
        }

    </style>
    <title>COURSEKU - @yield('title')</title>
</head>

<body class="bg-white">
    @include('sweetalert::alert')

    <header>
        @include('layouts.navbar')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
    <script src="/js/particles.js-master/particles.js">
    </script>
    <script src="/js/particles.js-master/demo/js/app.js">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script>
        function Toggle() {
            var pass = document.getElementById('pass');
            var icon = document.getElementById('icon');
            if (pass.type === 'password') {
                pass.type = 'text';
                icon.className = 'fas fa-eye-slash px-4';
            } else {
                pass.type = 'password';
                icon.className = 'fas fa-eye px-4';
            }
        }
    </script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>

    <x-livewire-alert::scripts />
</body>

</html>
