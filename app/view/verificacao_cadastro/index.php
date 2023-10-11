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

require_once "../../crud/script/pdocrud.php";


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
                                    Cadastrantes <span class="s-14">Em Verificação</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-fluid my-3">
                    <input type="hidden" name="rolagem_tela" id="rolagem_tela" value="0">
                    <!-- <p>You are the boss make something great.</p> -->
                    <?php
                    $pdocrud = new PDOCrud();
                    //$pdocrud->formDisplayInPopup("Adicionar","Dados do Cadastrante", true);
                    //echo $pdocrud->dbTable("tbl_cadastrantes")->render("insertform");
                    
                    // PURE BOOTSTRAP
                    //$pdocrud = new PDOCrud(false, "pure", "pure");   
                    
                    $pdocrud->tableHeading("Pré Cadastro de Associados");

                    $pdocrud->dbOrderBy("ID desc");
                    $pdocrud->buttonHide($buttonname="cancel");
                    $pdocrud->setSettings("addbtn", true);
                    $pdocrud->setSettings("savebtn", false);

                    // Remove campo do formulario
                    //$pdocrud->formRemoveFields($fields = array("0", "nome_mae", "nome_pai"));

                    //add data for radio button
                    //$pdocrud->fieldTypes("SEXO", "radio");//change gender to radio button
                    //$pdocrud->fieldDataBinding("SEXO", array("masculino","feminino"), "", "","array");
                        
                    //change state to select dropdown
                    $pdocrud->fieldTypes("SEXO", "select");
                    //add data using array in select dropdown
                    $pdocrud->fieldDataBinding("SEXO", array("masculino" => "masculino", "feminino" => "feminino"), "", "","array");


                    $pdocrud->fieldTypes("DATA DE NASCIMENTO", "date");
                    
                    // call this function to show forms in popup
                    // $pdocrud->formDisplayInPopup();

                    //make firstname upper case
                    $pdocrud->tableColFormatting("NOME COMPLETO", "string",array("type" =>"uppercase"));

                    //$pdocrud->enqueueBtnTopActions("Adicionar", "Dados do Cadastrante", "#adicionar", array(), "addbtn");

                    echo $pdocrud->dbTable("tbl_cadastrantes")->render();

                    //$pdocrud->formDisplayInPopup("Adicionar","Dados do Cadastrante", true);
                    //$pdocrud->dbTable("tbl_cadastrantes")->render("insertform");

                    //$pdocrud->formDisplayInPopup("Atualizar","Dados do Cadastrante", true);
                    //echo $pdocrud->dbTable("tbl_cadastrantes")->render("EDITFORM");

                    //$pdocrud->dbTable("tbl_cadastrantes")->render("insertform");
                    //$pdocrud->dbTable("tbl_cadastrantes")->render("editform");
                    
                    /* $pdocrud->addCallback("after_update", "afterUpdateCallBack"); 
                    $pdocrud->addCallback("before_update", "beforeUpdateCallBack"); */
                    
                     // ADD BUTTON TO REGISTER A NEW SOCIO                   
                    //$pdocrud->formDisplayInPopup("Adicionar","Dados do Cadastrante", true);
                    //echo $pdocrud->dbTable("tbl_cadastrantes")->render("insertform");

                    ?>
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
            // When the user scrolls to the top of the page, slide up the navbar (50px out of the top view)
            //window.onscroll = function() {autoScroll()};

            function autoScroll() {

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });


            }

            $(document).ready(function() {

                $('.pdocrud-table tbody').on('click', 'tr td.pdocrud-row-cols', function() {

                    var rolagem = $("#rolagem_tela").val();

                    if (rolagem == "0") {
                        $("#rolagem_tela").val("1");
                        //autoScroll();
                        var rolagem2 = $("#rolagem_tela").val()

                        //$( "i.icon-pages" ).scrollTo(0);
                        
                        //alert(rolagem2);
                    }
                    //var data = table.row(this).data();
                    //var url = "editar_pedido.php?numero=" + data[1];
                    //window.location.replace(url);
                });

                /* $(".even, .odd").on("click", function() {
                    var id = $(this).data("data-id");
                    // alert(id); 
                }); */


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