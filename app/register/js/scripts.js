function confirmaSenha() {
    var senha = $("#senha").val();
    var confirma = $("#senha-confirma").val();
    if (senha != confirma) {

        var alertaErro = $("#alerta-erro");
        alertaErro.html("As senhas não coincidem. Tente novamente.");
        alertaErro.css("display", "block");
        $("#senha").val("");
        $("#senha").focus();
        $("#senha-confirma").val("");

        setTimeout(function() {
            alertaErro.css("display", "none");
        }, 2000);

    }
}


function nomeUppercase() {
    //console.log(strNome.value);
    $('#nome_completo').val($('#nome_completo').val().toUpperCase());
}

function verificaCRM() {
    var crm = $("#crm");
    var crm_uf = $("#crm_uf");

    if (crm.val() != "") {
        $.ajax({
            url: 'verificar/verificaCRM.php',
            type: 'POST',
            data: {
                "crm": crm.val() + crm_uf.val()
            },
            success: function(data) {
                //console.log(data);
                data = $.parseJSON(data);
                mensagem = data.crm;
                //console.log(mensagem);

                if ($.trim(mensagem) == 'erro') {

                    var alertaErro = $("#alerta-erro");
                    alertaErro.html("CRM já cadastrado!");
                    alertaErro.css("display", "block");

                    $("#crm").val("");
                    $("#crm").focus();

                    setTimeout(function() {
                        alertaErro.css("display", "none");
                    }, 2000);

                } else {

                    //$("#toast-crm").toast('show');
                    var alertaOk = $("#alerta-ok");

                    alertaOk.html("CRM Verificado!");

                    alertaOk.css("display", "block");

                    setTimeout(function() {
                        alertaOk.css("display", "none");
                    }, 2000);

                }

            }
        });
    }
}

function alertCPFInvalido(mensagem) {
    var cpfcliente = $("#cpf").val();

    if (cpfcliente != "") {


        if (mensagem == false) {
            mensagem = cpfcliente;

            var alertaErro = $("#alerta-erro");
            alertaErro.html("CPF Inválido!");
            alertaErro.css("display", "block");

            $("#cpf").val("");
            $("#cpf").focus();

            setTimeout(function() {
                alertaErro.css("display", "none");
            }, 2000);

        } else {
            //$("#toast-crm").toast('show');
            var alertaOk = $("#alerta-ok");

            alertaOk.html("CPF Válido!");

            alertaOk.css("display", "block");

            setTimeout(function() {
                alertaOk.css("display", "none");
            }, 2000);

            return true;
        }
    }
}


function verificaEmail() {
    var email = $("#email");

    if (email.val() != "") {
        $.ajax({
            url: 'verificar/verificaEmail.php',
            type: 'POST',
            data: {
                "email": email.val()
            },
            success: function(data) {
                //console.log(data);
                data = $.parseJSON(data);

                //$("#resposta-email").text(data.email);
                mensagem = data.email;

                if ($.trim(mensagem) == 'erro') {
                    var alertaErro = $("#alerta-erro");
                    alertaErro.html("Email já cadastrado!");
                    alertaErro.css("display", "block");

                    $("#email").val("");
                    $("#email").focus();

                    setTimeout(function() {
                        alertaErro.css("display", "none");
                    }, 2000);
                } else {

                    //$("#toast-crm").toast('show');
                    var alertaOk = $("#alerta-ok");

                    alertaOk.html("Email Verificado!");

                    alertaOk.css("display", "block");

                    setTimeout(function() {
                        alertaOk.css("display", "none");
                    }, 2000);

                }

            }
        });
    }
}



function verificaCPF() {
    var cpf = $("#cpf");

    if (cpf.val() != "") {
        $.ajax({
            url: 'verificar/verificaCPF.php',
            type: 'POST',
            data: {
                "cpf": cpf.val()
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);

                //$("#resposta-cpf").text(data.cpf);
                mensagem = data.cpf;

                if ($.trim(mensagem) == 'erro') {
                    var alertaErro = $("#alerta-erro");
                    alertaErro.html("CPF já cadastrado!");
                    alertaErro.css("display", "block");

                    $("#cpf").val("");
                    $("#cpf").focus();

                    setTimeout(function() {
                        alertaErro.css("display", "none");
                    }, 2000);
                } else {

                    //$("#toast-crm").toast('show');
                    var alertaOk = $("#alerta-ok");

                    alertaOk.html("CPF Verificado!");

                    alertaOk.css("display", "block");

                    setTimeout(function() {
                        alertaOk.css("display", "none");
                    }, 2000);

                }

            }
        });
    }
}



// FORMATACAO MASCARA DOS CAMPOS EM FORMULARIOS
$(document).ready(function() {
    $('.cpf').mask('000.000.000-00');
    /* $('.cnpj').mask('00.000.000/0000-00');
    $('.time').mask('00:00:00');
    $('.date_time').mask('99/99/9999 00:00:00');
    $('.cep').mask('99.999-999');
    $('.phone').mask('+99 (99) 9999-9999');
    $('.phone_with_ddd').mask('(99) 9999-9999');
    $('.all_phones').mask('(99) 09999-9999');
    $('.phone_us').mask('(999) 999-9999');
    $('.mixed').mask('AAA 000-S0S'); */
    /* $('.comissao-perc').mask('000.00'); */

    /* $('#cep_cliente').keypress(function() {
        txtBoxFormat(this.form, this.name, '99.999-999', this)
    }); */

});