<div class="form-group">
    <label for="Nombre">Nombre del Producto</label>
    <input type="text" name="NombreProducto" id="NombreProducto" class="form-control" value="{{ isset($producto->NombreProducto)?$producto->NombreProducto:'' }}">
</div>
<div class="form-group">
    <label for="Nombre">Detalle</label>
    <textarea class="form-control" name="Detalle" id="Detalle" class="form-control">{{ isset($producto->Detalle)?$producto->Detalle:'' }}</textarea>
</div>
<div class="form-group">
    <label for="Nombre">Stock</label>
    <input type="text" name="Stock" id="Stock" class="form-control" value="{{ isset($producto->Stock)?$producto->Stock:'' }}">
</div>
<div class="form-group">
    <label for="Nombre">Precio</label>
    <input type="text" name="Precio" id="Precio" class="form-control" value="{{ isset($producto->Precio)?$producto->Precio:'' }}">
</div>

<input type="submit" value="{{ $modo }} Datos" class="btn btn-success">

<a href="{{ url('producto') }}" class="btn btn-primary">Regresar</a>