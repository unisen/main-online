<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/* require_once '../config/database.php';
require_once '../controllers/ClienteDAO.php';
require_once '../controllers/LogsDAO.php'; */

//CLASSE CLIENTE LOGSDAO - PDO CRUD MYSQL 
// - PATH SISTEMA - ATUALIZADO
require_once '../../../DAO/config/database.php';
require_once '../../../DAO/controllers/LogsDAO.php';
require_once '../../../DAO/controllers/ClienteDAO.php';


$ClienteDAO = new ClienteDAO();
$LogDAO = new LogsDAO();

session_start();

// CRIA O ARRAY
$formData = array();

$formData['id'] = $id = $_POST['id_cliente_changepass'];

$formData['password'] = $password = password_hash(legal_input($_POST['senha']), PASSWORD_BCRYPT);

// echo "<script>alert('". print_r($formData) . "');</script>"; 
$nome = legal_input($_POST['nome_cliente_password']);

//print_r($formData);

$resposta = $ClienteDAO->updatePasswordCliente($formData); 


$origem = 'Painel de Usuários - Senha Alterada';
$tabela = 'tbl_users';
$login_user = $_SESSION['name'];
$username = $_SESSION['username'];
$ip_usuario = $_SERVER['REMOTE_ADDR'];

if (is_null($resposta)) {
     //Registra o Log
     $acao = "Update em Id: $id - $nome";
   
     $logData = array();
     $logData[] = $acao;
     $logData[] = $origem;
     $logData[] = $tabela;
     $logData[] = $login_user;
     $logData[] = $username;
     $logData[] = $ip_usuario;
     $LogDAO->insertLog($logData);
    echo "sucesso";
}
else {
    echo "erro";
    echo $resposta;
}


// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


?>

