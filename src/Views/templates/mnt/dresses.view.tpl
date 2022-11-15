<h1>Listado de Vestidos</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-dress&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Estilo</th>
                <th>Piezas</th>
                <th>Color</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach dresses}}
            <tr>
                <td>{{dress_id}}</td>
                <td><a href="index.php?page=mnt-dress&mode=DSP&dress_id={{dress_id}}">{{dress_name}}</a></td>
                <td>{{dress_style}}</td>
                <td>{{dress_pieces}}</td>
                <td>{{dress_color}}</td>
                <td>{{dress_status}}</td>
            </tr>
            {{endfor dresses}}
        </tbody>
    </table>
</section>