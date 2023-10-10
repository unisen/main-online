<?php session_start();

// CRIA UM ARRAY COM BASE NOS TIPOS DE DOCUMENTOS
require_once '../config/database/conexao.php';

$sql_tipos = "SELECT * FROM `tipos_documentos`";
$res = mysqli_query($con, $sql_tipos);
$tiposArr = mysqli_fetch_all($res, MYSQLI_ASSOC);

$tipos_documentos = array();


for($x=0; $x < count($tiposArr); $x++) {

    $tipos_documentos[$x]['documento']=$tiposArr[$x]['documento'];
    $tipos_documentos[$x]['valor']=$tiposArr[$x]['numero'];
    //echo $tiposArr[$x]['documento'] . '<br>';
}

//print_r($tiposArr[1]['documento']);
//print_r($tipos_documentos);

//echo count($tiposArr);

//echo $tipos_documentos[0]['documento']; // FOTO
//echo $tipos_documentos[1]['documento']; // CURRICULUM VITAE




// Count total files
$countfiles = count($_FILES['documentos']['name']);

// Upload Location
$nome_cadastrante = $_SESSION['nome_cadastrante'];

$upload_location = $_SESSION['diretorio'] . $_SESSION['pasta_cadastrante'];

$docs_ids = $_POST["docs_ids"];
$counts_per_doc = $_POST["total_files"];

//echo $upload_location . "<br>";
//echo $countfiles . "<br>";

// CRIA UM ARRAY COM OS NOMES CERTO
$arrNomes = array();
for ($y = 0; $y < count($counts_per_doc); $y++) {
    $qtd_arquivos = $counts_per_doc[$y];
    
    //echo $y . ' - ' . $qtd_arquivos;
    $arrNomes[$y]['qdt'] = $qtd_arquivos;
    $arrNomes[$y]['doc'] = $tiposArr[$y]['documento'];
}

$arrDocumentos = array();
foreach ($arrNomes as $key => $value) {
    $doc = $arrNomes[$key]['doc'];
    $qtd = $arrNomes[$key]['qdt'];

    $j = 1;
    $nDoc = "";
    for($c = 0; $c < $qtd; $c++) {        
        $nDoc = $doc . " [$j].";        
        $j++;
        array_push($arrDocumentos,$nDoc);
    }
    //echo "key: $key - nome: $doc - qdt: $qtd";
}


// To store uploaded files path
$files_arr = array();



// Loop all files
for($index = 0;$index < $countfiles;$index++){

    $arquivo = $filename = $_FILES['documentos']['name'][$index];

    //echo $arquivo . '<br>';

   
    
    if ($filename) {
     //if(isset($_FILES['documentos']['name'][$index]) && $_FILES['documentos']['name'][$index] != ''){
           // File name
           //$filename = $_FILES['documentos']['name'][$index];

           // Get extension
           //$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
           //echo $ext;

           $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

           $fileArr = explode(" - ", $arquivo);
           $newName = $nome_cadastrante . ' - ' . $arrDocumentos[$index] . $ext;
       
           

           // Valid image extension
           $valid_ext = array("png","jpeg","jpg","pdf");

           // Check extension
           if(in_array($ext, $valid_ext)){

                // File path
                $path = $upload_location.$newName;

                // Upload file
                if(move_uploaded_file($_FILES['documentos']['tmp_name'][$index],$path)){
                      $files_arr[] = $path;
                }
           }
     }
}

/* 
$arrNomes = array();
for ($y = 0; $y < count($counts_per_doc); $y++) {
    $qtd_arquivos = $counts_per_doc[$y];
    
    //echo $y . ' - ' . $qtd_arquivos;
    $arrNomes[$y]['qdt'] = $qtd_arquivos;
    $arrNomes[$y]['doc'] = $tiposArr[$y]['documento'];
}

$arrDocumentos = array();
foreach ($arrNomes as $key => $value) {
    $doc = $arrNomes[$key]['doc'];
    $qtd = $arrNomes[$key]['qdt'];

    $j = 1;
    $nDoc = "";
    for($c = 0; $c < $qtd; $c++) {        
        $nDoc = $doc . " [$j].";        
        $j++;
        array_push($arrDocumentos,$nDoc);
    }
    //echo "key: $key - nome: $doc - qdt: $qtd";
} */

//echo json_encode($counts_per_doc);
//print_r($arrNomes);
//echo count($arrNomes);
//echo json_encode(count($arrNomes));
//echo json_encode($files_arr);

echo json_encode($arrDocumentos);
die;
