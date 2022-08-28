<!--begin::Card-->

<section class="section">

    <div class="card-text">
        <h5 class="card-label">Nuevo tipo de alquiler</h5>
    </div>

    <form class="form" action="{{ url('mascota') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="form-group col-6">
                        <label>Nombre
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre"
                            value="{{ old('nombre') }}" autofocus />
                        {{-- @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="form-group col-6">
                        <label>Edad(meses)<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Ingrese edad" name="edad"
                               value="{{old('edad')}}"/>
                      
                    </div>
                    
                    <div class="form-group col-6">
                        <label>Sexo<span class="text-danger">*</span></label>
                        <select class="form-control select2"   name="sexo"
                                value="{{old('sexo')}}">
                                <option value="">Seleccione un sexo</option>
                                <option value="H">H</option>
                                <option value="M">M</option>
                        </select>
                        
                    </div>
                    <div class="form-group col-6">
                        <label>Cliente<span class="text-danger">*</span></label>
                        <select class="form-control select2" id="kt_select2_2" name="cliente_id"
                                value="{{old('cliente_id')}}">
                                <option value="">Seleccione un cliente</option>
                            @foreach($cliente as $clientes)
                                <option value="{{ $clientes->id }}">{{ $clientes->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label>Tipo Especie<span class="text-danger">*</span></label>
                        <select class="form-control select2" id="tipo_especie" name="especie_id"
                                value="{{old('especie_id')}}">
                                <option value="">Seleccione una Especie</option>

                            @foreach($especie as $especies)
                                <option
                                    value="{{ $especies->id }}">{{ $especies->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Raza<span class="text-danger">*</span></label>
                        <select class="form-control select2" id="tipo_raza" name="raza_id"
                        value="{{old('raza_id')}}">
                        {{-- <option value="">Seleccione Raza</option> --}}
                                {{-- @foreach($raza as $razas)
                            <option
                                    value="{{ $razas->id }}">{{ $razas->nombre }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header d-flex flex-wrap py-2 mr-3 p-0">
            <button id="btnAgregar" type="submit" class="btn btn-primary mr-2 font-weight-bolder">Guardar</button>
            <a id="btnCancelar" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</section>
