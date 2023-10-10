<?php session_start();

if (isset($_SESSION['path_documentos_registro'])) {
    $path_registro = $_SESSION['path_documentos_registro'];
}


require_once('PDFMerger/function_merge.php');


if (isset($_POST['arrarquivos'])) {
    $strarquivos = $_POST['arrarquivos'];
    $array_arquivos = explode(",", $strarquivos);

    foreach($array_arquivos as $arq) {
        if(strpos($arq, " [1]") !== false){
            $nome_original = $arq;
            $nome1 = explode(" [1]", $arq);
            $nome_documento = $nome1[0] . ".pdf";
        }
    } 


    if (merge_pdf_cadastrante($array_arquivos, $nome_documento) == 1) {
        echo 'sucesso';
        
        foreach($array_arquivos as $arq) {
            unlink($arq);
        }
        rename($nome_documento, $nome_original);
    }
    
    else {
        json_encode($array_arquivos);
    }


    
   
}

