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
include_once($path); */

?>
<?php

$path =  $_SERVER['DOCUMENT_ROOT'];
$path .= $unisen_url . 'app/includes/UI/header.php';
include_once($path);

//CLASSE LOGSDAO - PDO CRUD MYSQL - PATH SISTEMA
require_once '../../DAO/config/database.php';
require_once '../../DAO/controllers/LogsDAO.php';

////Include libs private functions - PATH SISTEMA
require_once '../../libs/functions.php';

?>
<!-- 
<link href="includes/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
 -->
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


            <div class="page has-sidebar-left height-full">
                <header class="blue accent-3 relative">
                    <div class="container-fluid text-white">
                        <div class="row p-t-b-10 ">
                            <div class="col">
                                <h4>
                                    <i class="icon-user-md"></i>
                                    Configurações do Sistema
                                </h4>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab"
                                role="tablist">
                                <li>
                                    <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill"
                                        href="#v-pills-all" role="tab" aria-controls="v-pills-all"><i
                                            class="icon icon-home2"></i> Registros de Log</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-buyers-tab" data-toggle="pill"
                                        href="#v-pills-buyers" role="tab" aria-controls="v-pills-buyers"><i
                                            class="icon icon-face"></i> Configurações Gerais</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-sellers-tab" data-toggle="pill"
                                        href="#v-pills-sellers" role="tab" aria-controls="v-pills-sellers"><i
                                            class="icon  icon-local_shipping"></i> Paths do Sistema</a>
                                </li>
                                <li class="float-right">
                                    <a href="#modalNovoAssociado" data-toggle="modal" data-target="#modalNovoAssociado"
                                        class="nav-link"><i class="icon icon-plus-circle"></i> Instalação</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="container-fluid animatedParent animateOnce">
                    <div class="tab-content my-3" id="v-pills-tabContent">
                        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel"
                            aria-labelledby="v-pills-all-tab">



                            <?php

                            $params = "ORDER BY id_log DESC"; // . $id_usuario;

                            $LogsDAO = new LogsDAO();

                            $Logs = $LogsDAO->selectLog($params);

                            //print_r($Associados)
                            ?>

                            <!-- DATATABLE REGISTRO DE LOGS -->
                            <?php
                            $path = dirname(__FILE__);
                            $path .= '/registros_log.php';
                            include_once($path);
                            ?>





                        </div>
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-buyers" role="tabpanel"
                            aria-labelledby="v-pills-buyers-tab">
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <div class="card r-0 shadow">
                                        <div class="table-responsive">

                                            <p>Configurações Gerais</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-sellers" role="tabpanel"
                            aria-labelledby="v-pills-sellers-tab">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-a avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card no-b p-3">
                                        <div>
                                            <div class="image mr-3 avatar-lg float-left">
                                                <span class="avatar-letter avatar-letter-c avatar-lg  circle"></span>
                                            </div>
                                            <div class="mt-1">
                                                <div>
                                                    <strong>Clexander Pierce</strong>
                                                </div>
                                                <small>clexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Add New Message Fab Button-->
                <a href="panel-page-users-create.html"
                    class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary btn-flutuante"><i
                        class="icon-add"></i></a>
            </div>



            <!--MODAL NOVO ASSOCIADO -->
            <?php
            /* $path = dirname(__FILE__);
            $path .= '/modalNovoAssociado.php';
            include_once($path); */
            ?>

            <!-- MODAL EDITAR LOGS -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalEditarLog.php';
            include_once($path);
            ?>

            <!-- MODAL DELETE SELECIONADOS -->
            <?php
            $path = dirname(__FILE__);
            $path .= '/modalDeleteLogs.php';
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

        <!-- Data table JavaScript -->
        <!--  <script src="includes/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="includes/editable-table/mindmup-editabletable.js"></script>
        <script src="includes/editable-table/numeric-input-example.js"></script>
        <script src="js/editable-table-logs.js"></script> -->


        <!--         <script src="js/jquery-maskmoney.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/validarcpfcliente.js"></script>

        <script src="js/tble_click_associados.js"></script>
        <script src="js/ajax-script-associado.js"></script> -->



        <!--  Script Edit Logs  -->
        <script src="js/edit-click-logs.js"></script>

        <script src="js/delete-checked-logs.js"></script>

        <!--Swit Alert -->
        <script src="../../includes/plugins/sweetalert2@9.js"></script>


        <!--         <script>
            $(document).ready(function() {
                $('#tbl_clientes').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "order": [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                            width: "5%",
                            responsivePriority: 1,
                            targets: [0, 3]
                        },
                        {
                            width: '20%',
                            responsivePriority: 2,
                            targets: 3
                        },
                        {
                            responsivePriority: 3,
                            targets: 7
                        },
                        {
                            responsivePriority: 4,
                            targets: 4
                        }

                    ]
                })

            });
        </script> -->

        <!--         <script>
            $(document).ready(function() {

             var table = $('#tbl_logs').DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [
                [1, 'desc']
            ],
            columnDefs: [{
                    width: "5%",
                    responsivePriority: 1,
                    targets: [2, 3]
                },
                {
                    width: '20%',
                    responsivePriority: 2,
                    targets: 1
                }
            ]
        });
    });
     //ajusta as colunas
     $('#container-logs').css('display', 'block');
                table.columns.adjust().draw();
        </script> -->
        <!-- <script>
            $('#tbl_logs').editableTableWidget().numericInputExample().find('td:first').focus();
        </script> -->



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