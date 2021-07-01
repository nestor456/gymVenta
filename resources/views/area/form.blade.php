<div class="form-group">
    <label for="Nombre">Nombre del Area</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ isset($area->Nombre)?$area->Nombre:'' }}">
</div>

<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

<a href="{{ url('area') }}" class="btn btn-primary">Regresar</a>