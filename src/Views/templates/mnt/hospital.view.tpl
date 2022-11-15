<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-hospital&mode={{mode}}&hsp_id={{hsp_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="hsp_name">Nombre</label>
        <input type="text" class="form-control" name="hsp_name" id="hsp_name" {{if readOnly}}disabled{{endif readOnly}} value="{{hsp_name}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="hsp_type">Tipo</label>
        <select name="hsp_type" id="hsp_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="hsp_brand">Marca</label>
        <input type="text" class="form-control" name="hsp_brand" id="hsp_brand" {{if readOnly}}disabled{{endif readOnly}} value="{{hsp_brand}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="hsp_url">URL</label>
        <input type="url" class="form-control" name="hsp_url" id="hsp_url" {{if readOnly}}disabled{{endif readOnly}} value="{{hsp_url}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="hsp_status">Estado</label>
        <select name="hsp_status" id="hsp_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-hospitals'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>