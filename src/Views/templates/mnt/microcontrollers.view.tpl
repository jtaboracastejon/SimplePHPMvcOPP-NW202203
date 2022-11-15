<h1>Listado de Microcontroladores</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-microcontroller&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Hertz</th>
                <th>Puertos</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach microcontrollers}}
            <tr>
                <td>{{mc_id}}</td>
                <td><a href="index.php?page=mnt-microcontroller&mode=DSP&mc_id={{mc_id}}">{{mc_name}}</a></td>
                <td>{{mc_hertz}}</td>
                <td>{{mc_ports}}</td>
                <td>{{mc_brand}}</td>
                <td>{{mc_type}}</td>
                <td>{{mc_status}}</td>
            </tr>
            {{endfor microcontrollers}}
        </tbody>
    </table>
</section>