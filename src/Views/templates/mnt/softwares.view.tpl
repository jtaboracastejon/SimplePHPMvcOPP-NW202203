<h1>Listado de Softwares</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-software&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>OS</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Version</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach softwares}}
            <tr>
                <td>{{sw_id}}</td>
                <td><a href="index.php?page=mnt-software&mode=DSP&sw_id={{sw_id}}">{{sw_name}}</a></td>
                <td>{{sw_os}}</td>
                <td>{{sw_type}}</td>
                <td>{{sw_brand}}</td>
                <td>{{sw_version}}</td>
                <td>{{sw_status}}</td>
            </tr>
            {{endfor softwares}}
        </tbody>
    </table>
</section>