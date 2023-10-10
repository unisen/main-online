<?php session_start();
//$modo = "producao";
//$unidade = $_GET['nome'];

//$tomador_nome = $_GET['$tomador_nome'];

if (!isset($_GET['confirmacao'])) header("Location: ../login/");
else {
    $confirmacao = $_GET['confirmacao'];
    $_SESSION['confirmacao'] = $confirmacao;
}


require_once '../config/database/conexao.php';

//$conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);
$confirma_query = mysqli_query($con, "SELECT * FROM tbl_cadastrantes WHERE confirmacao='$confirmacao';");
if ($confirma_query->num_rows == 1) {
    //mysqli_query ($con,"UPDATE tbl_cadastrantes SET STATUS='confirmado' WHERE confirmacao='$confirmacao';");
    //header("location: cadastro.php?confirmacao=$confirmacao");
    $resposta_confirm = "valida";
} else {
    $resposta_confirm = "invalida";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização | Senha de Acesso do Associado</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../includes/template/assets/css/app.css">
    <style>
        @import url('https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css');

        * {
            box-sizing: border-box;
        }

        body,
        html {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            font-family: arial, helvetica, sans-serif;
            background-color: #3E4532;
            margin: 0;
            width: 100%;
            height: 100%;
        }

        p {
            margin: auto;
            text-align: center;
            font-weight: bold;
            width: 100%;
        }

        .ok {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #181A13;
            padding: 20px;
            width: 90px;
            border-radius: 50%;
            margin: auto;
        }

        .invalid {
            display: block;
            width: 100%;
            text-align: center;
            background-color: red;
            padding: 20px;
            width: 90px;
            border-radius: 50%;
            margin: auto;
        }

        i {
            display: block;
            font-size: 30px;
            color: #D1E7A7;
            margin: <?php if ($confirmacao != 'invalida') {
                        echo '3px 0 0 5px';
                    } else {
                        echo '5px 0 0 0px';
                    } ?>;
        }

        .form {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
            width: 100%;
            max-width: 500px;
            max-height: 600px;
            height: 95%;
            padding: 15px 3px;
            background: white;
            border-radius: 15px;
        }

        a {
            display: block;
            background-color: white;
            text-align: center;
            color: black;
            margin: 20px auto 0 auto;
            width: 70%;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 0px 5px grey;
            padding: 3%;
            text-decoration: none;
            font-size: 0.8rem;
        }

        a:hover {
            background-color: darkgreen;
            color: white;
        }

        .subinfo {
            color: #181A13;
            padding: 0px 40px;
        }

        .frm-atualiza-senha {
            padding: 17%;
        }

        #alerta-erro {
            display: none;
        }

        #alerta-ok {
            display: none;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div class='form'>
        <?php if ($resposta_confirm != 'invalida') { ?>
            <div class='ok'>
                <i class="fi fi-br-check"></i>
            </div>
            <p>Atualize sua senha</p>
            <form role="form" id="atualizar_senha" name="atualizar_senha" method="POST" class="form-vertical" autocomplete="false">
                <div class="row frm-atualiza-senha">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="password" name="senha" id="senha" placeholder="Senha de 6 digitos" maxlength="6">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="senha-confirma" id="senha-confirma" placeholder="Repita a senha" maxlength="6" onblur="confirmaSenha()">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <input type="submit" id="atualizar-senha" class="btn btn-primary btn-lg btn-block" value="Atualizar Senha">
                        <br>
                        <div role="alert" class="alert alert-danger" id="alerta-erro"><strong>Oh snap!</strong> </div>
                        <div role="alert" class="alert alert-success" id="alerta-ok"><strong>Well done!</strong> </div>
                    </div>
                </div>

            </form>            

        <?php } else { ?>
            <div class='invalid'>
                <i class="fi fi-br-cross"></i>
            </div>
            <p>Código de confirmação inválido!</p>
            <?php header("Refresh:3; url=login.php"); ?>
        <?php }; ?>


    </div>

    <!--Swit Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
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
                }, 4000);

            }
        }
    </script>


<script>
        $(document).ready(function() {
            $("#atualizar-senha").click(function(e) {

                //var formulario = new FormData(this);

                //console.log(formulario);


                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: "update-senha.php",
                    data: $("form").serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $("#message").text(strMessage);
                        if ($.trim(strMessage) == 'sucesso') {
                            Swal.fire({
                                title: '',
                                text: "Senha Atualizada com sucesso!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    //location.reload();
                                    //$('.btn-proximo2').css("display", "block");
                                    //$('#enviar_mensagem').find('input').val('');
                                    window.location = "login.php";
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
    </script>

</body>

</html>