@extends('layout.main')

@section('content-void')

<div class="setting">
    <div class="form_change_name">
        <form action="/setting/username" method="POST">
            @csrf
            @error('name')
            <div class="error">
                <p style="color: red; margin:10px 0;">Namamu sudah dipake ('Jangan yang pasaran ,hehe!')</p>
            </div>
            @enderror
            @error('login')
            <div class="error">
                <p style="color: red; margin:10px 0;">Passwordmu gak bener</p>
            </div>
            @enderror
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <div class="d-flex">
                <label for="name">Username Baru</label>
            </div>
            <input type="text" name="name" id="name" required>
            <div class="d-flex">
                <label for="password">Massukan Password</label>
            </div>
            <input type="password" name="password" id="password" required>
            <div class="d-flex"><button type="submit">Terapkan Perubahan</button></div>            
        </form>
    </div>
</div>

@endsection
{{-- add another css --}}
@section('newmeta')
<link rel="stylesheet" href="/css/changeName.css">
@endsection