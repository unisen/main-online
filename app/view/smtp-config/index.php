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
include_once($path);
 */
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

                <header class="my-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <h1 class="s-24">
                                    <i class="icon-pages"></i>
                                    SMTP <span class="s-14">Configurações Gerais do Mailer no Sistema.</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </header>

                <?php require_once './libs/script.php';  ?>

                <div class="container-fluid my-3">
                    <div class="d-flex row">
                        <div class="col-md-7">
                            <!-- Basic Validation -->
                            <div class="card mb-3 shadow no-b r-0">
                                <div class="card-header white">
                                    <h6><b>Configurações</b></h6>
                                </div>
                                <div class="card-body">
                                    <form id="form_validation" action="" method="POST">

                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="smtpdebug"
                                                            value="<?php echo $smtp_configs->smtpdebug; ?>">
                                                        <label class="form-label">SMTPDebug</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="charset"
                                                            value="<?php echo $smtp_configs->charset; ?>">
                                                        <label class="form-label">CharSet</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" name="email_login"
                                                            value="<?php echo $smtp_configs->email_login; ?>">
                                                        <label class="form-label">Login Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="password_login"
                                                            value="<?php echo $smtp_configs->password_login; ?>">
                                                        <label class="form-label">Login Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="smtp_host"
                                                            value="<?php echo $smtp_configs->smtp_host; ?>">
                                                        <label class="form-label">SMTP Host</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="smtp_port"
                                                            value="<?php echo $smtp_configs->smtp_port; ?>">
                                                        <label class="form-label">SMTP Port</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="email" class="form-control" name="email_from"
                                                    value="<?php echo $smtp_configs->email_from; ?>">
                                                <label class="form-label">Email do Remetente:</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="email_name_from"
                                                    value="<?php echo $smtp_configs->email_name_from; ?>">
                                                <label class="form-label">Nome do Remetente no Email</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="subject"
                                                    value="<?php echo $smtp_configs->subject; ?>">
                                                <label class="form-label">Subject</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input class="form-control" type="text" name="body_file"
                                                    value="<?php echo $smtp_configs->body_file; ?>">
                                                <label class="form-label">Arquivo do Corpo do Email</label>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-4">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customControlValidation1" name="server_mode"
                                                <?php if (isset($smtp_configs->server_mode) && $smtp_configs->server_mode == "on") echo " checked"; ?>>
                                            <label class="custom-control-label" for="customControlValidation1">LOCALHOST
                                                SERVER</label>
                                            <div class="invalid-feedback">Example invalid feedback text</div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="headers_from"
                                                    value="<?php echo $smtp_configs->headers_from; ?>">
                                                <label class="form-label">Headers From</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="headers_cc"
                                                    value="<?php echo $smtp_configs->headers_cc; ?>">
                                                <label class="form-label">Headers Cc:</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <p class="salvar-error"><?php echo @$error; ?></p>
                                                <p class="salvar-success"><?php echo @$success; ?></p>
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-lg toast-action waves-effect" type="submit"
                                            name="salvar" data-title="Hey, Bro!"
                                            data-message="Paper Panel has toast as well." data-type="success"
                                            data-position-class="toast-bottom-left">SALVAR</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <h3>CONFIGURAÇÕES ATUAIS</h3>
                            <hr>

                            <table class="table painel-smtp-configs">
                                <tbody>
                                    <tr>
                                        <th>CAMPO</th>
                                        <th>VALOR</th>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">SMTPDebug</td>
                                        <td>
                                            <span
                                                class="badge badge-success r-3"><?php echo $smtp_configs->smtpdebug; ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">CharSet</td>
                                        <td>
                                            <?php echo $smtp_configs->charset; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Username</td>
                                        <td>
                                            <?php echo $smtp_configs->email_login; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Password</td>
                                        <td>
                                            <?php echo $smtp_configs->password_login; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Host</td>
                                        <td>
                                            <?php echo $smtp_configs->smtp_host; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Port</td>
                                        <td>
                                            <?php echo $smtp_configs->smtp_port; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Email From</td>
                                        <td>
                                            <?php echo $smtp_configs->email_from; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Email Name</td>
                                        <td>
                                            <?php echo $smtp_configs->email_name_from; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Subject</td>
                                        <td>
                                            <?php echo $smtp_configs->subject; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Body</td>
                                        <td>
                                            <?php echo $smtp_configs->body_file; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">SERVIDOR LOCAL</td>
                                        <td>
                                            <?php 
                                            if (isset($smtp_configs->server_mode) && $smtp_configs->server_mode == "on") {
                                                echo "ON";
                                            } else {
                                                echo "OFF";
                                            }
                                        ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Headers From</td>
                                        <td>
                                            <?php echo $smtp_configs->headers_from; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-smtp">Headers Cc:</td>
                                        <td>
                                            <?php echo $smtp_configs->headers_cc; ?>
                                        </td>
                                    </tr>

                                    <?php if (isset($smtp_configs->server_mode) && $smtp_configs->server_mode == "on") echo " checked"; ?>
                                </tbody>
                            </table>

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