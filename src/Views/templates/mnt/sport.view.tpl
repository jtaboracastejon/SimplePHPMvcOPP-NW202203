<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-sport&mode={{mode}}&sport_id={{sport_id}}" method="post" class="row">
    <fieldset class="form-group col-md-7">
        <label for="sport_name">Nombre</label>
        <input type="text" class="form-control" name="sport_name" id="sport_name" {{if readOnly}}disabled{{endif readOnly}} value="{{sport_name}}">
    </fieldset>

    <fieldset class="form-group col-md-5">
        <label for="sport_type">Tipo</label>
        <select name="sport_type" id="sport_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="sport_ranking">Ranking</label>
        <input type="number" class="form-control" name="sport_ranking" id="sport_ranking" {{if readOnly}}disabled{{endif readOnly}} value="{{sport_ranking}}">
    </fieldset>

    
    <fieldset class="form-group col-md-4">
        <label for="sport_commet">Commet</label>
        <textarea type="text" class="form-control" name="sport_commet" id="sport_commet" {{if readOnly}}readonly{{endif readOnly}}  rows="3" cols="50" >{{sport_commet}}</textarea>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="sport_status">Estado</label>
        <select name="sport_status" id="sport_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-sports'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>