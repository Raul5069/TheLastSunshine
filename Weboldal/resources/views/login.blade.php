@extends('layout')
@section('content')



<header class="masthead8 text-secondary">
<main class="container ">
    <section class="py-4 px-2">
        <div class="mx-auto w-75">
            <h2 class="display-4 pb-3">Belépés</h2>
            <form action="/login" method="post">
                @csrf
                <label for="email" class="form-label">E-mail:<span class="text-danger"></span></label>
                <input type="text" name="email" class="form-control">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="password" class="form-label">Jelszó:<span class="text-danger"></span></label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-outline-dark btn-secondary  px-5 py-3 fs-6 fw-bolder me-md-2 mt-2">Belépés</button>
            </form>
        </div>
    </section>
</main>
</header>
@endsection
