{{ csrf_field() }}
<div class="form-group" id='detalle_segruos' name='detalle_seguros'>
	<label class="control-label">Tipo Seguro</label>
		<div class="selectContainer bordes_izq_der" id="seguros" name="seguros">
			<select class="form-control" id="codigo_seguro" name="codigo_seguro">
			@foreach ($seguros as $seguros)
            	<option value="{{ $seguros->codigo_seguro}}">{{ $seguros->nombre}}</option>
            @endforeach  
			</select>
	    </div>
</div>