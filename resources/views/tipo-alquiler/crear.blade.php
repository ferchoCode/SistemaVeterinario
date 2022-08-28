<!--begin::Card-->

<section class="section">

    <div class="card-text">
        <h5 class="card-label">Nuevo tipo de alquiler</h5>
    </div>

    <form class="form" action="{{ url('tipo-alquiler') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                        <label>Nombre
                            <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre"
                            value="{{ old('nombre') }}" autofocus />
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-1 col-xl-6 col-md-6 col-sm-12">
                        <label>Descripción</label>
                        <textarea rows="3" class="form-control" placeholder="Ingrese descripción" name="descripcion"></textarea>
                        @error('descripcion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header d-flex flex-wrap py-2 mr-3 p-0">
            <button id="btnAgregar" type="submit" class="btn btn-primary mr-2 font-weight-bolder">Agregar</button>
            <a id="btnCancelar" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</section>
