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
                                    Dados da Empresa <span class="s-14">Configurações dos Dados da Empresa no Sistema.</span>
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
                                    <form id="form_validation" action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <div class="form-group m-0">
                                                    <label for="nome_empresa" class="col-form-label s-12">Nome da Empresa</label>
                                                    <input name="nome_empresa" class="form-control r-0 light s-12 " type="text" value="<?php echo $empresa_configs->nome_empresa; ?>">
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-6 m-0">
                                                        <label for="cnpj" class="col-form-label s-12">CNPJ</label>
                                                        <input name="cnpj" class="form-control r-0 light s-12" type="text" value="<?php echo $empresa_configs->cnpj; ?>">
                                                    </div>
                                                    <div class="form-group col-6 m-0">
                                                        <label for="inscricao_estadual" class="col-form-label s-12">Inscrição Estadual</label>
                                                        <input name="inscricao_estadual" class="form-control r-0 light s-12" type="text" value="<?php echo $empresa_configs->inscricao_estadual; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-12 m-0">
                                                        <label for="endereco" class="col-form-label s-12">Endereço</label>
                                                        <input name="endereco" class="form-control r-0 light s-12" type="text" value="<?php echo $empresa_configs->endereco; ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3 offset-md-1">

                                                <input hidden="" id="logo_path" name="logo_path" value="<?php echo $empresa_configs->logo_path; ?>">

                                                <input hidden="" id="file" name="logo" value="<?php echo $empresa_configs->logo_file; ?>">
                                                <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="fileUpload">
                                                    <div class="dz-default dz-message">
                                                        <span>Arraste o arquivo da Logo</span>
                                                        <div>Ou Clique para abrir o navegador de arquivos.</div>
                                                    </div>
                                                </div>
                                                <!--   <br>
                                                <input type="file" id="i_file" value="">
                                                <img src="" width="200" id="img_logo" style="display:none;" />
                                                <br>
                                                <div id="disp_tmp_path"></div> -->

                                            </div>
                                        </div>

                                        <div class="row clearfix">

                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Cidade</label>
                                                        <input type="text" class="form-control r-0 light s-12" name="cidade" value="<?php echo $empresa_configs->cidade; ?>">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-2">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Estado</label>
                                                        <input type="text" class="form-control r-0 light s-12" name="estado" value="<?php echo $empresa_configs->estado; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Cep</label>
                                                        <input type="text" class="form-control r-0 light s-12" name="cep" value="<?php echo $empresa_configs->cep; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Email da Empresa</label>
                                                        <input type="email" class="form-control r-0 light s-12" name="email_empresa" value="<?php echo $empresa_configs->email_empresa; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Email Associados</label>
                                                        <input type="email" class="form-control r-0 light s-12" name="email_empresa_associados" value="<?php echo $empresa_configs->email_empresa_associados; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Telefone</label>
                                                <input type="text" class="form-control r-0 light s-12" name="telefone_empresa" value="<?php echo $empresa_configs->telefone_empresa; ?>">

                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Celular</label>
                                                <input type="text" class="form-control r-0 light s-12" name="celular_empresa" value="<?php echo $empresa_configs->celular_empresa; ?>">

                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Website</label>
                                                <input type="text" class="form-control r-0 light s-12" name="website_empresa" value="<?php echo $empresa_configs->website_empresa; ?>">

                                            </div>
                                        </div>

                                        <div>
                                            <div>
                                                <p class="salvar-error"><?php echo @$error; ?></p>
                                                <p class="salvar-success"><?php echo @$success; ?></p>
                                            </div>
                                        </div>
                                        <button onclick="salvar_dados()" class="btn btn-success btn-lg toast-action waves-effect" type="submit" name="submit" data-title="Arquivo Salvo" data-message="<?php echo @$success; ?>" data-type="success" data-position-class="toast-top-right">SALVAR</button>
                                        <button type="button" class="btn btn-primary" onclick="recarregarAPagina()">Atualizar!</button>
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
                                        <td class="campo-empresa">logo</td>
                                        <td>
                                            <?php
                                            if (isset($empresa_configs->logo_path)) {

                                                $path_logo_img =  $unisen_url . $empresa_configs->logo_path;
                                                echo "<img src='$path_logo_img' width='50' /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                echo $empresa_configs->logo_path;
                                            }
                                            ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Nome da Empresa</td>
                                        <td>
                                            <?php if (isset($empresa_configs->nome_empresa)) echo $empresa_configs->nome_empresa; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">CNPJ</td>
                                        <td>
                                            <?php if (isset($empresa_configs->cnpj)) echo $empresa_configs->cnpj; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">IE</td>
                                        <td>
                                            <?php if (isset($empresa_configs->inscricao_estadual)) echo $empresa_configs->inscricao_estadual; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Endereço</td>
                                        <td>
                                            <?php if (isset($empresa_configs->endereco)) echo $empresa_configs->endereco; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Cidade</td>
                                        <td>
                                            <?php if (isset($empresa_configs->cidade)) echo $empresa_configs->cidade; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Estado</td>
                                        <td>
                                            <?php if (isset($empresa_configs->estado)) echo $empresa_configs->estado; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">CEP</td>
                                        <td>
                                            <?php if (isset($empresa_configs->cep)) echo $empresa_configs->cep; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Email Empresa</td>
                                        <td>
                                            <?php if (isset($empresa_configs->email_empresa)) echo $empresa_configs->email_empresa; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Email Associados</td>
                                        <td>
                                            <?php if (isset($empresa_configs->email_empresa_associados)) echo $empresa_configs->email_empresa_associados; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Telefone</td>
                                        <td>
                                            <?php if (isset($empresa_configs->telefone_empresa)) echo $empresa_configs->telefone_empresa; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Celular</td>
                                        <td>
                                            <?php if (isset($empresa_configs->celular_empresa)) echo $empresa_configs->celular_empresa; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="campo-empresa">Website</td>
                                        <td>
                                            <?php if (isset($empresa_configs->website_empresa)) echo $empresa_configs->website_empresa; ?>
                                        </td>
                                    </tr>


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

        <script>
            document.getElementById('logo').onchange = function() {
                alert('Selected file: ' + this.value);
            };
        </script>

        <script>
            function salvar_dados() {
                var logo = document.querySelector("#fileUpload > div.dz-preview.dz-complete.dz-success.dz-image-preview > div.dz-image > img");
                var path = logo.getAttribute('alt');
                document.getElementById('logo_path').value = path;
            }

            function recarregarAPagina() {
                window.location.reload();
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

        <!-- <script src="js/script.js" async defer></script> -->
</body>

</html>