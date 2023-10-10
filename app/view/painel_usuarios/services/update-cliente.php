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

$formData['id'] = $id = $_POST['id_cliente_edit'];
$formData['registro'] = $registro = legal_input($_POST['registro_cliente']);
$formData['username'] = $username = legal_input($_POST['username_usuario']);

//$formData['password'] = $password = password_hash(legal_input($_POST['username_password']), PASSWORD_BCRYPT);

$formData['tipopessoa'] = $tipopessoa = legal_input($_POST['tipo_usuario_cliente']);
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

$formData['vendedor'] = $login_user = $cliente_vendedor = $_SESSION['name'];

if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'Gerente') {
    if (isset($_POST['vendedorName'])){
        $formData['vendedor'] = $cliente_vendedor = $_POST['vendedorName']; 
    }else{
        $formData['vendedor'] = $cliente_vendedor = $_POST['vendedor_cliente'];
    }
}
else {
    $formData['vendedor'] = $cliente_vendedor = $_SESSION['name'];//$_POST['vendedor_cliente'];
}

$formData['user_image'] = $user_image = legal_input($_POST['user_image']);


// echo "<script>alert('". print_r($formData) . "');</script>"; 


//print_r($formData);

$resposta = $ClienteDAO->updateCliente($formData); 


$origem = 'Painel de Usuários';
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

