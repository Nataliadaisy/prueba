function registrarSoliCurso() {
    $("#form_solCurso").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'procesos/proceso_registro.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#mensaje").css("display", "block");
                $("#botonSolCur").css("display", "none");

            },
            success: function (response) {
                var datos = JSON.parse(response);
                if (datos.estado == 1) {
                    //swal("REGISTRO ALMACENADO", "Tu registro se ha almacenado de forma correcta.", "success");
                    swal({
                            title: "NOTICIA PUBLICADA",
                            text: "Los datos de tu noticia han sido publicados exitosamente.",
                            type: "success",
                            confirmButtonText: "OK",
                        },
                        function (inputValue) {
                            if (inputValue === false) {
                            } else {
                                location.reload();
                            }

                        });

                } else if (datos.estado == 0) {
                    swal("Error", "Intente nuevamente", "warning");
                }
                $('#form_solCurso').css("opacity", "");
                $("#botonSolCur").removeAttr("disabled");
            }
        });
    });

}

function registrarComent() {
    $("#form_comentario").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'procesos/proceso_registro.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#mensaje").css("display", "block");
                $("#botonSolCur").css("display", "none");

            },
            success: function (response) {
                var datos = JSON.parse(response);
                if (datos.estado == 1) {
                    //swal("REGISTRO ALMACENADO", "Tu registro se ha almacenado de forma correcta.", "success");
                    swal({
                            title: "COMENTARIO PUBLICADO",
                            text: "LEl comentario se ha publicado correctamente",
                            type: "success",
                            confirmButtonText: "OK",
                        },
                        function (inputValue) {
                            if (inputValue === false) {
                            } else {
                                location.reload();
                            }

                        });

                } else if (datos.estado == 0) {
                    swal("Error", "Intente nuevamente", "warning");
                }
                $('#form_solCurso').css("opacity", "");
                $("#botonSolCur").removeAttr("disabled");
            }
        });
    });

}



$(document).ready(function () {
    $(document).on('click', '.comentario', function () {
        var id = $(this).val();
        $('#comentario').modal('show');
        $("#idcomentario").val(id);
    });
});



function responderComent() {
    $("#form_comentarioresp").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'procesos/proceso_registro.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#mensaje").css("display", "block");
                $("#btnrespo").css("display", "none");

            },
            success: function (response) {
                var datos = JSON.parse(response);
                if (datos.estado == 1) {
                    //swal("REGISTRO ALMACENADO", "Tu registro se ha almacenado de forma correcta.", "success");
                    swal({
                            title: "COMENTARIO PUBLICADO",
                            text: "LEl comentario se ha publicado correctamente",
                            type: "success",
                            confirmButtonText: "OK",
                        },
                        function (inputValue) {
                            if (inputValue === false) {
                            } else {
                                location.reload();
                            }

                        });

                } else if (datos.estado == 0) {
                    swal("Error", "Intente nuevamente", "warning");
                }
                $('#form_comentarioresp').css("opacity", "");
                $("#btnrespo").removeAttr("disabled");
            }
        });
    });

}



