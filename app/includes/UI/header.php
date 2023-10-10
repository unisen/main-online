<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <title>UNISEN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../includes/template/assets/css/app.css">

    <link rel="stylesheet" href="../../includes/dist/node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../includes/dist/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" href="../../includes/dist/node_modules/flag-icon-css/css/flag-icon.min.css" />
    <!--  <link rel="stylesheet" href="../../includes/dist/css/style.css" /> -->
    <!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"> -->
    <link rel="shortcut icon" href="../../../android-chrome-512x512.png" />
    <link rel="icon" type="image/png" href="../../../android-chrome-512x512.png" />

    <link rel="stylesheet" href="../../includes/UI/css/styles.css">

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
        })(window, document)
    </script>

</head>

<?php

$id = $_SESSION['id'];
require_once '../../config/database/conexao.php';
$sql_usuario_logado = "SELECT * FROM tbl_users WHERE id = $id";
$dados_do_usuario = mysqli_query($con, $sql_usuario_logado);

$login_atual = mysqli_fetch_array($dados_do_usuario, MYSQLI_ASSOC);
$_SESSION['userlogin'] = $login_atual;
//if ($_SESSION['userlogin']['user_image'] != $login_atual['user_image']) $_SESSION['userlogin'] = $login_atual;

?>