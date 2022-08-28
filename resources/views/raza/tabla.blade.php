<div class="table-responsive">
    <table class="table hover rounded table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>TIPO ESPECIE</th>

      
            
            <th style="width: 150px; align-content: center;" >ACCIÓN</th>
        </tr>
        </thead>
        <tbody>
        @foreach($raza as $razas)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$razas->nombre}}</td>
                <td>{{$razas->descripcion}}</td>
                <td>{{$razas->especie->nombre}}</td>
            
                <td>
                    <form id="eliminar{{$razas->id}}"
                          action="{{ url('raza/delete/' . $razas->id) }}"
                          method="POST">
                        @csrf
                        {{-- @can('editar_tipo_alquiler') --}}
                        {{-- <a onclick="formEdit({{$clientes}})"
                           class="btn  btn-icon btn-warning btn-sm mr-2">
                           <i class="fa-solid fa-pen-to-square"></i>
                        </a> --}}
                        <a  href="{{ url('raza/'.$razas->id.'/edit') }}"  class="btn  btn-icon btn-warning btn-sm mr-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        {{-- @endcan
                        @can('eliminar_tipo_alquiler') --}}
                        <button type="button" onclick="confirmEliminar({{ $razas->id }})"
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
