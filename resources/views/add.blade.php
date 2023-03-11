@extends('layout.main')	
@section('content-void')
	<div class="d-flex">
		<form action="/add/db" method="POST">
			@csrf
			<div class="in-tab">
				<div class="d-flex"><label for="Name">Nama</label></div>
				<input type="text" name="Name" id="Name" required>
			</div>
			<div class="in-tab">
				<div class="d-flex"><label for="kelas">Kelas</label></div>
				<input type="text" name="kelas" id="kelas" required value="{{ old('kelas') }}">
			</div>
			<div class="in-tab">
				<div class="d-flex"><label for="Absen">Absen</label></div>
				<input type="number" name="Absen" id="Absen" required value="{{ old('Absen') }}">
			</div>
			<div class="d-flex">
				<button type="submit" id="btn-submit">Tambahkan</button>
			</div>
		</form>
	</div>
	@error('succses')
	<div class="modal" id="modal">
		<div class="popup">
			<div class="popup-ok">
			  <h1>Succsess</h1>
			  <div class="d-flex">
				<button onclick="pupop()" id="btn-popup">OK</button>
			  	</div>
			  </div>
		</div>
	</div>
	@enderror
	<script>
		let Modal = document.getElementById('modal');
		let Sub = document.getElementById('btn-submit');
		document.getElementById('blank').style.display = 'none';
		document.querySelector('form').addEventListener('submit',function(){
			document.getElementById('blank').style.display = 'flex';
		});
		function pupop(){
			Modal.style.display = 'none';
		}
	</script>
@endsection