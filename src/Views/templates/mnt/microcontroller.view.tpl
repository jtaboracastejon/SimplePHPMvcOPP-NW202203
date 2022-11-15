<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-microcontroller&mode={{mode}}&mc_id={{mc_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="mc_name">Nombre</label>
        <input type="text" class="form-control" name="mc_name" id="mc_name" {{if readOnly}}disabled{{endif readOnly}} value="{{mc_name}}">
    </fieldset>
    
    <fieldset class="form-group col-md-8">
        <label for="mc_hertz">Hertz</label>
        <input type="number" step="0.1" class="form-control" name="mc_hertz" id="mc_hertz" {{if readOnly}}disabled{{endif readOnly}} value="{{mc_hertz}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="mc_ports">Puertos</label>
        <input type="number" class="form-control" name="mc_ports" id="mc_ports" {{if readOnly}}disabled{{endif readOnly}} value="{{mc_ports}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="mc_brand">Marca</label>
        <input type="text" class="form-control" name="mc_brand" id="mc_brand" {{if readOnly}}disabled{{endif readOnly}} value="{{mc_brand}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="mc_type">Tipo</label>
        <select name="mc_type" id="mc_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="mc_status">Estado</label>
        <select name="mc_status" id="mc_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-microcontrollers'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>