@extends('layout.main')	
@section('content-void')
	<div class="d-flex">
		<form action="/add/db" method="POST">
			@csrf
			<div class="in-tab">
				<label for="Name">Nama</label>
				<input type="text" name="Name" id="Name" required>
			</div>
			<div class="in-tab">
				<label for="kelas">Kelas</label>
				<input type="text" name="kelas" id="kelas" required>
			</div>
			<div class="in-tab">
				<label for="Absen">Absen</label>
				<input type="number" name="Absen" id="Absen">
			</div>
			<div class="d-flex">
				<button type="submit" id="btn-submit">Tambahkan</button>
			</div>
		</form>
	</div>
	<div class="modal" id="blank">
		<div class="loading">
		</div>
	</div>
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
	<script>
		let Modal = document.getElementById('modal');
		let Sub = document.getElementById('btn-submit');
		document.getElementById('blank').style.display = 'none';
		document.querySelector('form').addEventListener('submit',function(){
			document.getElementById('blank').style.display = 'flex';
		});
		@if($Suc == 'Enter')
		Modal.style.display = 'none';
		@endif
		function pupop(){
			Modal.style.display = 'none';
		}
	</script>
@endsection