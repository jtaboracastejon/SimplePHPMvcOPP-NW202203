<h1>Listado de Deportes</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-sport&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Deporte</th>
                <th>Tipo</th>
                <th>Ranking</th>
                <th>Commet</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach sports}}
            <tr>
                <td>{{sport_id}}</td>
                <td><a href="index.php?page=mnt-sport&mode=DSP&sport_id={{sport_id}}">{{sport_name}}</a></td>
                <td>{{sport_type}}</td>
                <td>{{sport_ranking}}</td>
                <td>{{sport_commet}}</td>
                <td>{{sport_status}}</td>
            </tr>
            {{endfor sports}}
        </tbody>
    </table>
</section>