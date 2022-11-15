<h1>Listado de UrbanFoods</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-urbanfood&mode=INS" class="btn btn-success">Nuevo</a></button>
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
            {{foreach urbanfoods}}
            <tr>
                <td>{{urbfood_id}}</td>
                <td><a href="index.php?page=mnt-urbanfood&mode=DSP&urbfood_id={{urbfood_id}}">{{urbfood_name}}</a></td>
                <td>{{urbfood_type}}</td>
                <td>{{urbfood_brand}}</td>
                <td><a href="{{urbfood_url}}">Ir a la URL</a></td>
                <td>{{urbfood_status}}</td>
            </tr>
            {{endfor urbanfoods}}
        </tbody>
    </table>
</section>