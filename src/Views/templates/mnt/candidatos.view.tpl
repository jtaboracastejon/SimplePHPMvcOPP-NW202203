<h1>Listado de Candidatos</h1>
<section>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Identidad</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Creado</th>
                <th><a href="index.php?page=Mnt-candidato" class="btn w32 depth-1">+</a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach candidatos}}
            <tr>
                <td>{{id}}</td>
                <td>{{identidad}}</td>
                <td>{{nombre}}</td>
                <td>{{created}}</td>
                <td>{{updated}}</td>
            </tr>
            {{endfor candidatos}}
        </tbody>
    </table>
</section>