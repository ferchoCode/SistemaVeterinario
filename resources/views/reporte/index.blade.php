@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Resportes</h3>
            
        </div>
        <div class="row">
            <div class="form-group col-xl-6 col-md-6">
                <div class="input-group">
                    <input onkeyup="search()" id="campo" type="text" class="form-control"
                           placeholder="Texto a buscar..."/>
                    <div class="input-group-append">
                        <div class="input-group">
                            <div class="input-group-append">
                            </div>
                            <select class="form-control" id="opcion">
                                <option value="nombre">Nombre</option>
                                <option value="especie_id">TipoEspecie</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary " type="button"><i class="flaticon2-search "></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Lista de Mascotas</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="reporte">
            @include('reporte.tabla')
        </div>
    </section>
@endsection
@section('scripts')
    <script>
         $(document).on('click','#tipo_especie', function() {
            let id = $(this).val();
            console.log(id);
            $.ajax({
                type: "GET",
                url:   "mascota/buscaraza/" + id, 
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response);
                    var html_select = '<option value="">Seleccione Raza</option>';
                    for(var i = 0; i <response.length; i++) 
                        // console.log(response[i].nombre);
                        html_select +='<option value=" '+response[i].id+ ' ">'+ response[i].nombre +'</option>';
                        $('#tipo_raza').html(html_select);
                        console.log(html_select);
                    
                    // $.each(response, function(nombre,id){
                    //     $.('#tipo_raza').append("<option value='"+ id "'>"+ value +"</option>")
                    // })
                    // $('#tabla').html(response);
                },
                error: function(xhr, ajaxOptions, thrownError) {}
            });
        })
    </script>
    <script>
         function search() {
            var valor = $('#campo').val();
            var opcion = $('#opcion').val();
            $.ajax({
                type: "GET",
                url: "{{url('reporte/searchmascota')}}",
                data: {valor: valor,opcion:opcion},
                success: function (response) {
                    console.log(response);
                    $('#reporte').html(response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }

        $(document).on('click','#opcion', function() {
            opcion = $(this).val();
            var valor = $('#campo').val();
            $.ajax({
                type: "GET",
                url: "{{ url('reporte/searchmascota') }}",
                data: {
                    opcion: opcion,
                    valor: valor
                },
                success: function(response) {
                    $('#tabla').html(response);
                },
                error: function(xhr, ajaxOptions, thrownError) {}
            });
        })
    </script>
@endsection
