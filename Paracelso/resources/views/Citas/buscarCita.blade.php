{!! Form::open(['route'=>'cita\search','method'=>'GET']) !!}
	<div class="form-group">
		<div class="input-group">
			<!--{{-- <?php echo date("d-m-Y"); ?> --}}-->
			<input type="datetime" class="form-control" name="fecha" value="" placeholder="dd-mm-aaaa">
			<span class="input-group-btn"><button type="submit" class="btn btn-info">Buscar</button></span>
		</div>		
	</div>
{!! Form::close() !!}