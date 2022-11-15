<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-cinema&mode={{mode}}&cinema_id={{cinema_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="cinema_name">Nombre</label>
        <input type="text" class="form-control" name="cinema_name" id="cinema_name" {{if readOnly}}disabled{{endif readOnly}} value="{{cinema_name}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="cinema_brand">Marca</label>
        <input type="text" class="form-control" name="cinema_brand" id="cinema_brand" {{if readOnly}}disabled{{endif readOnly}} value="{{cinema_brand}}">
    </fieldset>
    
    <fieldset class="form-group col-md-4">
        <label for="cinema_seats">Asientos</label>
        <input type="number" class="form-control" name="cinema_seats" id="cinema_seats" {{if readOnly}}disabled{{endif readOnly}} value="{{cinema_seats}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="cinema_type">Tipo</label>
        <select name="cinema_type" id="cinema_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="cinema_status">Estado</label>
        <select name="cinema_status" id="cinema_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-cinemas'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>