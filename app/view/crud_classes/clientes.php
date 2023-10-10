<!DOCTYPE html>
<html>

<?php

include "../../config/database/conexao.php"; //Conexão

$path = dirname(__FILE__);
$path .= '/../../config/functions/autenticaUsuario.php';
include_once($path);


$path = dirname(__FILE__);
$path .= '/../../includes/UI/header.php';
include_once($path);

//CLASSE CLIENTE - PDO CRUD MYSQL
require_once './config/database.php';
require_once './controllers/ClienteDAO.php';


?>

<!-- DataTables -->
<link rel="stylesheet" href="../../includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="css/cliente_styles.css">



<body class="sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper" style="display: contents;">
        <!-- Navbar -->
        <?php
    $path = dirname(__FILE__);
    $path .= '/../../includes/UI/navbar.php';
    include_once($path);
   
    $path = dirname(__FILE__);
    $path .= '/../../includes/UI/sidebar.php';
    include_once($path);  

   ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"></a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?php

            $path = dirname(__FILE__);
            $path .= '/modalEditarCliente.php';
            include_once($path);

            $path = dirname(__FILE__);
            $path .= '/modalNovoCliente.php';
            include_once($path);


                        
            $ClienteDAO = new ClienteDAO();

            if ($_SESSION['funcao'] == 'Vendedor') {
                $sql_sem_clientes = "SELECT count(*) as total FROM tbl_users
                WHERE vendedor = '".$_SESSION['vendedor']."' OR vendedor = 'Qualquer Vendedor'";
                $result = mysqli_query($conexao,$sql_sem_clientes);
                $count_clientes = mysqli_fetch_assoc($result);
                
                if ($count_clientes['total'] > 0){
                    $params = "AND vendedor = '".$_SESSION['vendedor']."' OR vendedor = 'Qualquer Vendedor'";
                    $clientes = $ClienteDAO->selectCliente($params);;
                }
                else {
                    $clientes = array();  
                }

            }
            else {

                $clientes = $ClienteDAO->selectCliente();
                
            }

            ?>
        <div id="main">
            <!-- CORPO DA PAGINA -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                    <h2>Cadastro de Clientes</h2>
                    <div class="card-tools">
                    <p id='msg'></p>
                    <button title='Adicionar Novo Cliente' type='button'
                                                        class='btn btn-success copiar' id="abreform_novocliente"
                                                        onclick="openNav2();">
                                                        <i class='fas fa-user-plus'></i></button>
                    </div>
                    </div>
                </div>

                <div class="" style="padding:5px;">
                    <div class="row">
                        <div class="table-responsive" id="container-clientes" style="overflow:hidden;">
                            <table id="tbl_clientes" class="table table-bordered hover compact nowrap"
                                style="padding:15px;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
						foreach($clientes as $row) : ?>
                                    <tr role="row" class="even dpedido" data-id="<?php echo $row->id; ?>">
                                        <td><?php echo $row->id; ?></td>
                                        <td class="dpedidoitem"><?php echo $row->nome; ?> </td>
                                        <td class="dpedidoitem"><?php echo date( 'd/m/Y', strtotime($row->registro)); ?> </td>                                       
                                        <td class="dpedidoitem"><?php echo $row->fantasia; ?> </td>
                                        <td class="dpedidoitem"><?php echo $row->email; ?> </td>
                                        <td class="dpedidoitem"><?php echo $row->telefone; ?> </td>

                                        <td class="dpedidoitem"><?php echo $row->cnpjcpf; ?> </td>
                                        <td class="dpedidoitem"><?php echo $row->idrg; ?> </td>
                                        <td>
                                         <!--    <button title='Editar' type='button' class='btn btn-warning copiar'
                                                data-toggle='modal' data-target='#edit_cliente'>
                                                <i class='fas fa-edit'></i></button> -->
                                            <button title='Excluir' type='button' id='btnExcluir' class='btn btn-danger'
                                                data-toggle='modal' data-target='#deleteCliente'
                                                style="border-radius: 50px; padding:4px 8px 4px 8px;">
                                                <i class='fas fa-trash-alt' style="font-weight:500"></i></button>
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>                                        
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
                                        <th>Situação</th>                                 <th>Contatos</th>
                                        <th>Celular</th>
                                        <th>Fax</th>
                                        <th>Website</th>
                                        <th>Obs</th>
                                        <th>Email/Nfe</th>
                                        <th>Vendedor</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
    </div>
</div>
        <!-- /.content-wrapper -->
        <?php


            $path = dirname(__FILE__);
            $path .= '/../../includes/UI/footer.php';
            include_once($path);

            $path = dirname(__FILE__);
            $path .= '/modalDeleteCliente.php';
            include_once($path);

         

         ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    </div>
    <!-- jQuery -->
    <script src="../../includes/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../includes/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../includes/dist/js/demo.js"></script>
   <!--  <script src="js/jquery-3.5.1.js"></script> -->

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
        document.getElementById("main").style.marginRight = "0px";
       // document.getElementById("abreform_cliente").style.display = "none";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
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
            "order": [[ 0, 'desc' ]],
            columnDefs: [{
                    width: "5%",
                    responsivePriority: 1,
                    targets: [0,2,3]
                },
                {
                    width: '80%',
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
                $('#container-clientes').css( 'display', 'block' );
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

    

</body>

</html>