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
                <header class="blue accent-3 relative nav-sticky">
                    <div class="container-fluid text-white">
                        <div class="row">
                            <div class="col">
                                <h4>
                                    <i class="icon-pages"></i>
                                    Blank <span class="s-14">Get Started</span>
                                </h4>
                            </div>
                        </div>
                        
                    </div>
                </header>


                <div class="container-fluid relative animatedParent animateOnce p-lg-5">
                    <div class="card no-b shadow no-r">
                        <div class="row no-gutters">
                            <div class="col-md-4 b-r">
                                <div class="text-center p-5 mt-5">
                                    <figure class="avatar avatar-xl">
                                        <img src="../../includes/template/assets/img/dummy/u3.png" alt="">
                                    </figure>
                                    <div>
                                        <h4 class="p-t-10">Alexander Pierce</h4>
                                        alexander@paper.com
                                    </div>
                                    <a href="#" class="btn btn-success  mt-3">Send Email</a>
                                    <div class="mt-5">
                                        <ul class="social social list-inline">
                                            <li class="list-inline-item"><a href="#" class="grey-text"><i class="icon-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#" class="grey-text"><i class="icon-youtube"></i></a></li>
                                            <li class="list-inline-item"><a href="#" class="grey-text"><i class="icon-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="p5 b-b">
                                    <div class="pl-4 mt-4">
                                        <h5>Official Information</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="p-4">
                                                <h4 class="text-black">Email</h4>
                                                <span>paper_user@panel.com</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="p-4">
                                                <h4 class="text-black">Phone Number</h4>
                                                <span>0092-333-456734</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="p-4">
                                                <h4 class="text-black">Address</h4>
                                                <span>7C Street, Main Market New York City</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="p5 b-b">
                                    <div class="pl-4 mt-4">
                                        <h5>Personal Information</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="p-4">
                                                <h4 class="text-black">Facebook</h4>
                                                <span>Facebook.com/paper-panel</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="p-4">
                                                <h4 class="text-black">Phone Number</h4>
                                                <span>0092-333-456734</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="p5">
                                    <div class="pl-4 mt-4">
                                        <h5>Tags</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="p-4 no-b-child">
                                                <div class="bootstrap-tagsinput bootstrap-tagsinput-max"><span class="tag badge s-12 p-2 grey darken-1 lighten-1">Amsterdam<span data-role="remove"></span></span> <span class="tag badge s-12 p-2 grey darken-1 lighten-1">Washington<span data-role="remove"></span></span> <span class="tag badge s-12 p-2 grey darken-1 lighten-1">Sydney<span data-role="remove"></span></span> <input type="text" placeholder=""></div><input type="text" class="tags-input" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-options="{
   &quot;tagClass&quot;:   &quot;badge s-12 p-2 grey darken-1 lighten-1&quot;,
   &quot;maxTags&quot;: 3


   }" style="display: none;">
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="b-t">
                                    <div class="card-header white">
                                        <h6>New Followers <span class="badge badge-success r-3">30+</span></h6>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-inline mt-3">
                                            <li class="list-inline-item ">
                                                <img src="../../includes/template/assets/img/dummy/u13.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u12.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u11.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u10.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u9.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u8.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item ">
                                                <img src="../../includes/template/assets/img/dummy/u7.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u6.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u5.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u4.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u3.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                            <li class="list-inline-item">
                                                <img src="../../includes/template/assets/img/dummy/u2.png" alt="" class="img-responsive w-40px circle mb-3">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="b-t">
                            <div class="card-header white">
                                <h6>Activity <span class="badge badge-success r-3">30+</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- The time line -->
                                        <ul class="timeline">
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                                <span class="badge badge-danger r-3">
                                                    10 Feb. 2014
                                                </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="ion r-20 icon-envelope"></i>
                                                <div class="timeline-item card">
                                                    <div class="card-header white"><a href="#">Support Team</a> sent you an email <span class="time float-right"><i class="ion r-20 icon-clock-o"></i> 12:05</span></div>
                                                    <div class="card-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="card-footer">
                                                        <a class="btn btn-primary btn-xs">Read more</a>
                                                        <a class="btn btn-danger btn-xs">Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="ion r-20 icon-user"></i>

                                                <div class="timeline-item  card">

                                                    <div class="card-header white">
                                                        <h6><a href="#">Sarah Young</a> accepted your friend request<span class="float-right"><i class="ion r-20 icon-clock-o"></i> 5 mins ago</span></h6>
                                                    </div>


                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="ion r-20 icon-comments"></i>

                                                <div class="timeline-item  card">


                                                    <div class="card-header white">
                                                        <h6><a href="#">Jay White</a> commented on your post <span class="float-right"><i class="ion r-20 icon-clock-o"></i> 27 mins ago</span></h6>
                                                    </div>

                                                    <div class="card-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="card-footer">
                                                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                                <span class="badge badge-success r-3">
                                                    3 Jan. 2014
                                                </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="ion r-20 icon-camera indigo"></i>

                                                <div class="timeline-item  card">

                                                    <div class="card-header white"><a href="#">Mina Lee</a> uploaded new photos<span class="time float-right"><i class="ion r-20 icon-clock-o"></i> 2 days ago</span></div>


                                                    <div class="card-body">
                                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->

                                            <li>
                                                <i class="ion r-20 icon-clock-o bg-gray"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
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