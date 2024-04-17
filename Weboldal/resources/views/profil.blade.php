@extends('layout')
@section('content')


<header class="masthead11 text-secondary">
<main class="container ">
    <section class="py-4 px-2">
        <div class="mx-auto w-75">
            <h2 class="display-4 pb-3">Profil kitöltése</h2>
            <form action="/profil" method="post">
                @csrf
                <label for="age"  class="form-label">Életkor:<span class="text-danger"></span></label>
                <input type="number" name="age" maxlength="2" class="form-control" value="{{old('age')}}">
                @error('age')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                @csrf
                <label for="telszam" class="form-label">Telefonszám:<span class="text-danger"></span></label>
                <input type="number" name="telszam" class="form-control" value="{{old('telszam')}}">
                @error('telszam')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="kedvetel" class="form-label">Kedvenc ételed:</label>
                <textarea name="kedvetel" cols="30" rows="1" class="form-control" value="{{old('kedvetel')}}"></textarea>
                @error('kedvetel')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="my-2">
                    <label for="gender" class="form-label">Játékstílus:</label>
                    <input type="radio" name="gender" class="form-check-input" value="1" checked>
                    <label for="gender" class="form-check-label">Előretörő</label>
                    <input type="radio" name="gender" class="form-check-input" value="2">
                    <label for="gender" class="form-check-label">Biztonságos</label>
                </div>
                <label for="bio" class="form-label">Bemutatkozó szöveg:</label>
                <textarea name="bio" cols="30" rows="10" class="form-control" value="{{old('bio')}}"></textarea>
                @error('bio')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-success mt-4">Kész</button>
            </form>
        </div>
    </section>
</main>

</header>
@endsection
