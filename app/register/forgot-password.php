<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<?php

// $_SESSION['url_aplicativo'] = URL_APLICATIVO;
// $_SESSION['path_userimages'] = PATH_USERIMAGES;

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}


function nome_curto_empresa($str)
{
    $str2 = explode(" - ", $str);
    $str = trim($str2[0]);
    return $str;
}

$empresa_json = json_decode(file_get_contents("../view/dados-empresa/configs-dados-empresa.json"));
$empresa_configs = $empresa_json[0];
$path_logo_img =  $unisen_url . $empresa_configs->logo_path;

$nome_empresa_title =  nome_curto_empresa($empresa_configs->nome_empresa);

//require_once './contador/useronline.php';



/* $path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
include_once($path); */
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../favicon.ico" />
    <title><?php if (isset($empresa_configs->nome_empresa)) echo nome_curto_empresa($empresa_configs->nome_empresa); ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="../includes/template/assets/css/app.css">

    <link rel="stylesheet" href="css/styles.css">

    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>
        (function(w, d, u) {
            w.readyQ = [];
            w.bindReadyQ = [];

            function p(x, y) {
                if (x == "ready") {
                    w.bindReadyQ.push(y);
                } else {
                    w.readyQ.push(x);
                }
            };
            var a = {
                ready: p,
                bind: p
            };
            w.$ = w.jQuery = function(f) {
                if (f === d || f === u) {
                    return a
                } else {
                    p(f)
                }
            }
        })(window, document);
    </script>

    <script src="js/validarcpfcliente.js"></script>
</head>

<body class="light">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper big active">
                
                <div class='box-load'>
                    <div class='pre'></div>
                </div>
</div>
        </div>
    </div>
    <div id="app">

        <div class="light b-t">
            <div id="primary" class="content-area" data-bg-possition="center" data-bg-repeat="false" style="background: url('http://localhost/unisen-sistema/app/includes/template/assets/img/icon/icon-circles.png');">
                <main id="main" class="site-main">
                    <div class="container">
                        <div class="col-xl-8 mx-lg-auto p-t-b-80">
                            <header class="text-center">
                                <h1><?php if (isset($empresa_configs->nome_empresa)) echo
                                    $empresa_configs->nome_empresa; ?></h1>
                                <p>Insira seu email de cadastro para recuperar a senha.
                                </p>
                                <img class="p-t-b-50" src="<?php if (isset($empresa_configs->logo_path)) echo $path_logo_img; ?>" alt="" width="60px">
                            </header>
                            <form role="form" id="recupera_senha" name="recupera_senha" method="POST" class="form-horizontal needs-validation" autocomplete="false">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="cpf" id="cpf" class="cpf form-control form-control-lg" placeholder="CPF" onchange="">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Enviar">
                                        <p class="forget-pass">Um email de recuperação da senha será enviado para você.</p>
                                    </div>

                                </div>
                            </form>
                            <div role="alert" class="alert alert-danger" id="alerta-erro"><strong>Oh snap!</strong> </div>
                            <div role="alert" class="alert alert-success" id="alerta-ok"><strong>Well done!</strong> </div>
                        </div>
                    </div>
                </main>
                <!-- #main -->

            </div>
            <div class="text-center">
                <a href="login.php" class="google-login btn btn-create-account">Voltar</a>
            </div>
            <!-- #primary -->
        </div>

    </div>

    <!--/#app -->
    <script src="../includes/template/assets/js/app.js"></script>

    <!--Swit Alert -->
    <script src="../../includes/plugins/sweetalert2@9.js"></script>

    <script src="js/jquery.mask.js"></script>
    <script src="js/jquery.mask.min.js"></script>


    <script src="js/scripts.js"></script>


    <script>
        $(document).ready(function() {


            $("#cpf").focusout(function() {
                $(this).css("background-color", "#ffffff");
                var cpf = $("#cpf").val();
                alertCPFInvalido(TestaCPF(cpf));

               /*  setTimeout(function() {
                    verificaCPF();
                }, 2200); */
            });


            $("#recupera_senha").submit(function(e) {

                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "recuperar-senha.php",
                    data: $("form").serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $("#message").text(strMessage);
                        if ($.trim(strMessage) == 'sucesso') {
                            Swal.fire({
                                title: '',
                                text: "Email enviado com link para recuperação da senha!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
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
                });

            });
        });
    </script>






    <!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
    <script>
        (function($, d) {
            $.each(readyQ, function(i, f) {
                $(f)
            });
            $.each(bindReadyQ, function(i, f) {
                $(d).bind("ready", f)
            })
        })(jQuery, document)
    </script>
</body>

</html>