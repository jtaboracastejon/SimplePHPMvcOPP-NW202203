<h1>Listado de Estudiantes</h1>
<section class="WWList">
    <button><a href="index.php?page=mnt-student&mode=INS" class="btn btn-success">Nuevo</a></button>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Cumpleaños</th>
                <th>Genero</th>
                <th>EMail</th>
                <th>Teléfono</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            {{foreach students}}
            <tr>
                <td>{{student_id}}</td>
                <td><a href="index.php?page=mnt-student&mode=DSP&student_id={{student_id}}">{{student_name}}</a></td>
                <td>{{student_birthdate}}</td>
                <td>{{student_gender}}</td>
                <td>{{student_email}}</td>
                <td>{{student_phone}}</td>
                <td>{{student_status}}</td>
            </tr>
            {{endfor students}}
        </tbody>
    </table>
</section>