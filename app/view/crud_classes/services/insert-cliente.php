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


// CRIA O ARRAY
$formData = array();

$formData[] = $tipopessoa = 'Cliente';
$formData[] = $nome = legal_input($_POST['nome_novo_cliente']);
$formData[] = $fantasia = legal_input($_POST['fantasia_novo_cliente']);
$formData[] = $endereco = $_POST['endereco_novo_cliente'];
$formData[] = $numero = $_POST['numero_novo_cliente'];
$formData[] = $complemento = $_POST['complemento_novo_cliente'];
$formData[] = $bairro = $_POST['bairro_novo_cliente'];
$formData[] = $cep = $_POST['cep_novo_cliente'];
$formData[] = $cidade = $_POST['cidade_novo_cliente'];
$formData[] = $uf = $_POST['uf_novo_cliente'];
$formData[] = $contatos = $_POST['contatos_novo_cliente'];
$formData[] = $telefone = legal_input($_POST['telefone_novo_cliente']);
$formData[] = $fax = $_POST['fax_novo_cliente'];
$formData[] = $celular = $_POST['celular_novo_cliente'];
$formData[] = $email = legal_input($_POST['email_novo_cliente2']);
$formData[] = $website = $_POST['website_novo_cliente'];

$cnpj_cliente = $_POST['cnpj_novo_cliente'];
$cpf_cliente = $_POST['cpf_novo_cliente'];
if($cnpj_cliente != '') {
    $formData[] = $cnpjcpf = $cnpj_cliente;
}
if($cpf_cliente != '') {
    $formData[] = $cnpjcpf = $cpf_cliente;
}

$formData[] = $idrg = $_POST['idrg_novo_cliente'];
$formData[] = $situacao = $_POST['optradio_novo_cliente'];
$formData[] = $obs = $_POST['obs_novo_cliente'];
$formData[] = $emailnfe = $_POST['emailnfe_novo_cliente'];
$formData[] = $login = $_SESSION['vendedor'];


//echo "<script>alert('$formData');</script>";

$registro = $_POST['registro_novo_cliente'];

$resposta = $ClienteDAO->insertCliente($formData); 
if ($resposta != "") {
    //Registra o Log
    $acao = "O usuário $login cadastrou o cliente $nome. Id: $resposta";
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


// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


?>

