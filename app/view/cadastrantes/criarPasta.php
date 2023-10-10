<?php 
    session_start();

    $diretorio = $_SESSION['diretorio'];

    if (isset($_POST['crmsocio'])) {
        $pasta_cadastrante = $_POST['crmsocio'];
    }
    
    $path = "./$diretorio/".$pasta_cadastrante."/";

/*     if (!is_dir($path)) {
        mkdir($path,0777,true);
        echo json_encode('sucesso');
    }
    else {
        echo json_encode('erro');
    } */

    
    if (is_dir($path)) {
        //echo "Pasta Existe!";
        echo json_encode('erro');
    }
    else {
        mkdir($path,0777,true);
        //echo "Pasta Criada!";
        echo json_encode('sucesso');
    }
?>