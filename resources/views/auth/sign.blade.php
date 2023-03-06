@extends('layout.auth')

@section('form')

@error('email')
<div class="error">
    <p>Maaf Email Sudah terdaftar</p>
</div>
@enderror
@error('name')
<div class="error">
    <p>Maaf Username Sudah Dipakai</p>
</div>
@enderror
@error('Repassword')
<div class="error">
    <p>Password mu tidak sesuai</p>
</div>
@enderror
@error('password')
<div class="error">
    <p>Keknya Ada yang salah dah</p>
</div>
@enderror

<form action="sign" method="POST">
    @csrf
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" required value="{{ old('email') }}"><br>

    <label for="name">Username</label><br>
    <input type="text" name="name" id="name" required><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br>

    <label for="Repassword">Konfirmasi Password</label><br>
    <input type="password" name="Repassword" id="Repassword" required><br>
    <div class="d-flex" style="width: 100%;">
        <button type="submit">Daftar</button>
    </div>
    <div class="d-flex" style="width: 100%;">
        <a href="/login">Kamu sudah punya akun?</a>
    </div>
</form>
@endsection