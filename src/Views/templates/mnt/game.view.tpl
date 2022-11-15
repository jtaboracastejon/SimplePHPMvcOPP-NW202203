<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-game&mode={{mode}}&movie_id={{movie_id}}" method="post" class="row">
    <fieldset class="form-group col-md-7">
        <label for="game_name">Nombre</label>
        <input type="text" class="form-control" name="game_name" id="game_name" {{if readOnly}}disabled{{endif readOnly}} value="{{game_name}}">
    </fieldset>

    <fieldset class="form-group col-md-5">
        <label for="game_type">Tipo</label>
        <select name="game_type" id="game_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="game_brand">Desarrolladora</label>
        <input type="text" class="form-control" name="game_brand" id="game_brand" {{if readOnly}}disabled{{endif readOnly}} value="{{game_brand}}">
    </fieldset>

    
    <fieldset class="form-group col-md-4">
        <label for="game_console">Plataforma</label>
        <input type="text" class="form-control" name="game_console" id="game_console" {{if readOnly}}disabled{{endif readOnly}} value="{{game_console}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="game_status">Estado</label>
        <select name="game_status" id="game_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-games'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>