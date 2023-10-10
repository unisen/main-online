<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/* require_once '../config/database.php';
require_once '../controllers/ClienteDAO.php';
require_once '../controllers/LogsDAO.php'; */

require_once '../../../DAO/config/database.php';
require_once '../../../DAO/controllers/LogsDAO.php';
require_once '../../../DAO/controllers/ClienteDAO.php';

$ClienteDAO = new ClienteDAO();



//login autenticado
$login = $_SESSION['vendedor'];

//Recebe Valor
$id = $_POST['id_delete_cliente'];
$nome_cliente = $_POST['nome_delete_cliente'];

$parameters = array(
    'id' => $id,
  );  



$origem = 'Painel de Usuarios';
$tabela = 'tbl_users';
$login_user = $_SESSION['name'];
$username = $_SESSION['username'];
$ip_usuario = $_SERVER['REMOTE_ADDR'];

$resposta = $ClienteDAO->deleteCliente($parameters); 

if ($resposta == 1) {

    $LogsDAO = new LogsDAO();

    //Registra o Log
    $acao = "Deletou Id: $id - Nome: $nome_cliente - Tabela: $tabela";

    $logData = array();
    $logData[] = $acao;
    $logData[] = $origem;
    $logData[] = $tabela;
    $logData[] = $login_user;
    $logData[] = $username;
    $logData[] = $ip_usuario;

    $LogsDAO->insertLog($logData);
    
    echo "sucesso";
}
    

else {
    echo "erro";
    echo $resposta;
}

