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

?>

<link rel="stylesheet" href="css/unisen_styles.css">

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
                <header class="blue accent-3 relative">
                    <div class="container-fluid text-white">
                        <div class="row p-t-b-10 ">
                            <div class="col">
                                <h4>
                                    <i class="icon-database"></i>
                                    Users
                                </h4>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                                <li>
                                    <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Users</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-buyers-tab" data-toggle="pill" href="#v-pills-buyers" role="tab" aria-controls="v-pills-buyers"><i class="icon icon-face"></i> Buyers</a>
                                </li>
                                <li>
                                    <a class="nav-link" id="v-pills-sellers-tab" data-toggle="pill" href="#v-pills-sellers" role="tab" aria-controls="v-pills-sellers"><i class="icon  icon-local_shipping"></i> Sellers</a>
                                </li>
                                <li class="float-right">
                                    <a href="#modalNovoAssociado" data-toggle="modal" data-target="#modalNovoAssociado" class="nav-link"><i class="icon icon-plus-circle"></i> Novo Associado</a>
                                </li>
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
                                            <form>
                                                <table class="table table-striped table-hover r-0">
                                                    <thead>
                                                        <tr class="no-b">
                                                            <th style="width: 30px">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label class="custom-control-label" for="checkedAll"></label>
                                                                </div>
                                                            </th>
                                                            <th>USER NAME</th>
                                                            <th>ITEMS</th>
                                                            <th>INCOME</th>
                                                            <th>PHONE</th>
                                                            <th>STATUS</th>
                                                            <th>ROLE</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_1" required><label class="custom-control-label" for="user_id_1"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <span class="avatar-letter avatar-letter-a  avatar-md circle"></span>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Alexander Pierce</strong>
                                                                    </div>
                                                                    <small> alexander@paper.com</small>
                                                                </div>
                                                            </td>

                                                            <td>2</td>
                                                            <td>256</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-warning"></span> Inactive</td>
                                                            <td><span class="r-3 badge badge-success ">Administrator</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_2" required><label class="custom-control-label" for="user_id_2"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <span class="avatar-letter avatar-letter-b  avatar-md circle"></span>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Blexander Pierce</strong>
                                                                    </div>
                                                                    <small> blexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>9,500</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-warning"></span> Inactive </td>
                                                            <td><span class="r-3 badge badge-warning">Subscriber</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_3" required><label class="custom-control-label" for="user_id_3"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <span class="avatar-letter avatar-letter-m  avatar-md circle"></span>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Mlexander Pierce</strong>
                                                                    </div>
                                                                    <small>mlexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-success"></span> Active</td>

                                                            <td><span class="r-3 badge badge-warning">Seller</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_4" required><label class="custom-control-label" for="user_id_4"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <span class="avatar-letter avatar-letter-y  avatar-md circle"></span>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Ylexander Pierce</strong>
                                                                    </div>
                                                                    <small>Ylexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-danger"></span> Suspended</td>

                                                            <td><span class="r-3 badge badge-success">Buyer</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_5" required><label class="custom-control-label" for="user_id_5"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <img src="assets/img/dummy/u5.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Alexander Pierce</strong>
                                                                    </div>
                                                                    <small> alexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-success"></span> Active</td>

                                                            <td><span class="r-3 badge badge-warning">Seller</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_6" required><label class="custom-control-label" for="user_id_6"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <span class="avatar-letter avatar-letter-p  avatar-md circle"></span>
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Plexander Pierce</strong>
                                                                    </div>
                                                                    <small>plexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-success"></span> Active</td>

                                                            <td><span class="r-3 badge badge-success">Buyer</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_7" required><label class="custom-control-label" for="user_id_7"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <img src="assets/img/dummy/u7.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Alexander Pierce</strong>
                                                                    </div>
                                                                    <small> alexander@paper.com</small>
                                                                </div>
                                                            </td>

                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-success"></span> Active</td>

                                                            <td><span class="r-3 badge badge-success">Buyer</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_8" required><label class="custom-control-label" for="user_id_8"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <img src="assets/img/dummy/u8.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Alexander Pierce</strong>
                                                                    </div>
                                                                    <small> alexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-danger"></span> Suspended</td>

                                                            <td><span class="r-3 badge badge-success">Buyer</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_9" required><label class="custom-control-label" for="user_id_9"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <img src="assets/img/dummy/u3.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Alexander Pierce</strong>
                                                                    </div>
                                                                    <small> alexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-success"></span> Active</td>

                                                            <td><span class="r-3 badge badge-success">Buyer</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkSingle" id="user_id_10" required><label class="custom-control-label" for="user_id_10"></label>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                                    <img src="assets/img/dummy/u1.png" alt="">
                                                                </div>
                                                                <div>
                                                                    <div>
                                                                        <strong>Alexander Pierce</strong>
                                                                    </div>
                                                                    <small> alexander@paper.com</small>
                                                                </div>
                                                            </td>
                                                            <td>2</td>
                                                            <td>6,000</td>

                                                            <td>+92 333 123 136</td>
                                                            <td><span class="icon icon-circle s-12  mr-2 text-success"></span> Active</td>

                                                            <td><span class="r-3 badge badge-success">Buyer</span></td>
                                                            <td>
                                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                                <a href="panel-page-profile.html"><i class="icon-pencil"></i></a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <nav class="my-3" aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-buyers" role="tabpanel" aria-labelledby="v-pills-buyers-tab">
                            <div class="row">
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u2.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u5.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u6.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u7.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u8.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u9.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u9.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u10.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u11.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-3">
                                    <div class="card no-b">
                                        <div class="card-body text-center p-5">
                                            <div class="avatar avatar-xl mb-3">
                                                <img src="assets/img/dummy/u12.png" alt="User Image">
                                            </div>
                                            <div>
                                                <h6 class="p-t-10">Alexander Pierce</h6>
                                                alexander@paper.com
                                            </div>
                                            <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUpShort" id="v-pills-sellers" role="tabpanel" aria-labelledby="v-pills-sellers-tab">
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
                <a href="panel-page-users-create.html" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
            </div>



            <!--Message Modal-->
            <div class="modal fade" id="modalNovoAssociado" tabindex="-1" role="dialog" aria-labelledby="modalNovoAssociado">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content b-0">
                        <div class="modal-header r-0 bg-primary">
                            <h6 class="modal-title text-white" id="exampleModalLabel">Adicionar Associado</h6>
                            <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                        </div>
                        <div class="modal-body no-p no-b">

                            <form id="novo_associado" name="novo_associado" method="POST" class="form-horizontal needs-validation" autocomplete="true">
                                <div class="card no-b  no-r">
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="form-group m-0">
                                                    <label for="nome" class="col-form-label s-12">Nome Completo</label>
                                                    <input type="text" name="nome" id="nome" class="form-control r-0 light s-12" placeholder="Nome Completo (igual identidade médica)" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" required>
                                                    <div class="invalid-feedback">Insira um nome completo.</div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label class="my-1 mr-2" for="id-estadocivil">Estado Civil</label>
                                                        <select type="text" name="estadocivil" onchange="apagaErro(this)" id="id-estadocivil" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                            <option value="" selected="">Selecione</option>
                                                            <option value="solteiro">Solteiro(a)</option>
                                                            <option value="casado">Casado(a)</option>
                                                            <option value="divorciado">Divorciado(a)</option>
                                                            <option value="viuvo">Viuvo(a)</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label class="my-1 mr-2" for="sexo">Sexo</label>
                                                        <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" type="text" name="sexo" onchange="apagaErro(this)" id="sexo" required>
                                                            <option value="" selected="">Selecione</option>
                                                            <option value="masculino">Masculino</option>
                                                            <option value="feminino">Feminino</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label for="data_nascimento" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Data de Nascimento</label>
                                                        <input type="date" data-time-picker="false" data-format-date='d/m/Y' name="dn" id="data_nascimento" onchange="apagaErro(this)" class="colordate form-control r-0 light s-12 datePicker" required>
                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label for="cpf" class="col-form-label s-12"><i class="icon-fingerprint"></i> CPF</label>
                                                        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" maxlength="14" oninput="cpfRegEx(this)" class="cpf form-control r-0 light s-12" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3 offset-md-1">
                                                <input hidden id="file" name="file" />
                                                <div class="dropzone dropzone-file-area pt-4 pb-4" id="fileUpload">
                                                    <div class="dz-default dz-message">
                                                        <span>Drop A passport size image of user</span>
                                                        <div>You can also click to open file browser</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="rg" class="col-form-label s-12">RG</label>
                                                <input type="text" name="rg" id="rg" placeholder="Digite seu RG" maxlength="20" oninput="ChangeRg(this), apagaErro(this)" onfocus="apagaErro()" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-3 m-0">
                                                <label for="oepx" class="col-form-label s-12">Órgão Expedidor</label>
                                                <input type="text" name="oexp" id="oexp" placeholder="Digite o nome do órgão" oninput="apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="rg_uf" class="my-1 mr-2">UF</label>
                                                <select type="text" name="rg_uf" id="rg_uf" placeholder="UF do RG" onchange="apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" disabled="" selected="">Selecione</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AN</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SE">SE</option>
                                                    <option value="SP">SP</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-3 m-0">
                                                <label for="dexp" class="col-form-label s-12">Data de Expedição</label>
                                                <input type="date" data-time-picker="false" data-format-date='d/m/Y' name="dexp" id="dexp" onchange="apagaErro(this)" class="colordate form-control r-0 light s-12 datePicker" required>
                                            </div>

                                        </div>

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="nome_pai" class="col-form-label s-12">Nome do Pai</label>
                                                <input type="text" name="nome_pai" id="nome_pai" placeholder="Nome Completo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="nome_mae" class="col-form-label s-12">Nome da Mãe</label>
                                                <input type="text" name="nome_mae" id="nome_mae" placeholder="Nome Completo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="cpf form-control r-0 light s-12" required>
                                            </div>
                                        </div>

                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="nacionalidade" class="my-1 mr-2">Nacionalidade</label>
                                                <select type="text" name="nacionalidade" onchange="apagaErro(this)" id="nacionalidade" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" selected="">Selecione</option>
                                                    <option value="brasileira">brasileira</option>
                                                    <option value="outra">outra</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="naturalidade" class="col-form-label s-12">Naturalidade</label>
                                                <input type="text" name="naturalidade" id="naturalidade" placeholder="Cidade em que nasceu" oninput="apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="nat_uf" class="my-1 mr-2">UF</label>
                                                <select type="text" name="nat_uf" id="nat_uf" onchange="apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" disabled="" selected="">Selecione</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AN</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SE">SE</option>
                                                    <option value="SP">SP</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="titulo" class="col-form-label s-12">Titulo de Eleitor</label>
                                                <input type="text" name="titulo" id="titulo" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="pis" class="col-form-label s-12">PIS / PASEP</label>
                                                <input type="text" name="pis" id="pis" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="telefone" class="col-form-label s-12">Celular</label>
                                                <input type="text" name="telefone" id="telefone" onblur="optChangeIdEscala()" maxlength="15" oninput="optChangeIdEscala(), apagaErro(this), celRegEx(this)" class="form-control r-0 light s-12" required>
                                            </div>
                                        </div>


                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="endereco" class="col-form-label s-12">Endereço</label>
                                                <input type="text" name="endereco" id="endereco" onblur="optChangeIdEscala()" oninput="optChangeIdEscala(), apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="endereco_nome" class="my-1 mr-2">Endereço no Nome</label>
                                                <select type="text" name="endereco_nome" onchange="apagaErro(this)" id="endereco_nome" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" selected="">Selecione</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="NÃO">NÃO</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 m-0">
                                                <label for="email" class="col-form-label s-12">Email <span id="resposta-email" class="badge badge-success r-3"></span></label>
                                                <input type="email" name="email" id="email" onblur="verificaEmail()" placeholder="E-mail" class="form-control r-0 light s-12" value="" required>

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
                                            </div>
                                        </div>


                                        <div class="form-row row clearfix">
                                            <div class="form-group col-sm-6 m-0">
                                                <label for="crm" class="col-form-label s-12">CRM <span id="resposta-crm"> </span></label>
                                                <input type="text" name="crm" id="crm" placeholder="CRM" oninput="optChangeIdEscala(this)" onblur="verificaCRM()" onfocus="apagaErro()" class="form-control r-0 light s-12" required>



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

                                            </div>

                                            <div class="form-group col-sm-2 m-0">
                                                <label for="crm_uf" class="my-1 mr-2">UF CRM</label>
                                                <select type="text" name="crm_uf" id="crm_uf" placeholder="UF do CRM" onchange="optChangeIdEscala() , apagaErro(this)" onfocus="apagaErro()" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" disabled="" selected="">Selecione</option>
                                                    <option value="AC">AC</option>
                                                    <option value="AL">AL</option>
                                                    <option value="AP">AP</option>
                                                    <option value="AM">AN</option>
                                                    <option value="BA">BA</option>
                                                    <option value="CE">CE</option>
                                                    <option value="DF">DF</option>
                                                    <option value="ES">ES</option>
                                                    <option value="GO">GO</option>
                                                    <option value="MA">MA</option>
                                                    <option value="MT">MT</option>
                                                    <option value="MS">MS</option>
                                                    <option value="MG">MG</option>
                                                    <option value="PR">PR</option>
                                                    <option value="PB">PB</option>
                                                    <option value="PA">PA</option>
                                                    <option value="PE">PE</option>
                                                    <option value="PI">PI</option>
                                                    <option value="RJ">RJ</option>
                                                    <option value="RN">RN</option>
                                                    <option value="RS">RS</option>
                                                    <option value="RO">RO</option>
                                                    <option value="RR">RR</option>
                                                    <option value="SC">SC</option>
                                                    <option value="SE">SE</option>
                                                    <option value="SP">SP</option>
                                                    <option value="TO">TO</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4 m-0">
                                                <label for="id-escala" class="my-1 mr-2">ID Escala</label>
                                                <select type="text" name="id-escala" onchange="apagaErro(this)" id="id-escala" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
                                                    <option value="" disabled="" selected="">Escolha uma opção</option>
                                                    <option value="escala1">Escala 1</option>
                                                    <option value="escala2">Escala 2</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row row clearfix">

                                            <div class="form-group col-sm-6 m-0">
                                                <label for="senha" class="col-form-label s-12">Senha</label>
                                                <input type="password" name="senha" id="senha" placeholder="Senha de 6 digitos" maxlength="6" onfocus="apagaErro()" oninput="apagaErro(this)" class="form-control r-0 light s-12" required>
                                            </div>

                                            <div class="form-group col-sm-6 m-0">
                                                <label for="login" class="col-form-label s-12">Confirma Senha</label>
                                                <input type="password" name="senha-confirma" id="senha-confirma" placeholder="Repita a senha" maxlength="6" oninput="apagaErro(this)" onfocus="apagaErro()" class="form-control r-0 light s-12" required>
                                            </div>

                                        </div>

                                        <hr>
                                        <div class="form-row row clearfix">
                                            <button class="btn btn-primary l-s-1 s-12 text-uppercase" type="submit" id="adicionar_associado" name="adicionar_associado">
                                                Cadastrar
                                            </button>

                                            <button class="btn btn-success l-s-1 s-12 text-uppercase" id="auto_preencher" name="auto_preencher" onclick="autoPreencherDados()" style="margin-left:10px;">
                                                AutoPreencher
                                            </button>



                                            <span class="badge badge-success" id="alerta-ok" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                            <span class="badge badge-danger" id="alerta-erro" style="padding: 10px !important;margin-left:10px; display:none; font-weight:bold;"></span>

                                            <!-- <button class="btn btn-success l-s-1 s-12 text-white" id="alerta-ok" style="margin-left:10px; display:none;">
                                                <span id="msg-alerta-ok"></span> Verificado!
                                            </button> -->


                                            <!-- Toasts de Verificação -->
                                            <!--  <div class="toast align-items-center text-white bg-success l-s-1 s-12 toast-action border-0" style="margin-left:20px;" role="alert" aria-live="assertive" aria-atomic="true" id="toast-crm" data-delay="4000">
                                                <div class="d-flex">
                                                    <div class="toast-body">
                                                        OK
                                                    </div>
                                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">x</button>
                                                </div>
                                            </div> -->

                                            <!--  <p id="alerta-ok" style="display:none;">
                                                <strong><span id="msg-alerta-ok"></span></strong> Verificado!
                                            </p> -->
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="form-row row clearfix">
                                <!-- <button class="btn btn-primary l-s-1 s-12 text-uppercase" onclick="" type="submit" id="next2" name="submit">
                                    Cadastrar
                                </button> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

       

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



        <!--Swit Alert -->
        <script src="../../includes/plugins/sweetalert2@9.js"></script>


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