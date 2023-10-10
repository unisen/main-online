<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../config/database.php';
require_once '../controllers/ClienteDAO.php';
require_once '../controllers/LogsDAO.php';

$ClienteDAO = new ClienteDAO();
$LogDAO = new LogsDAO();

session_start();
//login autenticado
$login = $_SESSION['vendedor'];

//Recebe Valor
$id = $_POST['id_delete_cliente'];
$nome_cliente = $_POST['nome_delete_cliente'];

$parameters = array(
    'id' => $id,
  );  

$resposta = $ClienteDAO->deleteCliente($parameters); 

if ($resposta == 1) {
    //Registra o Log
    $acao = "O usuário $login deletou o cliente $nome_cliente - Id: $id";
    $logData = array();
    $logData[] = $acao;
    $logData[] = $login;
    $LogDAO->insertLog($logData);
    echo "sucesso";
}
else {
    echo "erro";
    echo $resposta;
}

?>