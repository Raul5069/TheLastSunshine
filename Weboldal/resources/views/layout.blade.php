<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Zombi Shooter</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body class="bodytop">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand bela" href="/"> <img class="img-fluid" style="width: 100px"
                    src="{{ asset('assets/images/zombielogo.webp') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                @guest
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark alahuzas" href="/felhasznalok">Játékosok</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark alahuzas" href="/uzenetek">Üzenetek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark alahuzas" href="/sajatprofil">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark alahuzas" href="/letoltes">Letöltés</a>
                        </li>

                    </ul>

                @endguest
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark alahuzas" href="/rolunk">Rólunk</a>
                    </li>
                </ul>

                <div class="ms-auto  fs-4">
                    <div class="fw-bold d-flex align-items-center ">
                        @guest
                            <a class="btn btn-outline-dark btn-primary laci  px-4 py-2 fs-6 fw-bolder me-md-2"
                                href="/login">Belépés</a>
                        @else
                            <a class="btn btn-outline-dark btn-primary laci px-4 py-2 fs-6 fw-bolder me-md-2"
                                href="/logout">Kilépés</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <footer class="p-2 w-100 bd-highlight text-bg-secondary">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3 ">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary fw-bold">|Home|</a></li>
            <li class="nav-item"><a href="/rolunk" class="nav-link px-2 text-body-secondary fw-bold">|Rólunk|</a></li>
        </ul>
        <p class="text-center text-body-secondary fw-bold">© 2024 Zombie Shooter, Inc</p>
    </footer>
</body>

</html>
