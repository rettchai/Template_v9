<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Metas -->
    {{-- @if (env('IS_DEMO'))
        <x-demo-metas></x-demo-metas>
    @endif --}}
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/favicon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Donate RMUTR
    </title>
    <!-- Fonts and icons     -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> --}}

    <!-- Nucleo Icons -->
    {{-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" /> --}}
    {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
    <!-- Font Awesome Icons -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" rel="stylesheet" /> --}}
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1" rel="stylesheet" />

    <!-- Alpine -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    {{-- <link href='https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap' rel="stylesheet" />
     --}}

    <style>
        button {
            font-family: 'Kanit';
        }
    </style>

    @livewireStyles



    <wireui:scripts />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="g-sidenav-show bg-gray-300">

    {{ $slot }}

    <!--   Core JS Files   -->
    {{-- <script src="assets/js/core/popper.min.js"></script> --}}
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="assets/js/soft-ui-dashboard.js"></script>
    @livewireScripts
</body>

</html>
