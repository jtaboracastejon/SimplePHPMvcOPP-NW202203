<h1>Listado de Lentes</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-eyeglass&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Diseñador</th>
                <th>Color</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach eyeglasses}}
            <tr>
                <td>{{egl_id}}</td>
                <td><a href="index.php?page=mnt-eyeglass&mode=DSP&egl_id={{egl_id}}">{{egl_name}}</a></td>
                <td>{{egl_type}}</td>
                <td>{{egl_designer}}</td>
                <td>{{egl_color}}</td>
                <td>{{egl_status}}</td>
            </tr>
            {{endfor eyeglasses}}
        </tbody>
    </table>
</section>