$(document).ready(function() {

    $("#adicionar_novo_cliente").submit(function(e) {

        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "../../view/crud_classes/services/insert-cliente.php",
            data: $("form").serialize(),
            /*  dataType: "text", */
            success: function(data) {
                    $('#msg').html(data);
                    //$('#adicionar_novo_cliente').find('input').val('');
                }
                /* function(strMessage) {
                               $("#message").text(strMessage);
                               if (strMessage == 'sucesso') {
                                   Swal.fire({
                                       title: '',
                                       text: "Item inserido com sucesso!",
                                       icon: 'success',
                                       confirmButtonColor: '#3085d6',
                                       cancelButtonColor: '#d33',
                                       confirmButtonText: 'OK'
                                   }).then((result) => {
                                       if (result.isConfirmed) {
                                           location.reload();

                                       }
                                   })
                                   $('#adicionar_novo_cliente').modal('toggle');
                               } else {
                                   Swal.fire({
                                       icon: 'error',
                                       title: 'Oops...',
                                       text: strMessage,

                                   });

                               }
                           }
                       }); */
        });

    });
});

/* success: function(data) {
    $('#msg').html(data);
    $('#adicionar_novo_cliente').find('input').val('');
}, */