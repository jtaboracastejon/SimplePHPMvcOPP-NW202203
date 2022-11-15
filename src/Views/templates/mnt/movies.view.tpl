<h1>Listado de Peliculas</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-movie&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Titulo</th>
                <th>Tipo</th>
                <th>Actor Principal</th>
                <th>Productor</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach movies}}
            <tr>
                <td>{{movie_id}}</td>
                <td><a href="index.php?page=mnt-movie&mode=DSP&movie_id={{movie_id}}">{{movie_name}}</a></td>
                <td>{{movie_type}}</td>
                <td>{{movie_mainlead}}</td>
                <td>{{movie_producer}}</td>
                <td>{{movie_status}}</td>
            </tr>
            {{endfor movies}}
        </tbody>
    </table>
</section>