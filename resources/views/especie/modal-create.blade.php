
  <div class="modal fade" id="crear_especie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registra Especie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form" action="{{ url('especie') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="form-group col">
                                <label>Nombre
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre"
                                    value="{{ old('nombre') }}" autofocus />
                                {{-- @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="card-header d-flex flex-wrap py-2 mr-3 p-0">
                    <button id="btnAgregar" type="submit" class="btn btn-primary mr-2 font-weight-bolder">Guardar</button>
                    <a id="btnCancelar" class="btn btn-secondary">Cancelar</a>
                </div> --}}
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
      </div>
    </div>
  </div>