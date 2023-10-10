<?php session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    session_destroy();
    header('location: ../../login/');
    exit;
}


// CRIA UM ARRAY COM BASE NOS TIPOS DE DOCUMENTOS
require_once '../../config/database/conexao.php';

$sql_tipos = "SELECT * FROM `tipos_documentos`";
$res = mysqli_query($con, $sql_tipos);
$tiposArr = mysqli_fetch_all($res, MYSQLI_ASSOC);

$tipos_documentos = array();

for ($x = 0; $x < count($tiposArr); $x++) {
    $tipos_documentos[$x]['documento'] = $tiposArr[$x]['documento'];
    $tipos_documentos[$x]['valor'] = $tiposArr[$x]['numero'];
}

// Count total files
$countfiles = count($_FILES['documentos']['name']);

// Upload Location
$nome_cadastrante = $_SESSION['nome_cadastrante'];
//$upload_location = $_SESSION['diretorio'] . $_SESSION['pasta_cadastrante'];
$upload_location = $_SESSION['upload_location'];
$docs_ids = $_POST["docs_ids"];

//echo "<script>console.log('". print_r($docs_ids) ."');</script>";
$counts_per_doc = $_POST["total_files"];
echo "<script>console.log('". print_r($counts_per_doc) ."');</script>";

// CRIA UM ARRAY COM OS NOMES CERTO
$arrNomes = array();
for ($y = 0; $y < count($counts_per_doc); $y++) {
    $qtd_arquivos = $counts_per_doc[$y];
    if ($qtd_arquivos != "") {

        $arrNomes[$y]['qdt'] = $qtd_arquivos;
        $arrNomes[$y]['doc'] = $tiposArr[$y]['documento'];
    }
}

//echo json_encode($arrNomes);

$arrDocumentos = array();
foreach ($arrNomes as $key => $value) {
    $doc = $arrNomes[$key]['doc'];
    $qtd = $arrNomes[$key]['qdt'];
    $j = 1;
    $nDoc = "";
    for ($c = 0; $c < $qtd; $c++) {
        $nDoc = $doc . " [$j].";
        $nDoc = $nome_cadastrante . " - " . $nDoc;
        $j++;
        array_push($arrDocumentos, $nDoc);
    }
}

//echo json_encode($arrDocumentos);
//echo $arrDocumentos[0];



// To store uploaded files path
$files_arr = array();

//$countfilesUpload = count($arrDocumentos);
//echo $countfilesUpload;
//print_r($_FILES['documentos']['name']);
$cx = 0;

for ($index = 0; $index < $countfiles; $index++) {

    /* if ($_FILES['documentos']['name'][$index] === "") {
        continue;
    } */
    $arquivo = $filename = $_FILES['documentos']['name'][$index];

    if (!$arquivo) {
       
        continue;
        
    }

    //echo "\n Index: $index - ". $_FILES['documentos']['name'][$index] ."\n";

    if ($filename) {

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));        

        // Test if string contains the word 
        /* if (strpos($arquivo, '-') !== false) {
            $fileArr = explode(" - ", $arquivo);
            $newName = $nome_cadastrante . ' - ' . $fileArr[1]; //$ext;
        } else {            
            $newName = $nome_cadastrante . ' - ' . $arquivo; //$ext;
        } */
        $nome_doc = $arrDocumentos[$cx];
        $newName = $nome_doc . 'pdf'; //$ext;
        
        //$newName = $nome_cadastrante . ' - ' . $nome_doc . 'pdf'; //$ext;
        $cx++;
        //echo "\n newName: $newName \n";

        // Valid image extension
        $valid_ext = array("png", "jpeg", "jpg", "pdf");

        // Check extension
        if (in_array($ext, $valid_ext)) {

            // File path
            $path = $upload_location . $newName;

            // Upload file
            if (move_uploaded_file($_FILES['documentos']['tmp_name'][$index], $path)) {
                $files_arr[] = $path;
            }
        }
    }
}


//echo json_encode($counts_per_doc);
//print_r($arrNomes);
//echo count($arrNomes);
//echo json_encode(count($arrNomes));
/* if (count($files_arr) == $countfiles) {
    echo json_encode("")
} */

//echo json_encode($files_arr);

//echo count($files_arr);
echo gettype($arrDocumentos);
print_r($arrDocumentos);
//echo json_encode($arrDocumentos);
die;
