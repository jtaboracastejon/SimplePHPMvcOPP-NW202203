<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-eyeglass&mode={{mode}}&egl_id={{egl_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="egl_name">Nombre</label>
        <input type="text" class="form-control" name="egl_name" id="egl_name" {{if readOnly}}disabled{{endif readOnly}} value="{{egl_name}}">
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="egl_type">Tipo</label>
        <select name="egl_type" id="egl_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="egl_designer">Diseñador</label>
        <input type="text" class="form-control" name="egl_designer" id="egl_designer" {{if readOnly}}disabled{{endif readOnly}} value="{{egl_designer}}">
    </fieldset>

    
    <fieldset class="form-group col-md-4">
        <label for="egl_color">Color</label>
        <input type="text" class="form-control" name="egl_color" id="egl_color" {{if readOnly}}disabled{{endif readOnly}} value="{{egl_color}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="egl_status">Estado</label>
        <select name="egl_status" id="egl_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-eyeglasses'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>