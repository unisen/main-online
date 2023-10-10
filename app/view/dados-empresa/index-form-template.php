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

                <header class="my-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <h1 class="s-24">
                                    <i class="icon-pages"></i>
                                    Blank <span class="s-14">Get Started</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </header>
                
                <div class="container-fluid my-3">
                    <div class="d-flex row">
                        <div class="col-md-7">
                                <!-- Basic Validation -->
                                <div class="card mb-3 shadow no-b r-0">
                                    <div class="card-header white">
                                        <h6>BASIC VALIDATION</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="form_validation" class="form-material" method="POST" enctype="multipart/form-data">

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="smtpdebug" required>
                                                    <label class="form-label">SMTPDebug</label>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="name" required>
                                                    <label class="form-label">CharSet</label>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" name="email">
                                                    <label class="form-label">Login Email</label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="password" required>
                                                    <label class="form-label">Login Password</label>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="smtp_host">
                                                    <label class="form-label">SMTP Host</label>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="smtp_port">
                                                    <label class="form-label">SMTP Port</label>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" name="email_from">
                                                    <label class="form-label">Email From:</label>
                                                </div>
                                            </div>                                        

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="email_name_from">
                                                    <label class="form-label">Insira o nome do Remetente no Email</label>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="subject">
                                                    <label class="form-label">Subject</label>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input class="form-control inputInsert" type="file" accept=".xlsx" name="subject_file" id="fileUpload"/>                                                    
                                                    <label class="form-label">Arquivo do Corpo do Email</label>
                                                </div>
                                            </div>
                                                                              
                                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- #END# Basic Validation -->
                                <!-- Advanced Validation -->
                                <div class="card my-3 shadow no-b r-0">
                                    <div class="card-header white">
                                        <h6>ADVANCED VALIDATION</h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="form_advanced_validation" class="form-material" method="POST">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="minmaxlength" maxlength="10" minlength="3" required>
                                                    <label class="form-label">Min/Max Length</label>
                                                </div>
                                                <div class="help-info">Min. 3, Max. 10 characters</div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="minmaxvalue" min="10" max="200" required>
                                                    <label class="form-label">Min/Max Value</label>
                                                </div>
                                                <div class="help-info">Min. Value: 10, Max. Value: 200</div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="url" class="form-control" name="url" required>
                                                    <label class="form-label">Url</label>
                                                </div>
                                                <div class="help-info">Starts with http://, https://, ftp:// etc</div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="date" required>
                                                    <label class="form-label">Date</label>
                                                </div>
                                                <div class="help-info">YYYY-MM-DD format</div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="number" required>
                                                    <label class="form-label">Number</label>
                                                </div>
                                                <div class="help-info">Numbers only</div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="creditcard" pattern="[0-9]{13,16}" required>
                                                    <label class="form-label">Credit Card</label>
                                                </div>
                                                <div class="help-info">Ex: 1234-5678-9012-3456</div>
                                            </div>
                                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- #END# Advanced Validation -->
                                <!-- Validation Stats -->
                                <div class="card my-3 shadow no-b r-0">
                                    <div class="card-header white">
                                        <h6>
                                            VALIDATION STATS
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form id="form_validation_stats" class="form-material">
                                            <div class="form-group form-float">
                                                <div class="form-line focused warning">
                                                    <input type="text" class="form-control" name="warning" value="Warning" required>
                                                    <label class="form-label">Form Validation - Warning</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused error">
                                                    <input type="text" class="form-control" name="error" value="Error" required>
                                                    <label class="form-label">Form Validation - Error</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line focused success">
                                                    <input type="email" class="form-control" name="success" value="Success" required>
                                                    <label class="form-label">Form Validation - Success</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- #END# Validation Stats -->
                            </div>
                            <div class="col-md-5">
                                <h3>Documentation</h3>
                                <hr>
                                <p>These forms are using jquery validations plugin its flexible and easy to use. Please check official docs to write your own rules</p>
                                <a href="https://jqueryvalidation.org/" target="_blank"
                                class="btn btn-xs btn-primary">Plugin Docs</a>
                                <h4 class="mt-5">Related Files</h4>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Type</th>
                                        <th>File</th>
                                    </tr>
                                    <tr>
                                        <td><span class="badge badge-danger">HTML</span></td>
                                        <td>
                                            form-jquery-validations.html
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge badge-warning">JS</span></td>
                                        <td>
                                            _validations.js
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h4 class="mt-5">Code Example</h4>
                                <hr>
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