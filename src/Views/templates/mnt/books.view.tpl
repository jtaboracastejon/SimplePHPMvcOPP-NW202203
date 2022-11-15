<h1>Listado de Libros</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-book&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Autor</th>
                <th>Tipo</th>
                <th>Código Barras</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach books}}
            <tr>
                <td>{{book_id}}</td>
                <td><a href="index.php?page=mnt-book&mode=DSP&book_id={{book_id}}">{{book_name}}</a></td>
                <td>{{book_date}}</td>
                <td>{{book_author}}</td>
                <td>{{book_type}}</td>
                <td>{{book_barcode}}</td>
                <td>{{book_status}}</td>
            </tr>
            {{endfor books}}
        </tbody>
    </table>
</section>