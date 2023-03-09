@extends('layout.main')
@section('newmeta')
 <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content-void')
<div class="ABhead">
	<div class="ABnama">
		<p>Nama</p>
	</div>
	<div class="ABcol">
		<p>Sakit</p>
	</div>
	<div class="ABcol">
		<p>Ijin</p>
	</div>
	<div class="ABcol">
		<p>Alpha</p>
	</div>
</div>
<div class="ABbox">
  @foreach($data as $Data)
	<div class="ABcontainer" onclick="Pup({{ $Data->id }},'{{ $Data->name }}')" id="bx{{ $Data->id }}">
		<div class="ABnama">
			<p>{{ $Data->name }}</p>
		</div>
		<div class="ABcol">
			<p id="s{{ $Data->id }}">{{ $Data->sakit }}</p>
		</div>
		<div class="ABcol">
			<p id="i{{ $Data->id }}">{{ $Data->ijin }}</p>
		</div>
		<div class="ABcol">
			<p id="a{{ $Data->id }}">{{ $Data->alpha }}</p>
		</div>
	</div> 
  @endforeach
 </div>
 <div class="modal" id="modalPop" style="display:none;" onclick="hidden()">
 	<div class="ABpop">
 		<p id="ABpopNama">Nama</p>
 		<form id="_absenform" action="/absen/" method="POST">
 			@csrf
			<input type="hidden" name="_data" id="data">
			<input type="hidden" name="_dataid" id="idata">
 		<div class="d-flex" style="height: auto; margin-top: 10px;">
 			<div class="d-flex" style="display:flex; width: 80%; margin:auto; justify-content: space-between;">
 			<div class="l-input" style="display:flex;">
 				<p class="absen-onclick" id="c-a" onclick="abs(1)">Sakit</p>
 			</div>
 			<div class="l-input" style="display:flex;">
 				<p class="absen-onclick" id="c-b" onclick="abs(2)">Ijin</p>
 			</div>
 			<div class="l-input" style="display:flex;">
 				<p class="absen-onclick" id="c-c" onclick="abs(3)">Alpha</p>
 			</div>
 		</div></div>
 			<div class="d-flex">
 				<button type="submit" id="onsubmit" onclick="Gmit()" style="background-color: geren;color: white; padding:10px 15px; font-size: 18px; border-radius: 20px;">Enter</button>
 			</div>
 		</form>
 	</div>
 </div>

	<div class="modal" id="blank" style="display: none;">
		<div class="loading">
		</div>
	</div>

 <script>
	function Gmit(){
		document.getElementById('_absenform').style.display = 'none'
		document.getElementById('ABpopNama').innerHTML = 'Loading'
	}
	function abs(e){
		document.getElementById('c-a').classList.remove('Add_select')
		document.getElementById('c-b').classList.remove('Add_select')
		document.getElementById('c-c').classList.remove('Add_select')
		Val = e;
		document.getElementById('data').value = e;
		if(e == 1){
			document.getElementById('c-a').classList.add('Add_select')
		}else if(e == 2){
			document.getElementById('c-b').classList.add('Add_select')
		}
		else {
			document.getElementById('c-c').classList.add('Add_select')
		}
	}
	function hidden() {
		modalPup.style.display = 'none';
	}
 	function Pup(id,nama){
 		document.getElementById('ABpopNama').innerHTML = nama
 		modalPup.style.display = 'flex'
		document.getElementById('idata').value = id;
 	}
	// Default Running
	let Val = 0
	let globalID = 0
	modalPup = document.getElementById('modalPop')
 	modalPup.style.display = 'none'
 	let blank = document.getElementById('blank')
 </script>

@endsection