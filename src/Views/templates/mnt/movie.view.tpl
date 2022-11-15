<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-movie&mode={{mode}}&movie_id={{movie_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="movie_name">Titulo</label>
        <input type="text" class="form-control" name="movie_name" id="movie_name" {{if readOnly}}disabled{{endif readOnly}} value="{{movie_name}}">
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="movie_type">Tipo</label>
        <select name="movie_type" id="movie_type" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrTypes}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrTypes}}>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="movie_mainlead">Actor Principal</label>
        <input type="text" class="form-control" name="movie_mainlead" id="movie_mainlead" {{if readOnly}}disabled{{endif readOnly}} value="{{movie_mainlead}}">
    </fieldset>

    
    <fieldset class="form-group col-md-4">
        <label for="movie_producer">Productor</label>
        <input type="text" class="form-control" name="movie_producer" id="movie_producer" {{if readOnly}}disabled{{endif readOnly}} value="{{movie_producer}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="movie_status">Estado</label>
        <select name="movie_status" id="movie_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-movies'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>