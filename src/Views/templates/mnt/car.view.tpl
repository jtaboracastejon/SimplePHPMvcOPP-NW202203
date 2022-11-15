<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-car&mode={{mode}}&car_id={{car_id}}" method="post" class="row">
    <fieldset class="form-group col-md-4">
        <label for="car_model">Modelo</label>
        <select name="car_model" id="car_model" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrModel}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrModel}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-8">
        <label for="car_owner">Dueño</label>
        <input type="text" class="form-control" name="car_owner" id="car_owner" {{if readOnly}}disabled{{endif readOnly}} value="{{car_owner}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="car_plaque">Placa</label>
        <input type="text" class="form-control" name="car_plaque" id="car_plaque" {{if readOnly}}disabled{{endif readOnly}} value="{{car_plaque}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="car_year">Año</label>
        <input type="number" minlength="4" maxlength="4" class="form-control" name="car_year" id="car_year" {{if readOnly}}disabled{{endif readOnly}} value="{{car_year}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="car_color">Color</label>
        <input type="text" class="form-control" name="car_color" id="car_color" {{if readOnly}}disabled{{endif readOnly}} value="{{car_color}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="car_motor">Motor</label>
        <input type="text" class="form-control" name="car_motor" id="car_motor" {{if readOnly}}disabled{{endif readOnly}} value="{{car_motor}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="car_status">Estado</label>
        <select name="car_status" id="car_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-cars'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>