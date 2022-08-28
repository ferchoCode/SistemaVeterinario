<!-- Modal -->
<div class="modal fade" id="edit_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" id="formUpdate" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Nombre
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre"
                                    value="{{'nombre'}}" autofocus />
                                {{-- @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
        
                            <div class="form-group col-6">
                                <label>Apellido
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Ingrese apellido" name="apellido" id="apellido"
                                    value="{{'apellido'}}" autofocus />
                                {{-- @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
        
                            <div class="form-group col-6">
                                <label>Direccion
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Ingrese direccion" name="direccion" id="direccion"
                                    value="{{'direccion'}}" autofocus />
                                {{-- @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                            
                            <div class="form-group col-6">
                                <label>Telefono
                                    <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" placeholder="Ingrese telefono" name="telefono" id="telefono"
                                    value="{{'telefono'}}"autofocus />
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
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button> --}}
                <input type="hidden" class="form-control" name="clienteid" id="clienteid"
                  value="{{ old('clienteid') }}" autofocus />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
      </div>
    </div>
  </div>