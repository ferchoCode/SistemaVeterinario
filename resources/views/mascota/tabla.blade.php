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
            <th style="width: 150px; align-content: center;" >ACCIÓN</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mascota as $mascotas)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$mascotas->nombre}}</td>
                <td>{{$mascotas->edad}}</td>
                <td>{{$mascotas->sexo}}</td>
                <td>{{$mascotas->cliente->nombre}}</td>
                {{-- <td>{{$mascotas->especie->nombre}}</td> --}}
                <td>{{$mascotas->raza->nombre}}</td>
                <td>
                    <form id="eliminar{{$mascotas->id}}"
                          action="{{ url('mascota/delete/' . $mascotas->id) }}"
                          method="POST">
                        @csrf
                        {{-- @can('editar_tipo_alquiler') --}}
                        <a onclick="formEdit({{$mascotas}})"
                           class="btn  btn-icon btn-warning btn-sm mr-2">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        {{-- @endcan
                        @can('eliminar_tipo_alquiler') --}}
                        <button type="button" onclick="confirmEliminar({{ $mascotas->id }})"
                                class="btn btn-danger btn-sm mr-2">
                                <i class="fa-solid fa-trash-can"></i>
                        </button>
                        {{-- @endcan --}}
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>