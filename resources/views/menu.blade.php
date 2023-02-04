@extends('layout.main')
@section('content-void')
	<div class="cv-card">
		<a href="/add?Suc=Enter" class="card">
			<div class="isi">
				<img src="/icon/add.png" alt="add">
				<p>add</p>
			</div>
		</a>
		<a href="/delete" class="card">
			<div class="isi">
				<img src="/icon/delete-user.png" alt="delete">
				<p>Delete</p>
			</div>
		</a>
	</div>
	<div class="cv-card">
		<a href="/absen" class="card">
			<div class="isi">
				<img src="/icon/edit.png" alt="edit">
				<p>Absen</p>
			</div>
		</a>
		<div class="card"></div>
	</div>
	<div class="cv-card">
		<div class="card"></div>
		<div class="card"></div>
	</div>
@endsection

