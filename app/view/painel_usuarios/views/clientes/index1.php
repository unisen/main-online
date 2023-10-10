<?php 
require_once '../../config/database.php';
require_once '../../controllers/ClienteDAO.php';

$ClienteDAO = new ClienteDAO();
$itens = $ClienteDAO->selectCliente();
?>
<!DOCTYPE html>
<html>

<?php


 include "../../../../config/database/conexao.php"; //Conexão 

$path = dirname(__FILE__);
$path .= '/../../../../config/functions/autenticaUsuario.php';
include_once($path);

$path = dirname(__FILE__);
$path .= '/../../../../includes/UI/header.php';
include_once($path);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


<!-- Font Awesome -->
<link rel="stylesheet" href="../../../../includes/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../../../../includes/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="../../../../includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../../../includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" href="css/editar_pedido.css">


<body class="sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper" style="display: contents;">
        <!-- Navbar -->
        <?php
    $path = dirname(__FILE__);
    $path .= '/../../../../includes/UI/navbar.php';
    include_once($path);
   
    $path = dirname(__FILE__);
    $path .= '/../../../../includes/UI/sidebar.php';
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
         //OFF CANVAS EDITAR CLIENTE
      /*    $path = dirname(__FILE__);
         $path .= '/modalEditarCliente.php';
         include_once($path);  

          //OFF CANVAS ADICIONAR NOVO CLIENTE
          $path = dirname(__FILE__);
          $path .= '/modalNovoCliente.php';
          include_once($path);  */
        ?>    

        <!-- CORPO DA PAGINA -->   
 
            <section class="content">

                <div class="" style="padding:5px;">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="clientes" class="display responsive hover compact nowrap"
                                style="padding:15px;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Ação</th>
                                        <th>Registro</th>
                                        <th>Nome</th>
                                        <th>Fantasia</th>

                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>CNPJ/CPF</th>
                                        <th>ID/RG</th>
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
						foreach($itens as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td>
                                            <button title='Editar' type='button' class='btn btn-warning copiar'
                                                data-toggle='modal' data-target='#edit_cliente'>
                                                <i class='fas fa-edit'></i></button>
                                            <button title='Excluir' type='button' class='btn btn-danger'
                                                data-toggle='modal' data-target='#delete'>
                                                <i class='fas fa-trash-alt'></i></button>
                                        </td>


                                        <td><?php echo date( 'd/m/Y', strtotime($row->registro)); ?> </td>
                                        <td><?php echo $row->nome; ?> </td>
                                        <td><?php echo $row->fantasia; ?> </td>
                                        <td><?php echo $row->email; ?> </td>
                                        <td><?php echo $row->telefone; ?> </td>

                                        <td><?php echo $row->cnpjcpf; ?> </td>
                                        <td><?php echo $row->idrg; ?> </td>
                                        <td><?php echo $row->endereco; ?> </td>
                                        <td><?php echo $row->numero; ?> </td>
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Registro</th>
                                        <th>Nome</th>
                                        <th>Fantasia</th>
                                        <th>Email</th>
                                        <th>Telefone</th>

                                        <th>CNPJ/CPF</th>
                                        <th>ID/RG</th>
                                        <th>Endereço</th>
                                        <th>N°</th>
                                        <th>Bairro</th>

                                        <th>Compl.</th>
                                        <th>Cidade</th>
                                        <th>UF</th>
                                        <th>CEP</th>
                                        <th>Situação</th>

                                        <th>Ação</th>


                                        <th>Contatos</th>
                                        <th>Celular</th>
                                        <th>Fax</th>
                                        <th>Website</th>
                                        <th>Obs</th>
                                        <th>Email/Nfe</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <!-- DataTables -->
                <script src="../../../../includes/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="../../../../includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="../../../../includes/plugins/datatables-responsive/js/dataTables.responsive.min.js">
                </script>
                <script src="../../../../includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
                </script>

                <script type="text/javascript" charset="utf8"
                    src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

       


            </section>
         

        </div>
        <!-- /.content-wrapper -->
        <?php
            $path = dirname(__FILE__);
            $path .= '/../../../../includes/UI/footer.php';
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
    <script src="../../../../includes/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../../includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../includes/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../../includes/dist/js/demo.js"></script>
    <!--Swit Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>

    $(document).ready(function() {
        $('#clientes').DataTable({
            "responsive": true,
            "autoWidth": false
        });

    });
    </script>
</body>

</html>