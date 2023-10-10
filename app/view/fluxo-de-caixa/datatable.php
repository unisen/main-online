<?php
   // Database Connection
   include 'conexao.php';

   // Reading value
   $draw = $_POST['draw'];
   $row = $_POST['start'];
   $rowperpage = $_POST['length']; // Rows display per page
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $searchValue = $_POST['search']['value']; // Search value

   $searchArray = array();

   // Search
   $searchQuery = " ";
   if($searchValue != ''){
      $searchQuery = " AND (id LIKE :id OR mes LIKE :mes OR tipo LIKE :tipo OR nf_cpf LIKE :nf_cpf OR cliente_fornecedor LIKE :cliente_fornecedor OR ccusto LIKE :ccusto OR pcontas LIKE :pcontas OR banco LIKE :banco OR vencimento LIKE :vencimento OR data_pgto LIKE :data_pgto OR valor_titulo LIKE :valor_titulo OR valor_pago LIKE :valor_pago OR detalhe LIKE :detalhe) ";
      $searchArray = array( 
         'id'=>"%$searchValue%",
         'mes'=>"%$searchValue%",
         'tipo'=>"%$searchValue%",
         'nf_cpf'=>"%$searchValue%",
         'cliente_fornecedor'=>"%$searchValue%",
         'ccusto'=>"%$searchValue%",
         'pcontas'=>"%$searchValue%",
         'banco'=>"%$searchValue%",
         'vencimento'=>"%$searchValue%",
         'data_pgto'=>"%$searchValue%",
         'valor_titulo'=>"%$searchValue%",
         'valor_pago'=>"%$searchValue%",
         'detalhe'=>"%$searchValue%"
      );
   }

   // Total number of records without filtering
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM fluxo_de_caixa ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];

   // Total number of records with filtering
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM fluxo_de_caixa WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];

   // Fetch records
   $stmt = $conn->prepare("SELECT * FROM fluxo_de_caixa WHERE 1 $searchQuery ORDER BY $columnName $columnSortOrder LIMIT :limit,:offset");

   // Bind values
   foreach ($searchArray as $key=>$search) {
      $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
   }

   $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
   $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
   $stmt->execute();
   $empRecords = $stmt->fetchAll();

   $data = array();

   foreach ($empRecords as $row) {
      $data[] = array(
         "id"=>$row['id'],
         "mes"=>$row['mes'],
         "tipo"=>$row['tipo'],
         "nf_cpf"=>$row['nf_cpf'],
         "cliente_fornecedor"=>$row['cliente_fornecedor'],
         "ccusto"=>$row['ccusto'],
         "pcontas"=>$row['pcontas'],
         "banco"=>$row['banco'],
         "vencimento"=>$row['vencimento'],
         "data_pgto"=>$row['data_pgto'],
         "valor_titulo"=>$row['valor_titulo'],
         "valor_pago"=>$row['valor_pago'],
         "detalhe"=>$row['detalhe']
      );
   }

   // Response
   $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
   );

   echo json_encode($response);