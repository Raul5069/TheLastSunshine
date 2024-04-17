@extends('layout')
@section('content')
    <main>



        @guest
            <header class="masthead5 text-secondary">
            <h1 class="display-2 pb-5 text-center">Weboldalunk és Játékunk regisztrációhoz kötött</h1>
            <h1 class="display-2 pb-5 text-center">↓</h1>
            <section class="py-4 px-2">
                <div class="mx-auto w-75 ">

                    <form action="/" method="post">
                        @csrf
                        <label for="name" class="form-label">Felhasználónév:<span class="text-danger"></span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="email" class="form-label">E-mail:<span class="text-danger"></span></label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="password" class="form-label">Jelszó:<span class="text-danger"></span></label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="password_confirmation" class="form-label">Jelszó újra:<span
                                class="text-danger"></span></label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-dark mt-4">Regisztráció</button>
                    </form>
                </div>
            </section>
        </header>
        @else

            <body id="page-top">



                <header class="masthead">
                    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                        <div class="d-flex justify-content-center">
                            <div class="text-center">
                                <h1 class="mx-auto my-0 text-uppercase">Zombie Shooter</h1>
                                <h2 class="text-white-50 mx-auto mt-2 mb-5">Ez maga a zombis játék ami egy sima sulis projekt
                                    &#128522;.</h2>
                                <a class="btn btn-outline-dark btn-secondary  px-5 py-3 fs-6 fw-bolder me-md-2" href="/letoltes">Letöltés</a>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/images/mini1.webp') }}"
                            style= "width: 100%;" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Egy</h4>
                                    <p class="mb-0 text-white-50">Eszeveszetten jó élmény</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/images/mini3.webp') }}" alt="..." />
                    </div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Amely</h4>
                                    <p class="mb-0 text-white-50">Elrepít egy másik világba!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </section>
            </body>

            </html>










        @endguest





    </main>
@endsection
