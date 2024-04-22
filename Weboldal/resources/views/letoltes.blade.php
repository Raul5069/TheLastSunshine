@extends('layout')
@section('content')
    <header class="masthead9 text-secondary">

        <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

            <div class="home-slider  owl-carousel">
                <div class="slider-item ">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                            data-scrollax-parent="true">
                            <div class="one-third js-fullheight order-md-last img"
                                style="{{ asset('assets/images/emberesfa.jpg') }});">
                                <div class="overlay"></div>
                            </div>
                            <div class="one-forth d-flex  align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">

                                    <h1 class="mt-3 pt-5"><span>Játékunk</span></h1>
                                    <h2 class="mb-4">Letöltése</h2>
                                    <p><a href="{{ asset('The Last Sunshine 1.0.zip') }}" download
                                            class="btn btn-outline-dark btn-secondary  px-5 py-3 fs-6 fw-bolder me-md-2">Letöltés</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slider-item">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row d-flex no-gutters slider-text align-items-end justify-content-end"
                            data-scrollax-parent="true">
                            <div class="one-third js-fullheight order-md-last img"
                                style="background-image:url(images/bg_2.png);">
                                <div class="overlay"></div>
                            </div>
                            <div class="one-forth d-flex align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">
                                    <span class="subheading">Lentebb még olvashattok pár érdekes dolgot &#128521; </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-md-6 col-lg-5 d-flex">
                            <div class="img-about img d-flex align-items-stretch">
                                <div class="overlay"></div>
                                <div class="img d-flex align-self-stretch align-items-center"
                                    style="background-image:url(images/bg_1.png);">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">

                                    <h2 class="mb-4 pt-5">A weboldalról és a játékról röviden</h2>
                                    <p>A weboldalunk arra szolgál, hogy tudjatok egymással beszélgetni megnézni mások
                                        profilját vagy akár a sajátotokat. Le tudjátok tölteni a játékunkat és tudtok kicsit
                                        olvasni <a href="/rolunk">rólunk</a> a játékról meg annyi, hogy egy menő lövöldözős
                                        zombis játék .</p>
                                    <ul class="about-info mt-4 px-md-0 px-2">
                                        <li class="d-flex pb-3"><span>Készítők nevei: |</span> <span> Csongor | Sütő |
                                                Raul|</span></li>
                                        <li class="d-flex pb-3"><span>Osztályunk: |</span> <span>14/SZ|</span></li>
                                        <li class="d-flex"><span>Iskolánk: |</span> <span>BMSzC Verebély László
                                                Technikum|</span></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="counter-wrap ftco-animate d-flex mt-md-3">
                                <div class="text">
                                    <p class="mb-4">

                                        <span>Köszönjük, hogy ellátogattatok a weboldalunkra és kipróbáltátok a
                                            játékunkat</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>






    </header>
@endsection
