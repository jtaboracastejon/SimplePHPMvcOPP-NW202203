<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-book&mode={{mode}}&book_id={{car_id}}" method="post" class="row">
    <fieldset class="form-group col-md-4">
        <label for="book_name">Titulo</label>
        <input type="text" class="form-control" name="book_name" id="book_name" {{if readOnly}}disabled{{endif readOnly}} value="{{book_name}}">
    </fieldset>
    <fieldset class="form-group col-md-8">
        <label for="book_date">Fecha</label>
        <input type="date" class="form-control" name="book_date" id="book_date" {{if readOnly}}disabled{{endif readOnly}} value="{{book_date}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="book_author">Autor</label>
        <input type="text" class="form-control" name="book_author" id="book_author" {{if readOnly}}disabled{{endif readOnly}} value="{{book_author}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="book_type">Tipo</label>
        <select name="book_type" id="book_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="book_barcode">Código Barras</label>
        <input type="text" class="form-control" name="book_barcode" id="book_barcode" {{if readOnly}}disabled{{endif readOnly}} value="{{book_barcode}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="book_status">Estado</label>
        <select name="book_status" id="book_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            <option value="ACT" {{if act_selected}}selected{{endif act_selected}}>Activo</option>
            <option value="INA" {{if ina_selected}}selected{{endif ina_selected}}>Inactivo</option>
        </select>
    </fieldset>
    <fieldset class="row">
        {{if showSaveBtn}}
            <button type="submit" name="btnGuardar">
                Guardar
            </button>
        {{endif showSaveBtn}}
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-books'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>