@extends('layout.auth')
@section('form')
<form action="/login" method="POST">
    @csrf
    <label for="username">Username</label><br>
    <input type="text" name="username" id="username"><br>

    <label for="Password">Password</label><br>
    <input type="password" name="Password" id="Password"><br>

    <div class="d-flex" style="width: 100%;">
        <button type="submit">Masuk</button>
    </div>
    <div class="d-flex" style="width: 100%;">
        <a href="/sign">Belum punya akun?</a>
    </div>
</form>
@endsection