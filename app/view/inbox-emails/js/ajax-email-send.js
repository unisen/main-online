$(document).ready(function() {

    $("#enviar_mensagem").submit(function(e) {

        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "../../view/inbox-emails/script.php",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
                $("#message").text(strMessage);
                if ($.trim(strMessage) == 'sucesso') {
                    Swal.fire({
                        title: '',
                        text: "Email enviado com sucesso!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                            $('#enviar_mensagem').modal('toggle');
                            $('#enviar_mensagem').find('input').val('');

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