<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-urbanfood&mode={{mode}}&urbfood_id={{urbfood_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="urbfood_name">Nombre</label>
        <input type="text" class="form-control" name="urbfood_name" id="urbfood_name" {{if readOnly}}disabled{{endif readOnly}} value="{{urbfood_name}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="urbfood_type">Tipo</label>
        <select name="urbfood_type" id="urbfood_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="urbfood_brand">Marca</label>
        <input type="text" class="form-control" name="urbfood_brand" id="urbfood_brand" {{if readOnly}}disabled{{endif readOnly}} value="{{urbfood_brand}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="urbfood_url">URL</label>
        <input type="url" class="form-control" name="urbfood_url" id="urbfood_url" {{if readOnly}}disabled{{endif readOnly}} value="{{urbfood_url}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="urbfood_status">Estado</label>
        <select name="urbfood_status" id="urbfood_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-urbanfoods'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>