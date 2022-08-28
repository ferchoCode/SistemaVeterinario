<div class="table-responsive">
    <table class="table hover rounded table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
      
            
            <th style="width: 150px; align-content: center;" >ACCIÓN</th>
        </tr>
        </thead>
        <tbody>
        @foreach($especie as $especies)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$especies->nombre}}</td>
              
            
                <td>
                    <form id="eliminar{{$especies->id}}"
                          action="{{ url('especie/delete/' . $especies->id) }}"
                          method="POST">
                        @csrf
                        {{-- @can('editar_tipo_alquiler') --}}
                        {{-- <a onclick="formEdit({{$clientes}})"
                           class="btn  btn-icon btn-warning btn-sm mr-2">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a> --}}
                        <a type="button" class="btn  btn-icon btn-warning btn-sm mr-2" data-toggle="modal" data-target="#edit_especie" onclick="getEspecie({{$especies}})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        {{-- @endcan
                        @can('eliminar_tipo_alquiler') --}}
                        <button type="button" onclick="confirmEliminar({{ $especies->id }})"
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
