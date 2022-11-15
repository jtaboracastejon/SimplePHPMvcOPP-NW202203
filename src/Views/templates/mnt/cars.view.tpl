<h1>Listado de Carros</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-car&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Modelo</th>
                <th>Dueño</th>
                <th>Placa</th>
                <th>Año</th>
                <th>Color</th>
                <th>Motor</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach cars}}
            <tr>
                <td>{{cars_id}}</td>
                <td><a href="index.php?page=mnt-car&mode=DSP&cars_id={{cars_id}}">{{car_model}}</a></td>
                <td>{{car_owner}}</td>
                <td>{{car_plaque}}</td>
                <td>{{car_year}}</td>
                <td>{{car_color}}</td>
                <td>{{car_motor}}</td>
                <td>{{car_status}}</td>
            </tr>
            {{endfor cars}}
        </tbody>
    </table>
</section>