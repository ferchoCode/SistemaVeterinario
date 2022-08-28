<!-- Modal -->
<div class="modal fade" id="edit_raza" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Especie</h5>
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
                                <div class="form-group col">
                                    <label>Nombre
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Ingrese nombre"
                                        name="nombre" id="nombre" value="{{old('nombre')}}" autofocus />
                                    {{-- @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                                </div>
                                <div class="form-group col">
                                    <label>Descripción
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Ingrese descripcion"
                                        name="descripcion" id="descripcion" value="{{ old('descripcion')}}" autofocus />
                                    {{-- @error('nombre')
                                  <span class="text-danger">{{ $message }}</span>
                              @ende rror --}}
                                </div>
                                <div class="form-group col-6">
                                    <label>Tipo Especie<span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="especie_id" id="especie_id"
                                        value="{{ old('especie_id') }}">
                                            
                                        @foreach ($especie as $especies)
                                            <option value="{{ $especies->id }}">{{ $especies->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                <input type="hidden" class="form-control" name="razaid" id="razaid" value="{{ old('razaid') }}"
                    autofocus />


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
