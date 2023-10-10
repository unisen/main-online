function CriaPastaCadastrante() {

    var pasta_cadastrante = $("#pasta_cadastrante");

    if (pasta_cadastrante.val() != "") {

        $.ajax({
            url: 'criarPasta.php',
            type: 'POST',
            data: {
                "crmsocio": pasta_cadastrante.val()
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);

                mensagem = data;

                console.log(mensagem);

                if (mensagem == "erro") {

                    //var alertaErro = $("#alerta-erro");
                    //alertaErro.html("Diretório já existe");
                    //alertaErro.css("display", "block");

                    /* Swal.fire({
                         title: "Oops...",
                         text: "Diretório já existe!",
                         icon: "error",
                     });
                    */
                    var alertaErro = pasta_cadastrante.val() + " - " + " Pasta do Cadastrante já existe!";
                    $('#pasta_cadastrante').val(alertaErro);

                    //$("#crm_cadastrante").val("");
                    //$('#pasta_cadastrante').focus();

                    setTimeout(function() {
                        $('#pasta_cadastrante').val("");
                        $('#crm_cadastrante').focus();
                        //alertaErro.css("display", "none");
                    }, 2500);

                    //$("#resposta-crm").text(data.crm);
                } else {

                    //$("#toast-crm").toast('show');
                    //var alertaOk = $("#alerta-ok");
                    //alertaOk.html("Diretório Criado!");
                    //alertaOk.css("display", "block");

                    /*  Swal.fire({
                         title: "",
                         icon: 'success',
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'OK',
                         text: 'Pasta Cadastrante Criada!'
                     }); */

                    var pasta = pasta_cadastrante.val();

                    var alertaOk = pasta + " - " + " Pasta Criada!";
                    $('#pasta_cadastrante').val(alertaOk);

                    setTimeout(function() {
                        $('#pasta_cadastrante').val(pasta);
                        $('#nome_cadastrante').focus();
                        //alertaOk.css("display", "none");
                    }, 2500);

                    // $("#nome_cadastrante").focus();


                }

            }
        });
    }
}