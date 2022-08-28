@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
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
                            <div id="crear_nuevo">
                                @include('tipo-alquiler.crear')
                            </div>
                            <div id="editar" style="display: none">
                                @include('tipo-alquiler.edit')
                            </div>
                            <div class="tabla">
                                @include('tipo-alquiler.tabla')
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
        function formEdit(tipo_alquiler) {
            if (estado == 0) {
                $('#editar').slideDown('fast');
                $('#crear_nuevo').slideUp('fast');
            }

            $('#nombre').val(tipo_alquiler.nombre);
            $('#descripcion').val(tipo_alquiler.descripcion);
            $('#tipoalquilerId').val(tipo_alquiler.id);
        }

        $(function() {
            $('#form_Actualizar').submit(function(e) {
                e.preventDefault();
                var nombre = $('#nombre').val();
                var descripcion = $('#descripcion').val();
                var id = $('#tipoalquilerId').val();

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "tipo-alquiler/actualizar/" + id,
                    data: {
                        nombre: nombre,
                        descripcion: descripcion,
                        id: id
                    },
                    success: function(response) {
                        console.log(response)
                        if (response) {
                            window.location.reload();
                            $("#form_Actualizar")[0].reset();
                            // toastr.success('Registro actualizado', {
                            //     timeout: 9000
                            // });
                            // setTimeout(window.location = '/tipo-alquiler', 1000);
                            // console.log(response);
                        }
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
        // $(document).ready(function() {
        //     $("#form_Actualizar").validate({
        //         rules: {
        //             "nombre": {
        //                 required: true,

        //             },
        //             "descripcion": {
        //                 required: true,
        //             }
        //         },
        //         messages: {
        //             "nombre": {
        //                 required: "Campo Requerido"
        //             },
        //             "descripcion": {
        //                 required: "Campo Requerido",
        //             }
        //         }
        //     });

        // });
    </script>
@endsection
