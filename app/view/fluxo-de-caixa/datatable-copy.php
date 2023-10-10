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
      $searchQuery = " AND (`ID` LIKE :`ID` OR 
           `Mês` LIKE :`Mês` OR
           `Tipo` LIKE :`Tipo` OR 
           `NF/CPF` LIKE :`NF/CPF` OR
           `Cliente/Fornecedor` LIKE :`Cliente/Fornecedor` OR
           `Centro de Custo` LIKE :`Centro de Custo` OR 
           `Plano de Contas` LIKE :`Plano de Contas` OR
           `Banco` LIKE :`Banco` OR
           `Vencimento` LIKE :`Vencimento` OR
           `Data Pgto` LIKE :`Data Pgto` OR
           `Valor Titulo` LIKE :`Valor Titulo` OR
           `Valor Pago` LIKE :`Valor Pago` OR
           `Detalhe` LIKE :`Detalhe`) ";
      $searchArray = array( 
         'ID'=>"%$searchValue%",
         'Mês'=>"%$searchValue%",
         'Tipo'=>"%$searchValue%",
         'NF/CPF'=>"%$searchValue%",
         'Cliente/Fornecedor'=>"%$searchValue%",
         'Centro de Custo'=>"%$searchValue%",
         'Plano de Contas'=>"%$searchValue%",
         'Banco'=>"%$searchValue%",
         'Vencimento'=>"%$searchValue%",
         'Data Pgto'=>"%$searchValue%",
         'Valor Titulo'=>"%$searchValue%",
         'Valor Pago'=>"%$searchValue%",
         'Detalhe'=>"%$searchValue%"
      );
   }

   // Total number of records without filtering
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM cash2 ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];

   // Total number of records with filtering
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM cash2 WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];

   // Fetch records
   $stmt = $conn->prepare("SELECT * FROM cash2 WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

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
         "ID"=>$row['ID'],
         "Mês"=>$row['Mês'],
         "Tipo"=>$row['Tipo'],
         "NF/CPF"=>$row['NF/CPF'],
         "Cliente/Fornecedor"=>$row['Cliente/Fornecedor'],
         "Centro de Custo"=>$row['Centro de Custo'],
         "Plano de Contas"=>$row['Plano de Contas'],
         "Banco"=>$row['Banco'],
         "Vencimento"=>$row['Vencimento'],
         "Data Pgto"=>$row['Data Pgto'],
         "Valor Titulo"=>$row['Valor Titulo'],
         "Valor Pago"=>$row['Valor Pago'],
         "Detalhe"=>$row['Detalhe']
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