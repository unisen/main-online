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

            <!-- Main Content -->
            <div class="page has-sidebar-left height-full">
                <header class="blue accent-3 relative nav-sticky">
                    <div class="container-fluid text-white">
                        <div class="row">
                            <div class="col">
                                <h4>
                                    <i class="icon-package"></i>
                                    Contacts
                                </h4>
                            </div>
                        </div>
                        <div class="row ">
                            <ul class="nav responsive-tab">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="icon icon-list"></i>All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="icon icon-trash-can"></i>Trash</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <div class="container-fluid p-0">
                    <div class="card b-0">
                        <div class="row no-gutters">
                            <div class="col-md-3 d-none d-md-block text-truncate white b-r ">
                                <div class="sticky slimScroll">
                                    <div class="card-header white ">
                                        <form>
                                            <div class="form-group has-right-icon m-0">
                                                <input class="form-control light r-30" placeholder="Search" type="text">
                                                <i class="icon-search"></i>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body pt-0 light">
                                        <ul class="list-unstyled">
                                            <!-- Alphabet with number of contacts -->
                                            <li class="pt-3 pb-3 light sticky">
                                                <span class="badge r-3 badge-success">A</span>
                                            </li>
                                            <!-- Single contact -->
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u1.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u6.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u6.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li class="pt-3 pb-3 light sticky">
                                                <span class="badge r-3 badge-danger">B</span>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u2.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u3.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u4.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <!-- Alphabet with number of contacts -->
                                            <li class="pt-3 pb-3 light sticky">
                                                <span class="badge r-3 badge-success gradient">C</span>
                                            </li>

                                            <!-- Single contact -->
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u1.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u6.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u6.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="my-4">
                                                <span class="badge r-3 badge-danger purple">D</span>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u2.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u3.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="my-1">
                                                <div class="card no-b p-3">
                                                    <div class="">
                                                        <div class="float-right">
                                                            <a href="#" class="btn-fab btn-fab-sm btn-primary r-5">
                                                                <i class="icon-mail-envelope-closed2 p-0"></i>
                                                            </a>
                                                            <a href="#" class="btn-fab btn-fab-sm btn-success r-5">
                                                                <i class="icon-star p-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="image mr-3  float-left">
                                                            <img class="w-40px"
                                                                src="../../includes/template/assets/img/dummy/u4.png"
                                                                alt="User Image">
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>Alexander Pierce</strong>
                                                            </div>
                                                            <small> alexander@paper.com</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9 col-sm-12 light">

                                <div class="card m-3 r-0 b-0 shadow">
                                    <div class="card-header white">
                                        <h4>Add New Contact</h4>Add New Contact details
                                    </div>
                                    <div class="card-body">
                                        <div class="stepper sw-main sw-theme-circles" data-options='{
                                     "useURLhash":true,
                                     "theme":"sw-theme-circles",
                                     "transitionEffect":"fade"
                                     }'>

                                            <ul class="nav step-anchor">
                                                <li><a href="#step-1y">Personal</a></li>
                                                <li><a href="#step-2y">Educational</a></li>
                                                <li><a href="#step-3y">Experience</a></li>
                                                <li><a href="#step-4y">Avatar</a></li>
                                            </ul>
                                            <div>
                                                <div id="step-1y" class="card-body p-5">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputEmail4"
                                                                    class="col-form-label">Email</label>
                                                                <input class="form-control form-control-lg"
                                                                    id="inputEmail4" placeholder="Email User Email"
                                                                    type="email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="name" class="col-form-label">Name</label>
                                                                <input class="form-control form-control-lg" id="name"
                                                                    placeholder="Enter User Name" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddress"
                                                                class="col-form-label">Address</label>
                                                            <input class="form-control form-control-lg"
                                                                id="inputAddress" placeholder="1234 Main St"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddress2" class="col-form-label">Address
                                                                2</label>
                                                            <input class="form-control form-control-lg"
                                                                id="inputAddress2"
                                                                placeholder="Apartment, studio, or floor" type="text">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="inputCity"
                                                                    class="col-form-label">City</label>
                                                                <input class="form-control form-control-lg"
                                                                    id="inputCity" type="text">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="inputState"
                                                                    class="col-form-label">State</label>
                                                                <select id="inputState"
                                                                    class="form-control form-control-lg">
                                                                    <option value="1">Value1</option>
                                                                    <option value="1">Value2</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="inputZip" class="col-form-label">Zip</label>
                                                                <input class="form-control form-control-lg"
                                                                    id="inputZip" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    Check me out
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Contact</button>
                                                    </form>
                                                </div>
                                                <div id="step-2y" class="card-body text-center p-5">
                                                    <h3 class="my-3">
                                                        Step 2
                                                    </h3>
                                                    <a href="#step-3y" class="btn btn-primary mb-3 btn-lg">Go To Next
                                                        Step</a>
                                                </div>
                                                <div id="step-3y" class="card-body text-center p-5">
                                                    <h3 class="my-3">
                                                        Step 3
                                                    </h3>
                                                    <a href="#step-4y" class="btn btn-primary mb-3 btn-lg">Go To Next
                                                        Step</a>
                                                </div>
                                                <div id="step-4y" class="card-body text-center p-5">
                                                    <h3 class="my-3">
                                                        Step 4
                                                    </h3>
                                                    <a href="#step-1y" class="btn btn-primary mb-3 btn-lg">Go To Next
                                                        Step</a>
                                                </div>
                                            </div>
                                        </div>

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