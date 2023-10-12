<?php
// Initialize session
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
	header('location: ../../login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php

/* if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login/");
    exit;
}  */

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

/* $path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
include_once($path);
 */

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/includes/UI/header.php';
include_once($path);
//Include libs private functions
require_once './libs/farquivos.php';
require_once './libs/functions.php';
//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/AssociadoDAO.php';
require_once "../../crud/script/pdocrud.php";

?>

<link rel="stylesheet" href="css/unisen_styles.css">

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

        <script>
            /*
                         *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
                         *  you can remove this script tag and add classes directly to body
                         *  this is only for demo
                         .fab-top {
                                top: 505px;
                            }
                            .fab-right-bottom {
                                right: 18px;
                                bottom: -16px;
                                z-index: 1;
                            }
                         */
            //document.body.className += ' sidebar-mini' + ' sidebar-collapse' + ' sidebar-expanded-on-hover' + ' sidebar-top-offset';
        </script>
        <?php
        $path =  $_SERVER['DOCUMENT_ROOT'];
        $path .= $unisen_url . 'app/includes/UI/sidebar.php';
        include_once($path);
        ?>
        <div class="has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text" placeholder="start typing...">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
            <!-- NavBar Sticky -->
            <?php
            $path =  $_SERVER['DOCUMENT_ROOT'];
            $path .= $unisen_url . 'app/includes/UI/sidebar-left.php';
            include_once($path);
            ?>

            <!-- Main Content -->
            <div class="page has-sidebar-left height-full">
                <header class="blue accent-3 relative">
                    <div class="container-fluid text-white">
                        <div class="row p-t-b-10 ">
                            <div class="col">
                                <h4>
                                    <i class="icon-user-md"></i>
                                    Associados
                                </h4>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <?php
                            $pdocrud = new PDOCrud();

                            echo $pdocrud->dbTable("tbl_socios")->render();

                            $pdocrud->dbTable("tbl_socios")->render("insertform");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="#modalNovoAssociado" data-toggle="modal" data-target="#modalNovoAssociado" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
    </div>



    <!--MODAL NOVO ASSOCIADO -->
    <?php
    $path = dirname(__FILE__);
    $path .= '/modalNovoAssociado.php';
    include_once($path);
    ?>

    <!-- MODAL EDITAR ASSOCIADO -->
    <?php
    $path = dirname(__FILE__);
    $path .= '/modalEditarAssociado.php';
    include_once($path);
    ?>

    <!-- Footer -->
    <?php
    $path =  $_SERVER['DOCUMENT_ROOT'];
    $path .= $unisen_url . 'app/includes/UI/footer.php';
    include_once($path);
    ?>

    <!-- Right Sidebar -->
    <?php
    $path =  $_SERVER['DOCUMENT_ROOT'];
    $path .= $unisen_url . 'app/includes/UI/sidebar-right.php';
    include_once($path);
    ?>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg shadow white fixed"></div>
    </div>
    <!--/#app -->
    <script src="../../includes/template/assets/js/app.js"></script>


    <script src="js/jquery-maskmoney.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/validarcpfcliente.js"></script>

    <script src="js/tble_click_associados.js"></script>
    <script src="js/ajax-script-associado.js"></script>


    <!--Swit Alert -->
    <script src="../../includes/plugins/sweetalert2@9.js"></script>



    <!-- INICIA O DATATABLE ASSOCIADO -->
    <script>
        $(document).ready(function() {
            var table = $('#tbl_socios').DataTable();

            //ajusta as colunas
            $('#container-associado').css('display', 'block');
            table.columns.adjust().draw();

            $('#tbl_socios tbody').on('click', 'tr td.dassociadoitem', function() {

                var data = table.row(this).data();
                openEditAssociado();
                //var url = "editar_pedido.php?numero=" + data[1];
                //window.location.replace(url);
            });

            $(".even, .odd").on("click", function() {
                var id = $(this).data("data-id");
                // alert(id); 
            });
        });
    </script>


    <!-- VERIFICA CPF -->
    <script>
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

                    /* Swal.fire({
                        title: "CPF Inválido",
                        text: mensagem,
                        icon: "error",
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#cpf").val("");
                            $("#cpf").focus();
                        }
                    }) */

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
    </script>

    <!-- VERIFICA EMAIL -->
    <script>
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
                        console.log(data);
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


                            /* Swal.fire({
                                title: "",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                text: 'Ok',

                            })
                            $("#crm_uf").focus(); */


                        }

                    }
                });
            }
        }
    </script>

    <!-- VERIFICA CRM -->
    <script>
        function verificaCRM() {
            var crm = $("#crm");

            if (crm.val() != "") {
                $.ajax({
                    url: 'verificar/verificaCRM.php',
                    type: 'POST',
                    data: {
                        "crm": crm.val()
                    },
                    success: function(data) {
                        console.log(data);
                        data = $.parseJSON(data);

                        mensagem = data.crm;
                        if ($.trim(mensagem) == 'erro') {

                            var alertaErro = $("#alerta-erro");
                            alertaErro.html("CRM já cadastrado!");
                            alertaErro.css("display", "block");

                            $("#crm").val("");
                            $("#crm").focus();

                            setTimeout(function() {
                                alertaErro.css("display", "none");
                            }, 2000);

                            /* Swal.fire({
                                title: "",
                                text: "CRM já cadastrado!",
                                icon: "error",
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $("#crm").val("");
                                    $("#crm").focus();
                                }
                            }) */
                            //$("#resposta-crm").text(data.crm);
                        } else {

                            //$("#toast-crm").toast('show');
                            var alertaOk = $("#alerta-ok");

                            alertaOk.html("CRM Verificado!");

                            alertaOk.css("display", "block");

                            setTimeout(function() {
                                alertaOk.css("display", "none");
                            }, 2000);


                            /* Swal.fire({
                                title: "",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                text: 'Ok',

                            })
                            $("#crm_uf").focus(); */


                        }

                    }
                });
            }
        }
    </script>

    <!-- AUTO PREENCHER DADOS -->
    <script>
        function autoPreencherDados() {
            $("#nome").val("Diego Fernandes Neves Oliveira");
            $("#estadocivil").val("casado");
            $("#sexo").val("masculino");

            $("#dn").val("1982-01-08");
            $("#cpf").val("942.495.801-30");
            //$("#file").val("teste");

            $("#rg").val("430.427.4");
            $("#oexp").val("SSP");
            $("#rg_uf").val("GO");

            $("#dexp").val("2023-06-20");
            $("#nome_pai").val("Dario Fernandes de Oliveira");
            $("#nome_mae").val("Eneusa Maria da Silva Neves");

            $("#nacionalidade").val("brasileira");
            $("#naturalidade").val("Ipatinga");
            $("#nat_uf").val("GO");

            $("#titulo").val("6465456");
            $("#pis").val("4535355");
            $("#telefone").val("(62) 99265-8254");

            $("#endereco").val("Rua 36, 115, Setor Marista");
            $("#endereco_nome").val("SIM");
            $("#email").val("dfno82@gmail.com");

            $("#crm").val("696969");
            $("#crm_uf").val("GO");
            $("#id-escala").val("escala1");

            $("#senha").val("123456");
            $("#senha-confirma").val("123456");

        }
    </script>

    <?php if (isset($_GET['addcliente']) && 1 == $_GET['addcliente']) { ?>
        <script type='text/javascript'>
            $("#modalNovoAssociado").modal("show");
        </script>
    <?php } ?>

    <script>
        $(document).ready(function() {

            $("#novo_associado").submit(function(e) {

                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: "../../view/associados/novo-associado.php",
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
    </script>

    <script>
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
    </script>


    <script>
        $(document).ready(function() {
            $("#email").val("");

            $("#cpf").focusin(function() {
                $(this).css("background-color", "#fff08f");
            });

            $("#cpf").focusout(function() {
                $(this).css("background-color", "#ffffff");
                var cpf = $("#cpf").val();
                alertCPFInvalido(TestaCPF(cpf));
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