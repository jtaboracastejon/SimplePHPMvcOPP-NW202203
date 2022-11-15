<h1>Listado de Lugares de Trabajo</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-coworkingplace&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>EMail</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach coworkingplaces}}
            <tr>
                <td>{{cwp_id}}</td>
                <td><a href="index.php?page=mnt-coworkingplace&mode=DSP&cwp_id={{cwp_id}}">{{cwp_name}}</a></td>
                <td>{{cwp_email}}</td>
                <td>{{cwp_phone}}</td>
                <td>{{cwp_type}}</td>
                <td>{{cwp_status}}</td>
            </tr>
            {{endfor coworkingplaces}}
        </tbody>
    </table>
</section>