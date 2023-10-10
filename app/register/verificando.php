<?php session_start();
if (!isset($_SESSION['loggedin_cad']) && $_SESSION['loggedin_cad'] !== false) {
    session_destroy();
    header('location: login.php');
    exit;
}

    
    $tomador_nome = $_GET['$tomador_nome'];
    $confirmacao = $_GET['confirmacao'];

# descomentar para testar resposta com falha
//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500); exit();

require_once '../config/database/conexao.php';

/* $sql = "TRUNCATE teste;";

for ($i = 1; $i <= 1200; $i++) {
    $sql .= "INSERT INTO `teste` (`title`,`slug`,`text`) VALUES ('".md5($i)."','".sha1($i)."','text$i');";
} */

$sql = "SELECT * FROM tbl_cadastrantes WHERE confirmacao='$confirmacao';";


if (mysqli_multi_query($con, $sql)) {
    do {
        if ($result = mysqli_store_result($con)) {
            header($_SERVER['SERVER_PROTOCOL'], true, 200);
            exit();
        }
    } while (mysqli_next_result($con) && mysqli_more_results($con));
}
mysqli_close($con);

//header("location: cadastro.php?status=processando");