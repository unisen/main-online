<?php

require_once '../../config/database.php';
require_once '../../controllers/ClienteDAO.php';

$ClienteDAO = new ClienteDAO();

//INSERT DADOS
//categoria, descricao, unidade, preco, situacao, preco_custo, tipo_produto, condicao, frete, unidade_medida
 $dados = array(
  'Cliente', //DESCRICAO
  'Diego',
  'M2',
  '20.00',
  'Ativo',
  '20.00',
  'Terceiro',
  'Boa',
  'Sim',
  'Centímetro',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  ''
);
//$ClienteDAO->insertCliente($dados); 

//UPDATE CLIENTES
  $parameters = array(
    'id' => 1524,
    'nome' => 'BUCETA',
    'fantasia' => '',
    'endereco' => '',
    'numero' => '0',
    'complemento' => '',
    'bairro' => '0',
    'cep' => '',
    'cidade' => '',
    'estado' => '',
    'contatos' => '',
    'telefone' => '564564',
    'fax' => '',
    'celular' => '',
    'email' => '0',
    'website' => '',
    'cnpjcpf' => '0',
    'idrg' => '',
    'situacao' => '',
    'obs' => '',
    'emailnfe' => '',
    'vendedor' => ''   
  );

 //$ClienteDAO->updateCliente($parameters); 


// DELETE CLIENTE
 $parameters = array(
  'id' => 1524,
);  
//$ClienteDAO->deleteCliente($parameters); 


//SELECIONA OS DADOS
$itens = $ClienteDAO->selectCliente();

/* foreach($itens as $row) :
  echo '<hr>';
  echo $row->id.'<br>';
  echo $row->registro.'<br>';
  echo $row->nome.'<br>';
  echo $row->fantasia.'<br>';
  echo $row->email.'<br>';
  echo $row->telefone.'<br>';
  echo $row->cnpjcpf.'<br>';
  
endforeach; */

/* 	require_once '../../config/db-config.php'; 
	
	$db = new DBController();
	$conn = $db->connect();
    require_once '../../controller/clientes-controller.php';
  

	$dCtrl  = new ClientesController($conn);
	$itens = $dCtrl->index(); */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Classe Clientes</title>
	<!-- Bootstrap 4 CSS  -->
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

</head>
<body>
	<div class="" style="padding:5px;">
		<div class="row">
			<div class="table-responsive">
            <table id="clientes" class="table table-bordered hover compact nowrap" style="padding:15px;">
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
                                        <button title='Editar' type='button' class='btn btn-warning copiar' data-toggle='modal' data-target='#edit_cliente'>
                                            <i class='fas fa-edit'></i></button>
                                        <button title='Excluir' type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete'>
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
    <script src="../../../../includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../../includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    // apply datatable in the HTML table
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

