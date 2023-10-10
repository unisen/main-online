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

$formData['id'] = $id = $_POST['id_cliente_edit'];
$formData['registro'] = $registro = legal_input($_POST['registro_cliente']);

/* $formData['username'] = $registro = legal_input($_POST['username_usuario']);
$formData['password'] = $registro = legal_input($_POST['username_password']); */

$formData['nome'] = $nome = legal_input($_POST['nome_cliente']);
$formData['fantasia'] = $fantasia = legal_input($_POST['fantasia_cliente']);
$formData['endereco'] = $endereco = legal_input($_POST['endereco_cliente']);
$formData['numero'] = $numero = legal_input($_POST['numero_cliente']);
$formData['complemento'] = $complemento = legal_input($_POST['complemento_cliente']);
$formData['bairro'] = $bairro = legal_input($_POST['bairro_cliente']);
$formData['cep'] = $cep = legal_input($_POST['cep_cliente']);
$formData['cidade'] = $cidade = legal_input($_POST['cidade_cliente']);
$formData['estado'] = $uf = legal_input($_POST['uf_cliente']);
$formData['contatos'] = $contatos = legal_input($_POST['contatos_cliente']);
$formData['telefone'] = $telefone = legal_input($_POST['telefone_cliente']);
$formData['fax'] = $fax = legal_input($_POST['fax_cliente']);
$formData['celular'] = $celular = legal_input($_POST['celular_cliente']);
$formData['email'] = $email = legal_input($_POST['email_cliente']);
$formData['website'] = $website = legal_input($_POST['website_cliente']);

$cnpj_cliente = legal_input($_POST['cnpj_cliente']);
$cpf_cliente = legal_input($_POST['cpf_cliente']);

if($cnpj_cliente != '') {
    $formData['cnpjcpf'] = $cnpjcpf = $cnpj_cliente;
}
if($cpf_cliente != '') {
    $formData['cnpjcpf'] = $cnpjcpf = $cpf_cliente;
}

$formData['idrg'] = $idrg = legal_input($_POST['idrg_cliente']);
$formData['situacao'] = $situacao = legal_input($_POST['optradio_cliente']);
$formData['obs'] = $obs = legal_input($_POST['obs_cliente']);
$formData['emailnfe'] = $emailnfe = legal_input($_POST['emailnfe_cliente']);

//VARIAVEL QUE VAI PEGAR O ATUAL VENDEDOR APOS MODIFICADO NÃO MOSTRARÁ MAIS SE NÃO FOR GERENTE, PARA VENDEDOR COMUM MOSTRARÁ APENAS OS SEU CLIENTES

if ($_SESSION['funcao'] == 'Gerente') {
    if (isset($_POST['vendedorName'])){
        $formData['vendedor'] = $cliente_vendedor = $_POST['vendedorName']; 
    }else{
        $formData['vendedor'] = $cliente_vendedor = $_POST['vendedor_cliente'];
    }
}
else {
    $formData['vendedor'] = $cliente_vendedor = $_POST['vendedor_cliente'];
}


// echo "<script>alert('". print_r($formData) . "');</script>"; 


$login_user = $_SESSION['vendedor'];



$resposta = $ClienteDAO->updateCliente($formData); 
if (is_null($resposta)) {
     //Registra o Log
     $acao = "O usuário $login_user atualizou o cliente $nome Id: $id - Vendedor Responsável: $cliente_vendedor";
     $logData = array();
     $logData[] = $acao;
     $logData[] = $login_user;
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

