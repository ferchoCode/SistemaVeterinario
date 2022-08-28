<!--begin::Card-->

<section class="section">
    <div class="card-text">
        <h5 class="card-label">Editar tipo de alquiler</h5>
    </div>

    <form id="form_Actualizar" class="form">
        @csrf
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label>Nombre
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre"
                            value="{{ old('nombre') }}" autofocus />
                      
                    </div>

                    <div class="form-group col-6">
                        <label>Edad<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Ingrese edad" name="edad" id="edad"
                               value="{{old('edad')}}"/>
                    </div>
                    <div class="form-group col-6">
                        <label>Sexo<span class="text-danger">*</span></label>
                        <select class="form-control select2"   name="sexo" id="sexo"
                                value="{{old('sexo')}}">
                                <option value="H">H</option>
                                <option value="M">M</option>
                        </select>
                        
                    </div>
                    <div class="form-group col-6">
                        <label>Cliente<span class="text-danger">*</span></label>
                        <select class="form-control select2" id="kt_select2_2" name="cliente_id" id="clienteid"
                                value="{{old('clienteid')}}">
                            @foreach($cliente as $clientes)
                                <option
                                    value="{{ $clientes->id }}">{{ $clientes->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label>Tipo Especie<span class="text-danger">*</span></label>
                        <select class="form-control select2" id="tipo_especie" name="especie_id" id="especieid"
                                value="{{old('especieid')}}">
                            @foreach($especie as $especies)
                                <option
                                    value="{{ $especies->id }}">{{ $especies->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Raza<span class="text-danger">*</span></label>
                        <select class="form-control select2" id="tipo_raza" name="raza_id" id="razaid"
                        value="{{old('tipo_raza')}}">
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
            <input type="hidden" class="form-control" name="mascotaid" id="mascotaid"
                value="{{ old('mascotaid') }}" autofocus />
            <button type="submit" class="btn btn-primary mr-2 font-weight-bolder">Guardar</button>

        </div>
    </form>
</section>


{{-- <form id="basic-form" action="" method="post">
    <p>
        <label for="name">Name <span>(required, at least 3 characters)</span></label>
        <input id="name" name="name">
    </p>
    <p>
        <label for="age">Your Age <span>(minimum 18)</span></label>
        <input id="age" name="age">
    </p>
    <p>
        <label for="email">E-Mail <span>(required)</span></label>
        <input id="email" name="email">
    </p>
    <p>
        <label for="weight">Weight <span>(required if age over 50)</span></label>
        <input id="weight" name="weight">
    </p>
    <p>
        <input class="submit" type="submit" value="SUBMIT">
    </p>
</form> --}}
