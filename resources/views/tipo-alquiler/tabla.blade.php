<div class="table-responsive">
    <table class="table hover rounded table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>DESCRIPCIÓN</th>
            <th style="width: 150px; align-content: center;" >ACCIÓN</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tipo_alquileres as $tipo_alquiler)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$tipo_alquiler->nombre}}</td>
                <td>{{$tipo_alquiler->descripcion}}</td>

                <td >
                    <form id="eliminar{{$tipo_alquiler->id}}"
                          action="{{ url('tipo-alquiler/delete/' . $tipo_alquiler->id) }}"
                          method="POST">
                        @csrf
                        {{-- @can('editar_tipo_alquiler') --}}
                        <a onclick="formEdit({{$tipo_alquiler}})"
                           class="btn  btn-icon btn-warning btn-sm mr-2">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        {{-- @endcan
                        @can('eliminar_tipo_alquiler') --}}
                        <button type="button" onclick="confirmEliminar({{ $tipo_alquiler->id }})"
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