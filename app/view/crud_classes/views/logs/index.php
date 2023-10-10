<?php

require_once '../../config/database.php';
require_once '../../controllers/LogsDAO.php';

$LogDAO = new LogsDAO();

//INSERT LOGS
$user = 'Rafael Fernandes';
$pedido = '8010';
$cliente = '1312';
$vendedor = '221'; //Diego Fernandes
$data_da_venda = '2021-04-30';

$acao = "O usuário $user, Atualizou os Dados do Cliente no Pedido: $pedido - Cliente: $cliente Vendedor: $vendedor Data da Venda: $data_da_venda";

 $dados = array();
 $dados[] = $acao;
 $dados[] = $user; //VENDEDOR OU USUARIO QUE EDITOU O PEDIDO 
//$LogDAO->insertLog($dados); 



//UPDATE LogS
  $updateData = array();
  $updateData['id_log'] = '1649';
  $updateData['acao'] = 'BUCEeeeeeTA';
  $updateData['vendedor'] = 'EU';


 //$resp = $LogDAO->updateLog($updateData); 
$resp = 'nada';

// DELETE Log
 $parameters = array(
  'id' => 1649,
);  

//$resp = $LogDAO->deleteLog($parameters);
/* try
{
    $resp = $LogDAO->deleteLog($parameters);}
catch (PDOException $i)
{
    //se houver exceção, exibe
    die("Erro: <code>" . $i->getMessage() . "</code>");
} */

/* try {
    $LogDAO->deleteLog($parameters);
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
 */

/* 
try {
    $e = $LogDAO->deleteLog($parameters);
}
catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
} */
// Execução continua

/* if(is_array($LogDAO->deleteLog($parameters))) {

}  */



//SELECIONA OS DADOS
$params = "ORDER BY id_log DESC";
$itens = $LogDAO->selectLog($params);

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
    require_once '../../controller/Logs-controller.php';
  

	$dCtrl  = new LogsController($conn);
	$itens = $dCtrl->index(); */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Classe Logs</title>
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
    <h1>RESPOSTAS</h1>
    <div class="card">
    
    echo:  <? echo $resp; ?>
    <hr>
    echo print_r:  <? echo print_r( $resp ); ?>
    <hr>
    echo gettype:  <? echo gettype($resp); ?>
    <hr>
    $id:  <? $id = $resp; if (isset($id)) {  echo " isset"; } ?>
    <hr>
    print_r:  <? print_r ($resp); ?>
    <hr>
    <br><br>
    <hr>
    <? $id = $resp;
     if ($id == 0)
      {  
          echo "não atualizou"; 
      } 
      else {
          echo "atualizou. $id linhas";
      }
      ?>
    </div>
	<div class="" style="padding:5px;">
		<div class="row">
			<div class="table-responsive">
            <table id="Logs" class="table table-bordered hover compact nowrap" style="padding:15px;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Ação</th>                                    
                                    <th>Usuário Logado</th>
                                    <th>Data da Criação</th>                                   
                                </tr>
                            </thead>
                    <tbody>
					<?php 
						foreach($itens as $row) : ?>
							<tr>                            
                            <td><?php echo $row->id_log; ?></td>                              
                            <td><?php echo $row->acao; ?> </td>
                            <td><?php echo $row->vendedor; ?> </td>
                            
                            <td><?php echo date( 'd/m/Y', strtotime($row->dt_criacao)); ?> </td>                                                           
							</tr>
						<?php endforeach; ?>	
					</tbody>
                    <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Ação</th>                                    
                                    <th>Usuário Logado</th>
                                    <th>Data da Criação</th>                                   
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
            $('#Logs').DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [[ 0, 'desc' ]],
            });
          
        });
    </script>

</body>
</html>

