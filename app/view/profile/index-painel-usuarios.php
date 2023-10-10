<!DOCTYPE html>
<html lang="pt-BR">

    <?php
    session_start();

    if (isset($_SESSION["url_aplicativo"])) {
        $unisen_url = $_SESSION["url_aplicativo"];
    }

    $path =  $_SERVER['DOCUMENT_ROOT'];
    $path .= $unisen_url . 'app/config/functions/autenticaUsuario.php';
    include_once($path);

    $path =  $_SERVER['DOCUMENT_ROOT'];
    $path .= $unisen_url . 'app/includes/UI/header.php';
    include_once($path);

    //CLASSE CLIENTE - PDO CRUD MYSQL
    require_once './config/database.php';
    require_once './controllers/ClienteDAO.php';
    ?>

<!-- DataTables -->
<link rel="stylesheet" href="../../includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


<link rel="stylesheet" href="css/unisen_styles.css">

<link rel="stylesheet" href="css/content_styles.css">

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

    <?php

    $path = dirname(__FILE__);
    $path .= '/modalEditarCliente.php';
    include_once($path);

    $path = dirname(__FILE__);
    $path .= '/modalNovoCliente.php';
    include_once($path);

    $ClienteDAO = new ClienteDAO();

    if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'Vendedor') {
        $sql_sem_clientes = "SELECT count(*) as total FROM tbl_users
            WHERE vendedor = '" . $_SESSION['vendedor'] . "' OR vendedor = 'Qualquer Vendedor'";
        $result = mysqli_query($conexao, $sql_sem_clientes);
        $count_clientes = mysqli_fetch_assoc($result);

        if ($count_clientes['total'] > 0) {
            $params = "AND vendedor = '" . $_SESSION['vendedor'] . "' OR vendedor = 'Qualquer Vendedor'";
            $clientes = $ClienteDAO->selectCliente($params);;
        } else {
            $clientes = array();
        }
    } else {

        $clientes = $ClienteDAO->selectCliente();
    }

    //$clientes = $ClienteDAO->selectCliente();
    //echo print_r($clientes);
    ?>

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
                    <!-- CORPO DA PAGINA -->
                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <h2>Cadastro de Clientes</h2>
                                <div class="card-tools">
                                    <p id='msg'></p>
                                    <button title='Adicionar Novo Cliente' type='button' class='btn btn-success copiar' id="abreform_novocliente" onclick="openNav2();">
                                        <i class='fa fa-user-plus'></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="" style="padding:5px;">
                            <div class="row">
                                <div class="table-responsive" id="container-clientes" style="overflow:hidden;">
                                    <table id="tbl_clientes" class="table table-bordered hover compact nowrap" style="padding:15px;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Nome</th>
                                                <th>Tipo Usuário</th>
                                                <th>Registro</th>


                                                <th>Fantasia</th>

                                                <th>Email</th>
                                                <th>Telefone</th>
                                                <th>CNPJ/CPF</th>
                                                <th>ID/RG</th>
                                                <th>Ação</th>

                                                <th>Endereço</th>

                                                <th>N°</th>
                                                <th>Bairro</th>
                                                <th>Compl.</th>
                                                <th>Cidade</th>
                                                <th>UF</th>

                                                <th>CEP</th>
                                                <th>Situação</th>
                                                <th>Contatos</th>
                                                <th>Celular</th>
                                                <th>Fax</th>

                                                <th>Website</th>
                                                <th>Obs</th>
                                                <th>Email/Nfe</th>
                                                <th>Vendedor</th>
                                                <th>Foto</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($clientes as $row) : ?>
                                                <tr role="row" class="even dpedido" data-id="<?php echo $row->id; ?>">
                                                    <td><?php echo $row->id; ?></td>
                                                    <td class="dpedidoitem"><?php echo $row->username; ?></td>
                                                    <td class="dpedidoitem"><?php echo $row->password; ?></td>
                                                    <td class="dpedidoitem"><?php echo $row->nome; ?> </td>
                                                    <td class="dpedidoitem"><?php echo $row->tipopessoa; ?></td>
                                                    <td class="dpedidoitem"><?php echo date('d/m/Y', strtotime($row->registro)); ?> </td>
                                                    <td class="dpedidoitem"><?php echo $row->fantasia; ?> </td>
                                                    <td class="dpedidoitem"><?php echo $row->email; ?> </td>
                                                    <td class="dpedidoitem"><?php echo $row->telefone; ?> </td>

                                                    <td class="dpedidoitem"><?php echo $row->cnpjcpf; ?> </td>
                                                    <td class="dpedidoitem"><?php echo $row->idrg; ?> </td>
                                                    <td>
                                                        <!--    <button title='Editar' type='button' class='btn btn-warning copiar'
                                                data-toggle='modal' data-target='#edit_cliente'>
                                                <i class='fas fa-edit'></i></button> -->
                                                        <button title="Excluir" type="button" id="btnExcluir" class="btn btn-danger" data-toggle="modal" data-target="#deleteCliente" style="border-radius: 50px; padding:4px 8px 4px 8px;">
                                                            <i class="fa fa-trash-o" style="font-weight:500"></i></button>
                                                    </td>


                                                    <td class="dpedidoitem"><?php echo $row->endereco; ?> </td>
                                                    <td class="dpedidoitem"><?php echo $row->numero; ?> </td>
                                                    <td><?php echo $row->bairro; ?> </td>

                                                    <td><?php echo $row->complemento; ?> </td>
                                                    <td><?php echo $row->cidade; ?> </td>
                                                    <td><?php echo $row->estado; ?> </td>
                                                    <td><?php echo $row->cep; ?> </td>
                                                    <td><?php echo $row->situacao; ?> </td>

                                                    <td><?php echo $row->contatos; ?> </td>
                                                    <td><?php echo $row->celular; ?> </td>
                                                    <td><?php echo $row->fax; ?> </td>
                                                    <td><?php echo $row->website; ?> </td>
                                                    <td><?php echo $row->obs; ?> </td>

                                                    <td><?php echo $row->emailnfe; ?> </td>
                                                    <td><?php echo $row->vendedor; ?> </td>

                                                    <td><?php echo $row->user_image; ?> </td>

                                                    <?php

                                                    $_SESSION["user_nickname"] = $row->username;
                                                    $_SESSION["user_password"] = $row->password;
                                                    ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Nome</th>
                                                <th>Tipo Usuário</th>
                                                <th>Registro</th>
                                                <th>Fantasia</th>
                                                <th>Email</th>
                                                <th>Telefone</th>
                                                <th>CNPJ/CPF</th>
                                                <th>ID/RG</th>
                                                <th>Ação</th>
                                                <th>Endereço</th>
                                                <th>N°</th>
                                                <th>Bairro</th>
                                                <th>Compl.</th>
                                                <th>Cidade</th>
                                                <th>UF</th>
                                                <th>CEP</th>
                                                <th>Situação</th>
                                                <th>Contatos</th>
                                                <th>Celular</th>
                                                <th>Fax</th>
                                                <th>Website</th>
                                                <th>Obs</th>
                                                <th>Email/Nfe</th>
                                                <th>Vendedor</th>
                                                <th>Foto</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>

            </div>
            <!-- Right Sidebar -->

            <?php
            $path =  $_SERVER['DOCUMENT_ROOT'];
            $path .= $unisen_url . 'app/includes/UI/sidebar-right.php';
            include_once($path);

            $path = dirname(__FILE__);
            $path .= '/modalDeleteCliente.php';
            include_once($path);
            ?>

            <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
            <div class="control-sidebar-bg shadow white fixed"></div>
        </div>
        <!--/#app -->
        <script src="../../includes/template/assets/js/app.js"></script>


        <!--Page Specific Scripts & Styles-->
