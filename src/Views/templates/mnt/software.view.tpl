<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-software&mode={{mode}}&sw_id={{sw_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="sw_name">Nombre</label>
        <input type="text" class="form-control" name="sw_name" id="sw_name" {{if readOnly}}disabled{{endif readOnly}} value="{{sw_name}}">
    </fieldset>
    
    <fieldset class="form-group col-md-8">
        <label for="sw_os">OS</label>
        <input type="text" class="form-control" name="sw_os" id="sw_os" {{if readOnly}}disabled{{endif readOnly}} value="{{sw_os}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="sw_type">Tipo</label>
        <select name="sw_type" id="sw_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="sw_brand">Marca</label>
        <input type="text" class="form-control" name="sw_brand" id="sw_brand" {{if readOnly}}disabled{{endif readOnly}} value="{{sw_brand}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="sw_version">Version</label>
        <input type="number" step="0.1" class="form-control" name="sw_version" id="sw_version" {{if readOnly}}disabled{{endif readOnly}} value="{{sw_version}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="sw_status">Estado</label>
        <select name="sw_status" id="sw_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-softwares'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>