<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <title>@yield('title', 'Events')</title>
</head>

<body>
    <header>
        <nav class="navbar  navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Event party</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/add">Add event</a>
                            </li>
                        @endauth

                        <li class="nav-item">
                            <a class="nav-link" href="/events">Events</a>
                        </li>
                        @auth
                            <li class="nav-item ms-1">
                                <a class="nav-link " href="#">{{ Auth::user()->email }}</a>
                            </li>
                            <li class="nav-item ms-1">
                                <a class="nav-link btn btn-danger" href="/logout">Log out</a>
                            </li>
                        @endauth
                        @unless(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary" href="/login">Login</a>
                            </li>
                            <li class="nav-item ms-1">
                                <a class="nav-link btn btn-primary" href="/register">Register</a>
                            </li>
                        @endunless
                    </ul>
                </div>

            </div>
        </nav>

    </header>

    <div class="my-2">
        <main>
            @yield('content')
        </main>
    </div>
    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
