<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<?php


if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
include_once($path);

?>
<?php

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/includes/UI/header.php';
include_once($path);
//Include libs private functions
require_once './libs/farquivos.php';
require_once './libs/functions.php';

//CLASSE CLIENTE - PDO CRUD MYSQL
require_once '../../DAO/config/database.php'; //'./config/database.php';
require_once '../../DAO/controllers/CadastranteDAO.php';

?>

<link rel="stylesheet" href="css/unisen_styles.css">

<link rel="stylesheet" href="css/steeper-panel.css">

<body class="light">
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
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

                <header class="my-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <h1 class="s-24">
                                    <i class="icon-group_add"></i>
                                    Cadastrantes <span class="s-14">&ndash; Em Verificação</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-fluid my-3">

                    <div class="table-responsive">


                        <?php

                        $params = ""; // . $id_usuario;

                        $CadastranteDAO = new CadastranteDAO();

                        $Cadastrantes = $CadastranteDAO->selectNewCadastrante($params);

                        //print_r($cadastrantes)
                        ?>

                        <div class="table-responsive" id="container-cadastrantes">
                            <form>
                                <table class="table hover compact nowrap table-hover r-0" id="tbl_cadastrantes">
                                    <thead>
                                        <tr class="no-b">
                                            <th style="width: 30px">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                                                </div>
                                            </th>

                                            <th>Nome Completo</th>
                                            <th>CRM</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>CPF</th>
                                            <th>Status</th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($Cadastrantes as $row) : ?>

                                            <tr role="row" class="even dcadastrante" data-id="<?php echo $row->id; ?>">
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input checkSingle" id="user_id_1" value="<?php $row->id; ?>" required><label class="custom-control-label" for="user_id_1"></label>
                                                    </div>
                                                </td>
                                                <?php $avatar_letter = strtolower(substr(tirarAcentos($row->nome_completo), 0, 1)); ?>
                                                <td class="dcadastranteitem">
                                                    <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                        <span class="avatar-letter <?php echo "avatar-letter-$avatar_letter"; ?>  avatar-md circle"></span>
                                                    </div>
                                                    <div>
                                                        <div class="item_nomesocio">
                                                            <strong><?php echo $row->nome_completo; ?></strong>
                                                        </div>
                                                        <small><?php echo $row->email; ?></small>
                                                    </div>
                                                </td>

                                                <td class="dcadastranteitem"><?php echo $row->crm; ?></td>
                                                <td class="dcadastranteitem"><?php echo $row->telefone; ?></td>

                                                <td class="dcadastranteitem"><?php echo $row->email; ?></td>

                                                <td class="dcadastranteitem"><span class="r-3 badge badge-success "><?php echo $row->cpf; ?></span></td>

                                                <?php if ($row->status == "ATIVO") { ?>

                                                    <td class="dcadastranteitem"><span class="icon icon-circle s-12  mr-2 text-success"></span> Ativo</td>
                                                <?php } else { ?>
                                                    <td class="dcadastranteitem"><span class="icon icon-circle s-12  mr-2 text-warning"></span> Inativo</td>
                                                <?php } ?>
                                                <td>
                                                    <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                    <a href="#modalEditarCadastrante" data-toggle="modal" class="dados_cadastrante" data-id="<?php echo $row->id; ?>">
                                                        <i class="icon-pencil"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>

                </div>

             <!--Add New Message Fab Button-->
             <a href="#modalNovoCadastrante" data-toggle="modal" data-target="#modalNovoCadastrante" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
            </div>


            <!--MODAL NOVO CADASTRANTE -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalNovoCadastrante.php';
            include_once($path); 
            ?>

            <!-- MODAL EDITAR CADASTRANTE -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalEditarCadastrante.php';
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
        <script src="js/tble_click_cadastrantes.js"></script>
        <script src="js/ajax-script-cadastrante.js"></script>

        <!--Swit Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


        <!-- INICIA O DATATABLE cadastrante -->
        <script>
            $(document).ready(function() {
                var table = $('#tbl_cadastrantes').DataTable();

                //ajusta as colunas
                $('#container-cadastrantes').css('display', 'block');
                table.columns.adjust().draw();

                $('#tbl_cadastrantes tbody').on('click', 'tr td.dcadastranteitem', function() {

                    var data = table.row(this).data();

                    //var url = "editar_pedido.php?numero=" + data[1];
                    //window.location.replace(url);
                });

                $(".even, .odd").on("click", function() {
                    var id = $(this).data("data-id");
                    // alert(id); 
                });
            });
        </script>
        <!--  <script src="js/steeper-panel.js" async defer></script> -->

        <script>
            function executaToast() {
                $("#semEmail").toast('show');
            }

            function executaToast2() {
                $("#testetoast").toast('show');
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