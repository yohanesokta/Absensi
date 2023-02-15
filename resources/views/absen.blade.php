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
 <div class="modal" id="modalPop" style="display:none;">
 	<div class="ABpop">
 		<p id="ABpopNama">Nama</p>
 		<form action="/absen/ch/" type="POST">
 			@csrf
 		<div class="d-flex" style="height: auto; margin-top: 10px;">
 			<div class="d-flex" style="display:flex; width: 80%; margin:auto; justify-content: space-between;">
 			<div class="l-input" style="display:flex;">
 				<label for="JAbsen">Sakit</label>
 				<input style="margin-left: 5px;" type="radio" name="JAbsen" id="JAbsen" value="1">
 			</div>
 			<div class="l-input" style="display:flex;">
 				<label for="JAbsen">Ijin</label>
 				<input style="margin-left: 5px;" type="radio" name="JAbsen" id="JAbsen" value="2">
 			</div>
 			<div class="l-input" style="display:flex;">
 				<label for="JAbsen">Alpha</label>
 				<input style="margin-left: 5px;" type="radio" name="JAbsen" id="JAbsen" value="3">
 			</div>
 		</div></div>
 			<div class="d-flex">
 				<button type="submit" id="onsubmit" style="background-color: geren;color: white; padding: 5px 10px;">Enter</button>
 				<button id="onback" style="background-color: red; color: white; padding: 5px 10px;">Kembali</button>
 			</div>
 		</form>
 	</div>
 </div>


	<div class="modal" id="blank" style="display: none;">
		<div class="loading">
		</div>
	</div>
 <script src="js/jquery.min.js"></script>

 <script>
 	let globalID = 0
 	modalPup = document.getElementById('modalPop')
 	modalPup.style.display = 'none'
 	let blank = document.getElementById('blank')
 	function Pup(id,nama){
 		document.getElementById('ABpopNama').innerHTML = nama
 		globalID = id
 		modalPup.style.display = 'flex'
 	}
 	$('#onsubmit').click(function (e) {
 		e.preventDefault();
 		blank.style.display = 'flex'
 		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
 		let inVal = $("input[name='JAbsen']:checked").val()
 		$.ajax({
 				url: '/absen/ch/',
 				type: 'post',
 				data: {
 					dataId: globalID,
 					dataIn: inVal,
 				},
 				success: function (data) {
 					blank.style.display = 'none'
 					const id = 'bx'+globalID
 					modalPup.style.display = 'none'
 					document.getElementById(id).style.background = '#555753'
 					document.getElementById(id).style.color = 'white'
 					let s = parseInt(document.getElementById('s'+globalID).innerHTML)
 					let i = parseInt(document.getElementById('i'+globalID).innerHTML)
 					let a = parseInt(document.getElementById('a'+globalID).innerHTML)
 					if (inVal == '1'){
 						document.getElementById('s'+globalID).innerHTML = s+1
 					}else if(inVal == '2'){
 						document.getElementById('i'+globalID).innerHTML = i+1
 					}else{
 						document.getElementById('a'+globalID).innerHTML = a+1
 					}
 				}
 			});
 	});

 	$('#onback').click(function (e) {
 		e.preventDefault();
 		modalPup.style.display = 'none'
 	});

 </script>

@endsection