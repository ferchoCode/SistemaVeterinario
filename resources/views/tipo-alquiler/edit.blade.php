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
                        @error('nombre')
                        <span id="errornombre" class="text-danger"></span>
                        @enderror
                    </div>

                    <div class="form-group mb-1 col-xl-6 col-md-6 col-sm-12">
                        <label>Descripción</label>
                        <textarea rows="3" class="form-control" placeholder="Ingrese descripción" name="descripcion"
                            id="descripcion"></textarea>
                        @error('descripcion')
                        <span id="errordescripcion" class="text-danger"></span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header d-flex flex-wrap py-2 mr-3 p-0">

            <input type="hidden" class="form-control" name="tipoalquilerId" id="tipoalquilerId"
                value="{{ old('tipoalquilerId') }}" autofocus />
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
