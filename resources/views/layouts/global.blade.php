<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IR Laptop Store</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/images/Black Modern Laptop Logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    @vite('resources/css/app.css')
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            speed: 400,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            grabCursor:true,
            breakpoints: {
                // when window width is >= 320px
                640: {
                    slidesPerView: 1,
                },
                // when window width is >= 480px
                768: {
                    slidesPerView: 2,
                },
                // when window width is >= 640px
                1024: {
                    slidesPerView: 3,
                }
            }
            // If we need pagination

        });
    </script>

</body>

</html>
