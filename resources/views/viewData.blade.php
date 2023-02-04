@extends('layout.main')
@section('content-void')
<?php $no = 0; ?>
<div class="VWview">
  @foreach($data as $Data)
  <?php $no++; ?>
  	<div class="VWdata">
  		<div class="VWno">
  			<p>{{ $no }}</p>
  		</div>
  		<div class="VWnama">
  			<p>{{ $Data->name }}</p>
  		</div>
  		<div class="VWkelas">
  			<p>{{ $Data->kelas }}</p>
  		</div>
  		<form action="/view/delete" method="POST" class="VWdelete">
  			@csrf
  			<input type="hidden" name="id" id="id" value="{{ $Data->id }}">
  			<button type="submit" onclick="document.getElementById('blank').style.display=''"><i class="fa-solid fa-trash"></i>
  			</button>
  		</form>
  	</div>
  @endforeach
 </div>

  	<div class="modal" id="blank">
		<div class="loading">
		</div>
	</div>
	<script>
		document.getElementById('blank').style.display="none"
	</script>
@endsection