<?php session_start();

//include "config.php";
//CLASSE CLIENTE - PDO CRUD MYSQL

//Include libs private functions
require_once './libs/farquivos.php';

if (isset($_SESSION['path_documentos_registro'])) {
    $path_registro = $_SESSION['path_documentos_registro'];
}


if (isset($_POST['pastacadastro'])) {
    $pasta_cadastrante = $_POST['pastacadastro'];
    $arquivo_pdf = $_POST['nomearquivo'];

    $path_arquivo = $path_registro . $pasta_cadastrante . '/' . $arquivo_pdf;

    
    if (!removeFiles($path_arquivo)) {
        echo 'sucesso';
    }
    else {
        echo 'erro: ' . $path_arquivo;
    }
    //echo 'sucesso';
}

exit;
