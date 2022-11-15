<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-musictrack&mode={{mode}}&mst_id={{mst_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="mst_name">Nombre</label>
        <input type="text" class="form-control" name="mst_name" id="mst_name" {{if readOnly}}disabled{{endif readOnly}} value="{{mst_name}}">
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="mst_album">Album</label>
        <input type="text" class="form-control" name="mst_album" id="mst_album" {{if readOnly}}disabled{{endif readOnly}} value="{{mst_album}}">
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="mst_type">Tipo</label>
        <select name="mst_type" id="mst_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="mst_author">Autor</label>
        <input type="text" class="form-control" name="mst_author" id="mst_author" {{if readOnly}}disabled{{endif readOnly}} value="{{mst_author}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="mst_status">Estado</label>
        <select name="mst_status" id="mst_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-musictracks'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>