<!--         <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example-with-json-button').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        text: 'JSON',
                        action: function(e, dt, button, config) {
                            var data = dt.buttons.exportData();

                            $.fn.dataTable.fileSave(
                                new Blob([JSON.stringify(data)]),
                                'Export.json'
                            );
                        }
                    }]
                });
            });
        </script> -->
         
         <!-- jQuery -->
         <script src="../../includes/plugins/jquery/jquery.min.js"></script>

        <!--Swit Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script src="js/tble_click_clientes.js"></script>
        <script src="js/ajax-script-cliente.js"></script>
        <script src="js/jquery-maskmoney.js"></script>
        <script src="js/jquery.mask.min.js"></script>

        <!-- DataTables -->
        <script src="../../includes/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!--     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"> -->
        </script>

        <script>
            // FORMATACAO MASCARA DOS CAMPOS EM FORMULARIOS
            $(document).ready(function() {
                $('.cpf').mask('000.000.000-00');
                $('.cnpj').mask('00.000.000/0000-00');
                $('.time').mask('00:00:00');
                $('.date_time').mask('99/99/9999 00:00:00');
                $('.cep').mask('99.999-999');
                $('.phone').mask('+99 (99) 9999-9999');
                $('.phone_with_ddd').mask('(99) 9999-9999');
                $('.all_phones').mask('(99) 09999-9999');
                $('.phone_us').mask('(999) 999-9999');
                $('.mixed').mask('AAA 000-S0S');
                /* $('.comissao-perc').mask('000.00'); */

                $('#cep_cliente').keypress(function() {
                    txtBoxFormat(this.form, this.name, '99.999-999', this)
                });
            });
        </script>


        <script>
            // FUNCOES QUE ABREM E FECHAM OFF-CANVAS EDITAR CLIENTE    
            function openNav() {
                if (screen.availWidth <= 768) {
                    document.getElementById("mySidenav").style.width = "100%";
                    document.getElementById("mySidenav").style.border = "0";
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

                } else if (screen.availWidth < 1200) {
                    var sidebar = document.getElementById("menu-lateral-app").offsetWidth;
                    document.getElementById("mySidenav").style.width = screen.availWidth - sidebar + "px";
                    //document.getElementById("fechaform_cliente").style.display = "block";
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                } else {
                    document.getElementById("mySidenav").style.width = "50%";
                    // document.getElementById("fechaform_cliente").style.display = "block";
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

                    document.getElementById("overlay_forms").style.width = "100%";
                    //document.getElementById("overlay_forms").style.padding = "23%";
                    document.getElementById("overlay_forms").style.display = "block";
                    document.getElementById("overlay_forms").style.opacity = "0.85";

                }
                document.getElementById("app").style.marginRight = "0px";
                // document.getElementById("abreform_cliente").style.display = "none";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("app").style.marginRight = "0";
                document.body.style.backgroundColor = "white";
                //document.getElementById("abreform_cliente").style.display = "block";
                //document.getElementById("fechaform_cliente").style.display = "none";
                if (screen.availWidth > 1200) {
                    document.getElementById("overlay_forms").style.display = "none";
                }
            }

            /* var modal = document.getElementById('main');
            modal.addEventListener('click', function(e) {
              if (e.target == this) closeNav();
            }); */
        </script>

        <script>
            $(document).ready(function() {
                $('#tbl_clientes').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "order": [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                            width: "5%",
                            responsivePriority: 1,
                            targets: [0, 3]
                        },
                        {
                            width: '20%',
                            responsivePriority: 2,
                            targets: 3
                        },
                        {
                            responsivePriority: 3,
                            targets: 7
                        },
                        {
                            responsivePriority: 4,
                            targets: 4
                        }

                    ]
                })

            });
        </script>


        <script>
            $(document).ready(function() {
                var table = $('#tbl_clientes').DataTable();

                //ajusta as colunas
                $('#container-clientes').css('display', 'block');
                table.columns.adjust().draw();

                $('#tbl_clientes tbody').on('click', 'tr td.dpedidoitem', function() {

                    var data = table.row(this).data();
                    openNav();
                    //var url = "editar_pedido.php?numero=" + data[1];
                    //window.location.replace(url);
                });

                $(".even, .odd").on("click", function() {
                    var id = $(this).data("data-id");
                    // alert(id); 
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