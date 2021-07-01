<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ isset($cliente->Nombre)?$cliente->Nombre:'' }}">
</div>
<div class="form-group">
    <label for="ApellidoPaterno">ApellidoPaterno</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" value="{{ isset($cliente->ApellidoPaterno)?$cliente->ApellidoPaterno:'' }}">
</div>
<div class="form-group">
    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" value="{{ isset($cliente->ApellidoMaterno)?$cliente->ApellidoMaterno:'' }}">
</div>
<div class="form-group">
    <label for="dni">dni</label>
    <input type="text" name="dni" id="dni" class="form-control" value="{{ isset($cliente->dni)?$cliente->dni:'' }}">
</div>
<div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{ isset($cliente->Telefono)?$cliente->Telefono:'' }}">
</div>
<div class="form-group">
    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo" class="form-control" value="{{ isset($cliente->Correo)?$cliente->Correo:'' }}">
</div>
<div class="form-group">
    <label for="Plan_contratado">Plan_contratado</label>
    <input type="text" name="Plan_contratado" id="Plan_contratado" class="form-control" value="{{ isset($cliente->Plan_contratado)?$cliente->Plan_contratado:'' }}">

</div>
<div class="form-group">
    <label for="Promocion">Promocion</label>
    <select name="Promocion" id="Promocion" class="form-control">
        @foreach($menbresias as $menbresia )
            <option value="{{ $menbresia['NombreMembresia'] }}">{{ $menbresia['NombreMembresia'] }}</option>
        @endforeach        
    </select>
</div>
<div class="form-group">
    <label for="Entrenador">Entrenador</label>
    <select name="Entrenador" id="Entrenador" class="form-control">
        @foreach($empleados as $empleado )
            <option value="{{ $empleado['Nombre'] }}">{{ $empleado['Nombre'] }}</option>
        @endforeach        
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Objetivo_fisico</label>
        <textarea class="form-control" name="Objetivo_fisico" id="Objetivo_fisico" class="form-control">{{ isset($cliente->Objetivo_fisico)?$cliente->Objetivo_fisico:'' }}</textarea>

</div>
<div class="form-group">
    <label for="Nombre">Fecha_Inicio</label>
    <input type="date" name="Fecha_Inicio" id="Fecha_Inicio" class="form-control" value="{{ isset($cliente->Fecha_Inicio)?$cliente->Fecha_Inicio:'' }}">
</div>
<div class="form-group">
    <label for="Nombre">Fecha_Final</label>
    <input type="date" name="Fecha_Final" id="Fecha_Final" class="form-control" value="{{ isset($cliente->Fecha_Final)?$cliente->Fecha_Final:'' }}">
</div>
<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

<a href="{{ url('cliente') }}" class="btn btn-primary">Regresar</a>