@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Mascota</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header ">
                            <div id="btnNuevo" class="card-toolbar btn btn-primary font-weight-bolder">
                                <i class="fa-solid fa-plus"></i>
                                <span>Nuevo</span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="editar" style="display: none">
                                @include('mascota.edit')
                            </div>
                            <div id="crear_nuevo">
                                @include('mascota.crear')
                            </div>
                            <div class="tabla">
                                @include('mascota.tabla')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        $(document).on('click','#tipo_especieedit', function() {
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
                        $('#tipo_razaedit').html(html_select);
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
        $(document).ready(function() {
            estado = 0;
            $("#btnNuevo").click(function() {
                if (estado == 0) {
                    $('#crear_nuevo').slideDown('fast');
                    $('#editar').slideUp('fast');
                }
                // $("#crear_nuevo").css("display", "none");
                // $("#mielemento").css("display", "block");
            });

            $('#btnCancelar').click(function() {
                $('#crear_nuevo').slideUp('fast');
                estado = 0;
            });
        });
    </script>
        
    <script>
        function formEdit(mascotas) {
            console.log(mascotas);
            if (estado == 0) {
                $('#editar').slideDown('fast');
                $('#crear_nuevo').slideUp('fast');
            }

            $('#nombre').val(mascotas.nombre);
            $('#edad').val(mascotas.edad);
            $('#sexo').val(mascotas.sexo);
            $('#clienteid').val(mascotas.cliente_id);
            $('#tipo_especie').val(mascotas.especie_id);
            $('#tipo_raza').val(mascotas.raza_id);
          

            $('#mascotaid').val(mascotas.id);
        }

        $(function() {
            $('#form_Actualizar').submit(function(e) {
                e.preventDefault();
                var nombre = $('#nombre').val();
                var edad = $('#edad').val();
                var sexo = $('#sexo').val();
                var clienteid = $('#cliente_id').val();
                var especieid = $('#tipo_especieedit').val();
                var razaid = $('#tipo_razaedit').val();
                var id = $('#mascotaid').val();
                
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "mascota/actualizar/" + id,
                    data: {
                        nombre: nombre,
                        edad: edad,
                        sexo: sexo,
                        clienteid: clienteid,
                        // especieid: especieid,
                        razaid: razaid,
                        id: id,
                    },
                    beforeSend: function(){},
                    success: function(response) {
                        console.log(response)
                            window.location.reload();
                    },
                    error: function(err) {
                        if (err.status ==
                            422
                        ) { // cuando el codigo de status es 422 significa error de validacion 
                            console.log(err.responseJSON);
                            // mostrando errores del campo conrrespondiente
                            $.each(err.responseJSON.errors, function(i, error) {
                                $("#form_Actualizar").append(error);

                                // $("#errornombre").html(error);
                                // $("#errordescripcion").html(error);
                            });
                        }
                    }
                });
            });
        });
       
    </script>

        <script>
            function confirmEliminar(id) {
                //eliminar(id);
                console.log(id);
                Swal.fire({
                    title: 'Esta seguro de eliminar este Registro ??',
                    text: "Si Confirma la accion no podra recuperar los datos !!",
                    //icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#187DE4',
                    cancelButtonColor: '#F64E60',
                    confirmButtonText: 'Si, Eliminar !'
                }).then((result) => {
    
                    if (result.value) {
                        //form.submit();
                        $("#eliminar" + id).submit()
                    }
                })
            }
        </script>
@endsection
