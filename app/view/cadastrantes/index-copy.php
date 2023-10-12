<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<?php

//Include libs private functions
require_once 'libs/farquivos.php';

if (isset($_GET['cad'])) {
    $id_delete_pasta = $_GET['id'];
    $pasta_cadastrante_del = $_GET['cad'];
    $pasta_cadastrante_del = $_SESSION['path_documentos_registro'] . $pasta_cadastrante_del . "/";
    removeFiles($pasta_cadastrante_del);
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $linkTemp = explode('/?', $actual_link);
    $newLink = $linkTemp[0];
    header("Location: $newLink");
}

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}

$_SESSION['path_documentos_registro'] = "../../register/cadastrantes/";


if (isset($_GET['zip'])) {
    //$id_delete_pasta = $_GET['id'];
    $pasta_cadastrante_zip = $_GET['zip'];
    $arquivo_zip = $_SESSION['path_documentos_registro'] . "arquivados/" . $pasta_cadastrante_zip . ".zip";
    
    $destinationDir = $_SESSION['path_documentos_registro'] . "$pasta_cadastrante_zip/";

    $arquivo_zip = '../../register/cadastrantes/arquivados/888999GO.zip';
    
    extractZip($arquivo_zip, $destinationDir);
    
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $linkTemp = explode('/?', $actual_link);
    $newLink = $linkTemp[0];
    header("Location: $newLink");
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

<link rel="stylesheet" href="css/steeper-panel.css">
<link rel="stylesheet" href="css/style-cadastrantes.css">

<!-- DataTables -->
<!-- <link rel="stylesheet" href="../../includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->

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
                                    <i class="icon-group_add"></i>
                                    Cadastrantes <span class="s-14">&ndash; Em Verificação</span>
                                </h4>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                                <li>
                                    <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Todos</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-buyers-tab" data-toggle="pill" href="#v-pills-buyers" role="tab" aria-controls="v-pills-buyers"><i class="icon icon-face"></i>Arquivados</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-sellers-tab" data-toggle="pill" href="#v-pills-sellers" role="tab" aria-controls="v-pills-sellers"><i class="icon  icon-local_shipping"></i> Upload de Arquivos</a>
                                </li>
                                <!-- <li class="float-right">
                                    <a href="#modalNovoAssociado" data-toggle="modal" data-target="#modalNovoAssociado" class="nav-link"><i class="icon icon-plus-circle"></i> Novo Associado</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="container-fluid animatedParent animateOnce">
                    <div class="tab-content my-3" id="v-pills-tabContent">
                        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="card r-0 shadow">
                                        <div class="table-responsive">

                                            <!-- ADD DATATABLE CADASTRANTES EM VERIFICAÇÃO -->
                                            <?php
                                            $path = dirname(__FILE__);
                                            $path .= '/tableCadastrantes.php';
                                            include_once($path);
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-buyers" role="tabpanel" aria-labelledby="v-pills-buyers-tab">
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="card r-0 shadow">
                                        <div class="table-responsive container-cadastrantes-arquivados">

                                             <!-- ADD DATATABLE CADASTRANTES EM VERIFICAÇÃO -->
                                             <?php
                                            $path = dirname(__FILE__);
                                            $path .= '/tableArquivados.php';
                                            include_once($path);
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-sellers" role="tabpanel" aria-labelledby="v-pills-sellers-tab">
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="card r-0 shadow">

                                        <!-- TELA DE UPLOAD DE ARQUIVOS -->
                                        <?php
                                        $path = dirname(__FILE__);
                                        $path .= '/uploadDocumentos.php';
                                        include_once($path);
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Add New Cadastrante Fab Button-->
                <a href="#modalNovoCadastrante" data-toggle="modal" data-target="#modalNovoCadastrante" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>

                <!-- Floating Buttons-->
                <div class="doc-cad-float" id="doc-cad-float">
                    <button type="button" class="btn btn-primary">
                        <a href="#modalViewCadastrante" id="viewCadastrante-float" data-target="#modalViewCadastrante" data-toggle="modal" class="visualizar_cadastrante" data-id=""><i class="icon-eye text-white"></i></a>
                    </button>
                    <button type="button" class="btn btn-info">
                        <a href="#modalPainelDocumentos" id="docsCadastrante-float" data-target="#modalPainelDocumentos" data-toggle="modal" class="documentos_cadastrante" data-id=""><i class="icon-paperclip text-black"></i></a>
                    </button>
                    <button type="button" class="btn btn-warning">
                        <a href="#modalPainelDocumentos" id="VerifCadastrante-float" data-target="#modalPainelDocumentos" data-toggle="modal" class="verificar_documentos_cadastrante" data-id=""><i class="icon-note-checked text-white"></i></a>
                    </button>
                    <button type="button" class="btn btn-success">
                        <a href="#modalEditarCadastrante" id="editCadastrante-float" data-toggle="modal" class="dados_cadastrante" data-id=""><i class="icon-pencil text-black"></i></a>
                    </button>
                    <button type="button" class="btn btn-danger">
                        <a href="#" id="btnExcluir-float" data-id="">
                            <input type="hidden" name="nomeCadastrante_id" id="nomeCadastrante_id" value="">
                            <i class="icon-trash text-white"></i>
                        </a>
                    </button>
                </div>
            </div>

            <!--MODAL VIEW CADASTRANTE -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalViewCadastrante.php';
            include_once($path);
            ?>

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

            <!-- MODAL PAINEL DOCUMENTOS -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalPainelDocumentos.php';
            include_once($path);
            ?>

            <!-- MODAL Deletar Cadastrante -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalDeleteCadastrante.php';
            include_once($path);
            ?>
        
            <!-- MODAL Deletar Cadastrante Arquivados -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalDeleteCadastranteArquivado.php';
            include_once($path);
            ?>

            <!-- MODAL Desarquivar Cadastrante -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalDesarquivarCadastrante.php';
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

        <!-- <script src="../../includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
        <!--/#app -->
        <script src="../../includes/template/assets/js/app.js"></script>

        <script src="js/steeper-panel.js"></script>
        <script src="js/functions.js"></script>

        <script src="js/jquery.mask.js"></script>
        <script src="js/jquery.mask.min.js"></script>

        <script src="js/validarcpfcliente.js"></script>
        <script src="js/tble_click_cadastrantes.js"></script>
        <script src="js/ajax-script-cadastrante.js"></script>

        <script src="js/upload-arquivos.js"></script>

        <!--Swit Alert -->
        <script src="../../includes/plugins/sweetalert2@9.js"></script>


        <!-- INICIA O DATATABLE cadastrante -->


        <script>
            $(document).ready(function() {

                var table = $('#tbl_cadastrantes').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "order": [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                            width: 0,
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            width: "25%",
                            responsivePriority: 2,
                            targets: [1, 2, 3]
                        }                       
                    ]
                });

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

<script>
            $(document).ready(function() {

                var table = $('#tbl_cadastrantes_arquivados').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "order": [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                            width: 0,
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            width: "60%",
                            responsivePriority: 2,
                            targets: [1, 3]
                        },
                        {
                            width: '12%',
                            responsivePriority: 3,
                            targets: 2
                        },
                        {
                            width: '13%',
                            responsivePriority: 4,
                            targets: 4
                        }
                    ]
                });

                //ajusta as colunas
                $('#container-cadastrantes-arquivados').css('display', 'block');
                table.columns.adjust().draw();              

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