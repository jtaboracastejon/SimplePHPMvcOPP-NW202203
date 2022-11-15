<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-dress&mode={{mode}}&dress_id={{dress_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="dress_name">Nombre</label>
        <input type="text" class="form-control" name="dress_name" id="dress_name" {{if readOnly}}disabled{{endif readOnly}} value="{{dress_name}}">
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="dress_style">Estilos</label>
        <select name="dress_style" id="dress_style" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrStyles}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrStyles}}>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="dress_pieces">Piezas</label>
        <input type="number" class="form-control" name="dress_pieces" id="dress_pieces" {{if readOnly}}disabled{{endif readOnly}} value="{{dress_pieces}}">
    </fieldset>

    
    <fieldset class="form-group col-md-4">
        <label for="dress_color">Color</label>
        <input type="text" class="form-control" name="dress_color" id="dress_color" {{if readOnly}}disabled{{endif readOnly}} value="{{dress_color}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="dress_status">Estado</label>
        <select name="dress_status" id="dress_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-dresses'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>