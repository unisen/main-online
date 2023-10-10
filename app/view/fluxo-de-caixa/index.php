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
?>
<?php

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/includes/UI/header.php';
include_once($path);


?>
<!-- DataTables -->
<link rel="stylesheet" href="../../includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<link rel="stylesheet" href="css/unisen_styles.css">

<body class="light" onload="loading_unisen()">

    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='box-load'>
        <div class='pre'></div>
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
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50"
                                type="text" placeholder="start typing...">
                        </div>
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                            aria-expanded="false" aria-label="Toggle navigation"
                            class="paper-nav-toggle paper-nav-white active "><i></i></a>
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

                <header class="my-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <h1 class="s-24">
                                    <i class="icon-pages"></i>
                                    CASH <span class="s-14">Fluxo de Caixa</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="container-fluid my-3">

                    <a href="#modalNewCash" data-toggle="modal" data-target="#modalNewCash"
                        class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
                            class="icon-add"></i></a>

                    <div class="col-md-12">



                        <!-- ADD DATATABLE CADASTRANTES EM VERIFICAÇÃO -->
                        <?php
                                    $path = dirname(__FILE__);
                                    $path .= '/tableCash.php';
                                    include_once($path);
                                    ?>



                    </div>

                </div>

            </div>

            <!--MODALs -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalEditCash.php';
            include_once($path);

            $path = dirname(__FILE__);
            $path .= '/modalNewCash.php';
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

        <!--Swit Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- DataTables -->
        <script src="../../includes/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


        <!--  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


        <!-- Mascaras  -->
        <script src="js/jquery.mask.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/jquery-maskmoney.js"></script>
        
        <script>
        $(document).ready(function() {
            $(".money").maskMoney({
                prefix: "R$ ",
                decimal: ",",
                thousands: "."
            });
        });
        </script>
        
        
        <script>
        function loading_unisen() {
            document.getElementsByClassName('box-load')[0].style.display = 'none';
            //document.getElementsByClassName('container-fluid')[0].style.display = 'block';
        }
        </script>

        <script>
        $(document).ready(function() {

            $('#tbl_financeiro_cash').DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [
                    [0, 'desc']
                ],
                columnDefs: [{
                        width: "25%",
                        responsivePriority: 1,
                        targets: 4
                    },
                    {
                        width: '15%',
                        responsivePriority: 2,
                        targets: 3
                    },
                    {
                        responsivePriority: 3,
                        targets: 6
                    },
                    {
                        responsivePriority: 4,
                        targets: 7
                    }
                ],
                /* dom: 'Bfrtip', */

                dom: '<"top"l>Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            })

        });
        </script>

        <script>
        $(document).ready(function() {
            var table = $('#tbl_financeiro_cash').DataTable();

            //ajusta as colunas
            $('#container-cash').css('display', 'block');
            table.columns.adjust().draw();

            $('#tbl_financeiro_cash tbody').on('click', 'tr td.dlinecashitem', function() {

                var data = table.row(this).data();

                $('#editar_id').val(data[0]);
                $('#editar_mes').val(data[1]);
                $('#editar_tipo').val(data[2]);
                $('#editar_nfcpf').val(data[3]);
                $('#editar_cliente').val(data[4]);

                $('#editar_ccusto').val(data[5]);
                $('#editar_pcontas').val(data[6]);
                $('#editar_banco').val(data[7]);
                $('#editar_vencimento').val(data[8]);
                $('#editar_datapgto').val(data[9]);

                $('#editar_valortit').val(data[10]);
                $('#editar_valorpgto').val(data[11]);
                $('#editar_detalhe').val(data[12]);

                $('#modalEditCash').modal('show');

                //alert(data);
                //openNav();
                //var url = "editar_pedido.php?numero=" + data[1];
                //window.location.replace(url);
            });

            /* new $.fn.dataTable.Buttons(table, {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            table.buttons().container()
                .appendTo($('.col-sm-6:eq(0)', table.table().container())); */

            $(".even, .odd").on("click", function() {
                var id = $(this).data("data-id");
                // alert(id); 
            });
        });
        </script>



        <script>
        function atualiza_item_cash() {

            $.ajax({
                method: "POST",
                url: "salva_item_cash.php",
                data: $("#editar_financeiro").serialize(),
                dataType: "text",
                success: function(strMessage) {
                    $("#message").text(strMessage);
                    if ($.trim(strMessage) == 'sucesso') {
                        Swal.fire({
                            title: '',
                            text: "Dados atualizados",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                //location.reload();
                                //alert('ok');
                                //location.href = "confirmacao-cadastro.php";
                                //$('.btn-proximo2').css("display", "initial");
                                //$("#btn-proximo2").removeAttr("disabled");
                                //$("#btn-proximo2").removeClass("btn-proximo2");
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
        }
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