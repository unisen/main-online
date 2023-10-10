$(document).ready(function() {

    $("#adicionar_novo_cliente").submit(function(e) {

        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "../../view/crud_classes/services/insert-cliente.php",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
                $("#message").text(strMessage);
                if ($.trim(strMessage) == 'sucesso') {
                    Swal.fire({
                        title: '',
                        text: "Cliente inserido com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                            $('#adicionar_novo_cliente').modal('toggle');
                            $('#adicionar_novo_cliente').find('input').val('');

                        }

                    })

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: strMessage,

                    });

                }
            }
        });
    });
});


$(document).ready(function() {

    $("#update_cliente").submit(function(e) {

        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "../../view/crud_classes/services/update-cliente.php",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
                $("#message").text(strMessage);
                if ($.trim(strMessage) == 'sucesso') {
                    Swal.fire({
                        title: '',
                        text: "Cliente Atualizado com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: strMessage,

                    });

                }
            }
        });
    });
});


$(document).ready(function() {

    $("#deleteCliente_").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "../../view/crud_classes/services/delete-cliente.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
                $("#message").text(strMessage);
                if ($.trim(strMessage) == 'sucesso') {
                    Swal.fire({
                        title: '',
                        text: "Cliente Removido com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();

                        }
                    })
                    $('#deleteCliente').modal('toggle');
                } else {
                    Swal.fire({
                        title: '',
                        text: "Cliente Removido com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();

                        }
                    });

                }
            }
        });

    });
});