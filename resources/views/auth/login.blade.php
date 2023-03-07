@extends('layout.auth')
@section('form')
@if(session()->has('succses'))
    <div class="error" style="background-color: rgb(59, 230, 59)">
        <p>{{ session('succses') }}</p>
    </div>
@endif

@error('login')
    <div class="error">
        <p>login gagal, masukan data yang benar</p>
    </div>
@enderror
<form action="/login" method="POST">
    @csrf
    <label for="email">Email Address</label><br>
    <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br>

    <div class="d-flex" style="width: 100%;">
        <button type="submit">Masuk</button>
    </div>
    <div class="d-flex" style="width: 100%;">
        <a href="/sign">Belum punya akun?</a>
    </div>
</form>
@endsection