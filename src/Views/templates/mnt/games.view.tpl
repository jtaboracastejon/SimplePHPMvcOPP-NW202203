<h1>Listado de Videojuegos</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-game&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Desarrolladora</th>
                <th>Plataforma</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach games}}
            <tr>
                <td>{{game_id}}</td>
                <td><a href="index.php?page=mnt-game&mode=DSP&game_id={{game_id}}">{{game_name}}</a></td>
                <td>{{game_type}}</td>
                <td>{{game_brand}}</td>
                <td>{{game_console}}</td>
                <td>{{game_status}}</td>
            </tr>
            {{endfor games}}
        </tbody>
    </table>
</section>