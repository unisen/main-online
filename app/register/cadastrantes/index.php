<?php session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: ../../login.php');
    exit;
}

?>
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

<link rel="stylesheet" href="styles.css">



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<body class="light" onload="rollToFolder()">
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
                            <div class="col-sm-6">
                                <h1 class="s-24">
                                    <i class="icon-pages"></i>
                                    PASTAS <span class="s-14"> Documentos dos Cadastrantes</span>
                                </h1>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" name="create_folder" id="create_folder" class="btn btn-success">Criar Pasta</button>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-fluid my-3">
                    <div class="table-responsive" id="folder_table">

                    </div>
                </div>
            </div>

        </div>

        <div id="folderModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="float:left;"><i class="icon-folders"> </i><span id="change_title">Create Folder</span></h4>
                        &nbsp;&nbsp;
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-window-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <p>Enter Folder Name
                            <input type="text" name="folder_name" id="folder_name" class="form-control" />
                        </p>
                        <br />
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="old_name" id="old_name" />
                        <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create" />

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="uploadModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="icon-folders"> </i><span></span>Enviar Arquivo</h4>
                        &nbsp;&nbsp;
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-window-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="upload_form" enctype='multipart/form-data'>
                            <p>Selecione Arquivo
                                <input type="file" name="upload_file" />
                            </p>
                            <br />
                            <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                            <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="filelistModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="icon-folders"> </i><span></span>Lista de Arquivos</h4>
                        &nbsp;&nbsp;
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-window-close"></i></button>
                    </div>
                    <div class="modal-body" id="file_list">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['pasta'])) {

            $pasta_select = $_GET['pasta'];
        } else {
            $pasta_select = '';
        }

        ?>


        <script>
            $(document).ready(function() {

                load_folder_list_table('<?php echo $pasta_select; ?>');


                function load_folder_list_table(pasta) {
                    var action = "fetch";
                    $.ajax({
                        url: "action.php?crm=" + pasta,
                        method: "POST",
                        data: {
                            action: action
                        },
                        success: function(data) {
                            $('#folder_table').html(data);
                        }
                    });
                }


                function load_folder_list() {
                    var action = "fetch";
                    $.ajax({
                        url: "action.php",
                        method: "POST",
                        data: {
                            action: action
                        },
                        success: function(data) {
                            $('#folder_table').html(data);
                        }
                    });
                }

                $(document).on('click', '#create_folder', function() {
                    $('#action').val("create");
                    $('#folder_name').val('');
                    $('#folder_button').val('Criar');
                    $('#folderModal').modal('show');
                    $('#old_name').val('');
                    $('#change_title').text("Criar Pasta");
                });

                $(document).on('click', '#folder_button', function() {
                    var folder_name = $('#folder_name').val();
                    var old_name = $('#old_name').val();
                    var action = $('#action').val();
                    if (folder_name != '') {
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: {
                                folder_name: folder_name,
                                old_name: old_name,
                                action: action
                            },
                            success: function(data) {
                                $('#folderModal').modal('hide');
                                load_folder_list();
                                alert(data);
                            }
                        });
                    } else {
                        alert("Enter Folder Name");
                    }
                });

                $(document).on("click", ".update", function() {
                    var folder_name = $(this).data("name");
                    $('#old_name').val(folder_name);
                    $('#folder_name').val(folder_name);
                    $('#action').val("change");
                    $('#folderModal').modal("show");
                    $('#folder_button').val('Update');
                    $('#change_title').text("Renomear Pasta");
                });

                $(document).on("click", ".delete", function() {
                    var folder_name = $(this).data("name");
                    var action = "delete";
                    if (confirm("Tem certeza de que deseja removê-lo?")) {
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: {
                                folder_name: folder_name,
                                action: action
                            },
                            success: function(data) {
                                load_folder_list();
                                alert(data);
                            }
                        });
                    }
                });

                $(document).on('click', '.upload', function() {
                    var folder_name = $(this).data("name");
                    $('#hidden_folder_name').val(folder_name);
                    $('#uploadModal').modal('show');
                });

                $('#upload_form').on('submit', function() {
                    $.ajax({
                        url: "upload.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            load_folder_list();
                            alert(data);
                        }
                    });
                });

                $(document).on('click', '.view_files', function() {
                    var folder_name = $(this).data("name");
                    var action = "fetch_files";
                    $.ajax({
                        url: "action.php",
                        method: "POST",
                        data: {
                            action: action,
                            folder_name: folder_name
                        },
                        success: function(data) {
                            $('#file_list').html(data);
                            $('#filelistModal').modal('show');
                        }
                    });
                });

                $(document).on('click', '.remove_file', function() {
                    var path = $(this).attr("id");
                    var action = "remove_file";
                    if (confirm("Tem certeza de que deseja remover este arquivo?")) {
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: {
                                path: path,
                                action: action
                            },
                            success: function(data) {
                                alert(data);
                                $('#filelistModal').modal('hide');
                                load_folder_list();
                            }
                        });
                    }
                });

                $(document).on('blur', '.change_file_name', function() {
                    var folder_name = $(this).data("folder_name");
                    var old_file_name = $(this).data("file_name");
                    var new_file_name = $(this).text();
                    if (old_file_name != new_file_name) {
                        var action = "change_file_name";
                        $.ajax({
                            url: "action.php",
                            method: "POST",
                            data: {
                                folder_name: folder_name,
                                old_file_name: old_file_name,
                                new_file_name: new_file_name,
                                action: action
                            },
                            success: function(data) {
                                alert(data);
                            }
                        });
                    }
                });


            });
        </script>
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

    <script>
        function rollToFolder() {

            $(this).scrollTop(1000);
            //$(this).scrollTop($("#pasta-select").offset());
        }
    </script>

    <script>
        var element = document.querySelector('#pasta-select');

        element.scrollTop = element.scrollHeight;
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