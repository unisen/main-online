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
/* 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["salvar"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
} */

//print_r( $_FILES["fileToUpload"] );

// FILE TO UPLOAD
/* 
// File upload folder 
$uploadDir = 'uploads/';

// Allowed file types 
$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

//print_r($_POST['imageToUpload']);

// If form is submitted 
if (isset($_POST['imageToUpload'])) {


    // Check whether submitted data is not empty 

    $uploadStatus = 1;

    // Upload file 
    $uploadedFile = '';
    if (!empty($_FILES["imageToUpload"]["name"])) {
        // File path config 
        $fileName = basename($_FILES["imageToUpload"]["name"]);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats to upload 
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server 
            if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $targetFilePath)) {
                $uploadedFile = $fileName;
                $uploadStatus = 1;
                $response['message'] = 'Form data submitted successfully!';
            } else {
                $uploadStatus = 0;
                $response['message'] = 'Sorry, there was an error uploading your file.';
            }
        } else {
            $uploadStatus = 0;
            $response['message'] = 'Sorry, only ' . implode('/', $allowTypes) . ' files are allowed to upload.';
        }
    }

    $response['status'] = $uploadStatus;

}
$_SESSION["response"] = $response; */


// CRIA O ARRAY
$formData = array();

$formData['id'] = $id = $_POST['id_cliente_edit'];
$formData['registro'] = $registro = legal_input($_POST['registro_cliente']);
$formData['username'] = $username = legal_input($_POST['username_usuario']);
$formData['password'] = $password = password_hash(legal_input($_POST['username_password']), PASSWORD_BCRYPT);
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

