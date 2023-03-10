@extends('layout.main')

@section('content-void')

<div class="setting">
    <div class="form_change_name">
        <form action="/setting/password" method="POST">
            @csrf
            @error('password2')
            <div class="error">
                <p style="color: red; margin:10px 0;">pw2salah</p>
            </div>
            @enderror
            @error('password3')
            <div class="error">
                <p style="color: red; margin:10px 0;">pw3salah</p>
            </div>
            @enderror
            @error('login')
            <div class="error">
                <p style="color: red; margin:10px 0;">pwlamasalah</p>
            </div>
            @enderror
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <div class="d-flex">
                <label for="password">Password Lama</label>
            </div>
            <input type="password" name="password" id="password" required>

            <div class="d-flex">
                <label for="password2">Password Baru</label>
            </div>
            <input type="password" name="password2" id="password2" required>

            <div class="d-flex">
                <label for="password3">Konfirmasi Password</label>
            </div>
            <input type="password" name="password3" id="password3" required>
            <div class="d-flex"><button type="submit">Terapkan Perubahan</button></div>            
        </form>
    </div>
</div>

@endsection
{{-- add another css --}}
@section('newmeta')
<link rel="stylesheet" href="/css/changeName.css">
@endsection