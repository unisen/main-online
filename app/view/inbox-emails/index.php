<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login/");
    exit;
} 

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

?>

<link rel="stylesheet" href="css/unisen_styles.css">

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
            <div class="has-sidebar-left">
                <header class="blue accent-3 relative nav-sticky">
                    <div class="container-fluid text-white">
                        <div class="row">
                            <div class="col">
                                <h4>
                                    <i class="icon-package"></i> Inbox
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="icon icon-list"></i>Todas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#modalCreateMessage" data-toggle="modal" data-target="#modalCreateMessage">
                                        <i class="icon icon-clipboard-add"></i> Enviar Email
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#modalCreateMessage" data-toggle="modal" data-target="#modalCreateMessage"><i class="icon icon-trash-can"></i>Lixeira</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="container-fluid animatedParent animateOnce p-0">
                    <div class="animated fadeInUpShort">
                        <div class="row no-gutters">
                            <div class="col-md-3 white sticky">
                                <div class="sticky white">
                                    <ul class="nav nav-tabs nav-material">
                                        <li class="nav-item">
                                            <a class="nav-link p-3 active show" id="w2--tab1" data-toggle="tab" href="#w2-tab1"><i class="icon icon-mail-envelope-closed s-18 text-success"></i>New</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-3" id="w2--tab2" data-toggle="tab" href="#w2-tab2"><i class="icon icon-star yellow-text"></i>Important</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-3" id="w2--tab3" data-toggle="tab" href="#w2-tab3"><i class="icon icon-filter text-danger"></i> Spam</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-9 b-l">
                                <div class="m-md-3">
                                    <!--Message Start-->
                                    <div class="card b-0 m-2">
                                        <div class="card-body">
                                            <div data-toggle="collapse" data-target="#message1">
                                                <div class="media">
                                                    <img class="d-flex mr-3 height-50" src="assets/img/dummy/u8.png" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        mensagens list
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Attachments Start-->
                                        <div class="card-footer white">
                                            mensagens
                                        </div>
                                        <!--Attachments End-->
                                    </div>
                                    <!--Message End-->

                                    <!--Message Start-->
                                    <div class="card b-0  m-2">
                                        <div class="card-body">
                                            <div data-toggle="collapse" data-target="#message2">
                                                <div class="media">
                                                    <img class="d-flex mr-3 height-50" src="assets/img/dummy/u3.png" alt="Generic placeholder image">
                                                    anexos view
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Message End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Add New Message Fab Button-->
                <a href="#modalCreateMessage" data-toggle="modal" data-target="#modalCreateMessage" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
            </div>
            <!--Message Modal-->
            <div class="modal fade" id="modalCreateMessage" tabindex="-1" role="dialog" aria-labelledby="modalCreateMessage">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content b-0">
                        <div class="modal-header r-0 bg-primary">
                            <h6 class="modal-title text-white" id="exampleModalLabel">Enviar Nova Mensagem</h6>
                            <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                        </div>
                        <div class="modal-body no-p no-b">
                            <form action="" id="enviar_mensagem" name="enviar_mensagem" method="POST" class="form-horizontal">
                                <div class="form-group has-icon m-0">
                                    <i class="icon-subject"></i>
                                    <input class="form-control form-control-lg r-0 b-0" type="text" name="nome" id="nome" placeholder="Nome">
                                </div>
                                <div class="form-group has-icon m-0">
                                    <i class="icon-envelope-o"></i>
                                    <input class="form-control form-control-lg r-0 b-0" type="text" name="email" id="email" placeholder="Email de destino">
                                </div>
                                <div class="b-b"></div>
                                <div class="form-group has-icon m-0">
                                    <i class="icon-subject"></i>
                                    <input class="form-control form-control-lg r-0 b-0" type="text" name="subject" id="subject" placeholder="Subject">
                                </div>
                                <textarea name="mensagem" id="mensagem" class="form-control r-0 b-0 p-t-40 editor" placeholder="Escreva a mensagem..." rows="17"></textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary l-s-1 s-12 text-uppercase" onclick="sendEmail();">
                                Enviar Email
                            </button>
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

        <!--Swit Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        
        
        <script>
          function sendEmail () {
            $.ajax({
                        method: "POST",
                        url: "../../view/inbox-emails/script.php",
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

        <!--  <script src="../../view/inbox-emails/js/ajax-email-send.js" async defer></script> -->
</body>

</html>