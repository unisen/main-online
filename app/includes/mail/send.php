<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body onload="">

<button onclick="sendEmail('372','nome','tomador','teste@email.com','crm','cpf','msgResposta');">
    Enviar!
</button>
    <!--Swit Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        function sendEmail(id, nome, tomador, email, crm, cpf, msgResposta) {

            // msgResposta = "Email enviado com sucesso!"
            //alert('ok');

            $.ajax({
                method: "POST",
                url: "script.php",
                data: {
                    id: id,
                    nome: nome,
                    tomador: tomador,
                    email: email,
                    crm: crm,
                    cpf: cpf
                },
                dataType: "text",
                success: function(strMessage) {
                    $("#message").text(strMessage);
                    if ($.trim(strMessage) == 'sucesso') {
                        Swal.fire({
                            title: '',
                            text: msgResposta,
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //location.reload();
                                //$('#enviar_mensagem').modal('toggle');
                                //$('#enviar_mensagem').find('input').val('');

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
            })
        }

        
    </script>
</body>

</html>