<h1>Insertar nuevo</h1>
<form action="index.php?page=Mnt-candidato" method="post">
    <fieldset class="form-group">
        <label for="identidad">Identidad (sin guiones)</label>
        <input type="text" class="form-control" name="identidad" id="identidad" placeholder="Min=8 Max=13" minlength="8" maxlength="13">
    </fieldset>
    <fieldset class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre">
    </fieldset>
    <fieldset class="form-group">
        <label for="edad">Edad</label>
        <input type="number" class="form-control" name="edad" id="edad">
    </fieldset>
    <fieldset class="row">
            <button type="submit" name="btnGuardar">
                Guardar
            </button>
        
        <button id="btnCancelar">
            Cancelar
        </button>
    </fieldset>
</form>