<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        html {
            font-family: 'Poppins', sans-serif;
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
    </style>
    <title>@yield('admin-title')</title>

</head>

<body>
    @include('admin.navbar.admin-navbar')
    @yield('admin-content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".nav-toggler").each(function(_, navToggler) {
                var target = $(navToggler).data("target");
                $(navToggler).on("click", function() {
                    $(target).animate({
                        height: "toggle"
                    });
                });
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
