@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Modificar Raza</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" action="{{ url('raza/actualizar/'.$raza->id)}}" method="POST" enctype="multipart/form-data">
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
                                                        name="nombre" id="nombre" value="{{$raza->nombre}}" autofocus />
                                                    {{-- @error('nombre')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror --}}
                                                </div>
                                                <div class="form-group col">
                                                    <label>Descripción
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Ingrese descripcion"
                                                        name="descripcion" id="descripcion" value="{{$raza->descripcion}}" autofocus />
                                                    {{-- @error('nombre')
                                                  <span class="text-danger">{{ $message }}</span>
                                              @ende rror --}}
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Tipo Especie<span class="text-danger">*</span></label>
                                                    <select class="form-control select2" name="especie_id" id="especie_id"
                                                        value="{{ old('especie_id') }}">                                                     
                                                        @foreach ($especie as $especies)
                                                            <option value="{{ $especies->id }}" {{($especies->nombre == $raza->especie->nombre)? 'selected' : ''}}>{{ $especies->nombre }}</option>
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
                                {{-- <input type="hidden" class="form-control" name="razaid" id="razaid" value="{{ old('razaid') }}"
                                    autofocus /> --}}

                                    <a href="{{url('raza')}}" type="button" class="btn btn-secondary" >Atras</a>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection