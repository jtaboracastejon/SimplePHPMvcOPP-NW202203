<h1>Listado de Musictracks</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-musictrack&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Album</th>
                <th>Tipo</th>
                <th>Autor</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach musictracks}}
            <tr>
                <td>{{mst_id}}</td>
                <td><a href="index.php?page=mnt-musictrack&mode=DSP&mst_id={{mst_id}}">{{mst_name}}</a></td>
                <td>{{mst_album}}</td>
                <td>{{mst_type}}</td>
                <td>{{mst_author}}</td>
                <td>{{mst_status}}</td>
            </tr>
            {{endfor musictracks}}
        </tbody>
    </table>
</section>