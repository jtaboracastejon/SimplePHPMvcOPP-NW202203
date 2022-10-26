<h1>Ingreso de una cita</h1>
<form action="index.php?page=Mnt-Quote" method="post">
    <fieldset class="form-group">
        <label for="quote">Cita</label>
        <input type="text" class="form-control" name="quote" id="quote" value="{{quote}}">
    </fieldset>
    <fieldset class="form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" name="author" id="author" value="{{author}}">
    </fieldset>
    <fieldset class="form-group">
        <label for="optStatus">Estado</label>
        <select name="status" class="form-control" id="status">
            <option value="ACT" {{if act_selected}}selected{{endif act_selected}}>Activo</option>
            <option value="INA" {{if ina_selected}}selected{{endif ina_selected}}>Inactivo</option>
        </select>
    </fieldset>
    <fieldset class="row">
        <button type="submit" name="btnGuardar">
            Guardar
        </button>
        <button id="btnCancelar">
            Cancelar
        </button>
    </fieldset>
    <script>
        document.getElementById("btnCancelar").addEventListener("click",function(event){
            event.preventDefault();
            window.location.href = "index.php?page=Mnt-Quotes";
        })
    </script>
</form>