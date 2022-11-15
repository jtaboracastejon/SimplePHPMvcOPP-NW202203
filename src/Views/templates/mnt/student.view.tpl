<h1>{{mode_dsc}}</h1>
<form action="index.php?page=mnt-student&mode={{mode}}&student_id={{student_id}}" method="post" class="row">
    <fieldset class="form-group col-md-8">
        <label for="student_name">Nombre</label>
        <input type="text" class="form-control" name="student_name" id="student_name" {{if readOnly}}disabled{{endif readOnly}} value="{{student_name}}">
    </fieldset>
    
    <fieldset class="form-group col-md-8">
        <label for="student_birthdate">Cumpleaños</label>
        <input type="date" class="form-control" name="student_birthdate" id="student_birthdate" {{if readOnly}}disabled{{endif readOnly}} value="{{student_birthdate}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="student_gender">Genero</label>
        <select name="student_gender" id="student_gender" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
            {{foreach arrGenders}}
            <option value="{{value}}"  {{selected}}>{{text}}</option>
            {{endfor arrGenders}}>
        </select>
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="student_email">EMail</label>
        <input type="email" class="form-control" name="student_email" id="student_email" {{if readOnly}}disabled{{endif readOnly}} value="{{student_email}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="student_phone">Teléfono</label>
        <input type="text" class="form-control" name="student_phone" id="student_phone" {{if readOnly}}disabled{{endif readOnly}} value="{{student_phone}}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="student_status">Estado</label>
        <select name="student_status" id="student_status" {{if readOnly}} disabled {{endif readOnly}}  class="form-control">
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
        
            <button type="button" onclick="window.location.href='index.php?page=mnt-students'" id="btnCancelar" class="btn btn-secondary">
                Cancelar
            </button>
    </fieldset>
</form>