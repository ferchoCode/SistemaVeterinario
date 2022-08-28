<div class="table-responsive">
    <table class="table hover rounded table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>EDAD</th>
                <th>SEXO</th>
                <th>CLIENTE</th>
                {{-- <th>TIPO ESPECIE</th> --}}
                <th>TIPO RAZA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascota as $mascotas)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $mascotas->nombre }}</td>
                    <td>{{ $mascotas->edad }}</td>
                    <td>{{ $mascotas->sexo }}</td>
                    <td>{{ $mascotas->cliente->nombre }}</td>
                    {{-- <td>{{ $mascotas->especie->nombre }}</td> --}}
                    <td>{{ $mascotas->raza->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
