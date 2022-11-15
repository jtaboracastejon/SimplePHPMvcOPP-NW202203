<h1>Listado de Cinemas</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-cinema&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Asientos</th>
                <th>Tipo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach cinemas}}
            <tr>
                <td>{{cinema_id}}</td>
                <td><a href="index.php?page=mnt-cinema&mode=DSP&cinema_id={{cinema_id}}">{{cinema_name}}</a></td>
                <td>{{cinema_brand}}</td>
                <td>{{cinema_seats}}</td>
                <td>{{cinema_type}}</td>
                <td>{{cinema_status}}</td>
            </tr>
            {{endfor cinemas}}
        </tbody>
    </table>
</section>