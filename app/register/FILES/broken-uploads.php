<?php session_start();

require_once '../config/database/conexao.php';


$nome_cadastrante = 'MARIA JOAO AQUINO'; //$_SESSION['nome_cadastrante'];

$path = 'cadastrantes/'.'46327CE/'; //$_SESSION['diretorio'] . $_SESSION['pasta_cadastrante']; //"uploads/"; // Upload directory

$total_count = 0;
$total_docs = 0;
$docs_ids = $_POST["docs_ids"];
$counts_per_doc = $_POST["total_files"];

$temp_names = $_FILES["documentos"]["tmp_name"];
$files_name = $_FILES["documentos"]["name"];

$num_of_docs = count($files_name);

echo "<br>Num of Docs: $num_of_docs <br>";

$total_counts_per_doc = count($counts_per_doc);

echo "Counts docs_ids: ";
$docsids = count($docs_ids);
print_r($docs_ids);

echo "<hr>Counts per docs: ";
print_r($counts_per_doc);

echo "<hr>";

$count = 0;


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
print_r($tipos_documentos[0]);

//echo count($tiposArr);

echo $tipos_documentos[0]['documento']; // FOTO
echo $tipos_documentos[1]['documento']; // CURRICULUM VITAE


echo "<hr><hr>";

$i = 0;
$z = 0;
$y = 1;

$keys = 0;


while ($i < $num_of_docs) {

    $arquivo = basename($_FILES["documentos"]["name"][$i]);
    //echo $arquivo . '<br>';

    $fileArr = explode(".", $arquivo);

    $filename = $path . $nome_cadastrante . ' - ' . $tipos_documentos[$keys]['documento'] . " [$y]." . $fileArr[1];

    echo $filename;

    if ($counts_per_doc[$key] < $y) {
        $keys++;
        $y = 1;
    }
    else {
        $z++;
    }


    $filesize = $_FILES['documentos']['size'][$i];
    if($filesize > 0) {
        if(move_uploaded_file($_FILES['documentos']["tmp_name"][$i], $filename)) {
            $count++;
        }
        else {
            echo "Erro: count($count) $i - $filename";
        }
        //$query2 = "INSERT INTO `variants_photos_queue` (variants_queue_id,filename,size) VALUES ('$value','$filename','$filesize')";
        //$rs2 = mysql_query($query2,$con);
        $i++;
}


}