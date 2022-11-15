<h1>Listado de Hospitales</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-hospital&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>URL</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach hospitals}}
            <tr>
                <td>{{hsp_id}}</td>
                <td><a href="index.php?page=mnt-hospital&mode=DSP&hsp_id={{hsp_id}}">{{hsp_name}}</a></td>
                <td>{{hsp_type}}</td>
                <td>{{hsp_brand}}</td>
                <td><a href="{{hsp_url}}">Ir a la URL</a></td>
                <td>{{hsp_status}}</td>
            </tr>
            {{endfor hospitals}}
        </tbody>
    </table>
</section>