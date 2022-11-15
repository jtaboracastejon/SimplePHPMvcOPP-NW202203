<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-coworkingplace&mode={{mode}}&cwp_id={{cwp_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="cwp_name">Nombre</label>
        <input type="text" class="form-control" name="cwp_name" id="cwp_name" {{if readOnly}}disabled{{endif readOnly}} value="{{cwp_name}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="cwp_email">EMail</label>
        <input type="email" class="form-control" name="cwp_email" id="cwp_email" {{if readOnly}}disabled{{endif readOnly}} value="{{cwp_email}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="cwp_phone">Teléfono</label>
        <input type="text" class="form-control" name="cwp_phone" id="cwp_phone" {{if readOnly}}disabled{{endif readOnly}} value="{{cwp_phone}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="cwp_type">Tipo</label>
        <select name="cwp_type" id="cwp_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="cwp_status">Estado</label>
        <select name="cwp_status" id="cwp_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-coworkingplaces'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>