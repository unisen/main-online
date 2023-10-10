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
                        <div class="row p-t-b-10">
                            <div class="col">
                                <h4>
                                    <i class="icon-calendar"></i>
                                    Calendar
                                </h4>
                            </div>
                        </div>
                        <div class="row ">
                            <ul class="nav">
                                <li>
                                    <a class="nav-link" href="#"><i class="icon icon-list"></i>All Events</a>
                                </li>
                                <li>
                                    <a class="nav-link active" href="#"><i class="icon icon-clipboard-add"></i>Add New Event</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#"><i class="icon icon-trash-can"></i>Trash</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>

                <div class="animatedParent animateOnce">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <div class="card r-0 b-0 shadow sticky">
                                    <div class="card-header white ">
                                        <h6>Draggable Events</h6>
                                    </div>

                                    <div class="card-body b-t pt-2 pb-2 no-b">
                                        <div class="checkbox">
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                Remove chip once added in calander
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer white">
                                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                            <ul class="fc-color-picker list-inline-item" id="color-chooser">
                                                <li class="list-inline-item"><a class="text-aqua" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-blue" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-light-blue" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-teal" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-yellow" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-orange" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-green" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-lime" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-red" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-purple" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-fuchsia" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-muted" href="#"><i class="icon-circle s-24"></i></a></li>
                                                <li class="list-inline-item"><a class="text-navy" href="#"><i class="icon-circle s-24"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="input-group">
                                            <input id="new-event" type="text" class="form-control r-30" placeholder="Event Title">
                                            <div class="input-group-btn">
                                                <a id="add-new-event" class="btn-fab shadow btn-danger ml-2"><i class="icon-add"></i></a>
                                            </div>
                                            <!-- /btn-group -->
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div id="external-events" class="p-3">
                                    <div class="external-event purple lighten-1 p-2 my-2 r-3 text-white">Lunch</div>
                                    <div class="external-event indigo lighten-1 p-2 my-2 r-3 text-white">Go home</div>
                                    <div class="external-event light-green lighten-1 p-2 my-2 r-3 text-white">Do homework</div>
                                    <div class="external-event amber lighten-1 p-2 my-2 r-3 text-white">Work on UI design</div>
                                    <div class="external-event bg-red p-2 my-2 r-3 text-white">Sleep tight</div>
                                </div>

                                <!-- /. box -->

                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card no-r no-b shadow">
                                    <div class="card-body p-0">
                                        <div id='calendar'></div>
                                    </div>
                                </div>
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