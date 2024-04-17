@extends('layout')
@section('content')
    <header class="masthead6 text-secondary">
        <main class="container ">
            <section class="py-4 px-2">
                <div class="mx-auto w-75">
                    <h2 class="display-4 pb-3">Profil módosítás</h2>
                    <form action="/profil/{{ Auth::user()->id }}" method="post">
                        @csrf

                        <label for="name" class="form-label ">Felhasználónév:<span class="text-danger"></span></label>
                        <input id="name" class="form-control bg-secondary" disabled name="name"
                            value="{{ $result->name }}">

                        <label for="age" class="form-label">Kor:<span class="text-danger"></span></label>
                        <input id="age" class="form-control bg-secondary" disabled name="age"
                            value="{{ $result->age }}">

                        <label for="telszam" class="form-label">Telefonszám:<span class="text-danger"></span></label>
                        <input id="telszam" type="number" name="telszam" class="form-control"
                            value="{{ $result->telszam }}">
                        @error('telszam')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <label for="kedvetel" class="form-label">Kedvenc ételed:</label>
                        <textarea id="kedvetel" name="kedvetel" cols="30" rows="1" class="form-control">{{ $result->kedvetel }}</textarea>
                        @error('kedvetel')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="my-2">
                            <label for="gender" class="form-label">Játékstílus:</label>
                            <input id="gender" type="radio" disabled name="gender" class="form-check-input"
                                value="1" {{ $result->gender == 'm' ? 'checked' : '' }}>
                            <label for="gender" class="form-check-label">Előretörő</label>
                            <input id="gender" type="radio" disabled name="gender" class="form-check-input"
                                value="2" {{ $result->gender == 'f' ? 'checked' : '' }}>
                            <label for="gender" class="form-check-label">Biztonságos</label>
                        </div>





                        <label id="bio" for="bio" class="form-label">Bemutatkozó szöveg:</label>
                        <textarea name="bio" cols="30" rows="10" class="form-control mb-2">{{ $result->bio }}</textarea>
                        @error('bio')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit"
                            class="btn btn-outline-dark btn-secondary  px-5 py-3 fs-6 fw-bolder me-md-2">Módosítás</button>
                    </form>
                </div>
            </section>
        </main>
    </header>
@endsection
