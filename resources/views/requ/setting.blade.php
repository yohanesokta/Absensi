@extends('layout.main')

@section('content-void')
    <div class="AB-setting">
        {{-- canvas --}}
        <div class="AB-menu">
                <a href="/setting/username" class="ABM">
                    <p>Username</p>
                    <span>is our username</span>
                </a>
                <a href="/setting/tgl" class="ABM">
                    <p>Tanggal Lahir</p>
                    <span>3-10-2005</span>
                </a>
                <a href="/setting/pw-reset" class="ABM">
                    <p>Reset Password</p>
                </a>
                <a href="/setting/logout" class="ABM">
                    <p>Keluar</p>
                </a>
        </div>
        <div class="AB-menu-about
        ">
            <p>Copyright &copy 2023 Yohanes Oktanio, Terimakasih kepada teman teman pkl PT indo bismar karena kegiatan magang pkl itu sangan membantu dalam saya untuk mempelajari lebih lanjut tentang project dan saya belajar banyak hal dan mendapatkan waktu yang cukup bahkan lebih ketika berada di sekolah</p>
        </div>
    </div>


@endsection

