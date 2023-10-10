<?php session_start();


if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}


function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


//echo $confirmacao;

if (isset($_POST)) {
    //print_r($_POST);

    $id_user = $_POST['id_associado'];
    $cpf_user = $_POST['cpf_user_cadastrante'];
    $conta_corrente = $_POST['conta_corrente'];
    $agencia_banco = $_POST['agencia_banco'];
    $nome_banco = $_POST['nome_banco'];
    $tipo_chave = $_POST['tipo_chave'];
    $chave_pix = $_POST['chave_pix'];

    
    require_once '../../config/database/conexao.php';

    if (!isset($_SESSION['existe_banco']) OR $_SESSION['existe_banco'] != '1') {
        $sql = "INSERT INTO `tbl_dados_bancarios`(`id`, `id_user`, `cpf_user`, `conta_corrente`, `agencia`, `banco`, `tipo_chave`, `chave_pix`) VALUES (DEFAULT, '" . $id_user . "','" . $cpf_user . "','" . $conta_corrente . "','" . $agencia_banco . "','" . $nome_banco . "', '" . $tipo_chave . "','" . $chave_pix . "')";
    }
    else {
        $sql = "UPDATE `tbl_dados_bancarios` SET `conta_corrente` = '$conta_corrente', `agencia` = '$agencia_banco', `banco` = '$nome_banco', `tipo_chave` = '$tipo_chave', `chave_pix` = '$chave_pix' WHERE id_user='$id_user'";
    }


    //echo $sql;
    $resposta = mysqli_query($con, $sql);

    if ($resposta) {
        echo "sucesso";
    } else {
        echo "erro";
        //echo $resposta;
        //print_r($_POST);
    }
}
