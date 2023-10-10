<?php session_start();

require_once '../config/database/conexao.php';


$nome_cadastrante = $_SESSION['nome_cadastrante'];
$path = $_SESSION['diretorio'] . $_SESSION['pasta_cadastrante']; //"uploads/"; // Upload directory

$total_count = 0;
$total_docs = 0;
$docs_ids = $_POST["docs_ids"];
$counts_per_doc = $_POST["total_files"];
$total_counts_per_doc = count($counts_per_doc);

echo "Counts docs_ids: ";
print_r($docs_ids);

echo "<hr>Counts per docs: ";
print_r($counts_per_doc);

echo "<hr>";

$count = 1;


$num_of_docs = count($_FILES["documentos"]["name"]);
echo "<br>Num of Docs: $num_of_docs <br>";

$allDocs = $_FILES["documentos"]["name"];

$i = 0;
while ($i < $num_of_docs) {

    $y = $i + 1;
    echo "$y - ";
    echo "Doc: $allDocs[$i] - key: $docs_ids[$i]";
    //echo $docs_ids[$i];

    $i++;
    echo '<hr>';
}

//print_r($_FILES["documentos"]["name"]);


foreach ($docs_ids as $key => $value) {

    $query = "SELECT * FROM `tipos_documentos` WHERE `id` = '$value'";

    $rs = mysqli_query($con, $query);
    $row = mysqli_fetch_row($rs);
    $tipo_documento = $row[2];


    $nfiles = $counts_per_doc[$key];
    echo "<br>key: $key - nfiles: $nfiles";

    /* $nkey = $key + $nfiles;

    echo $nkey; */

    

    if ($nfiles > 1) {
        
        $xc = 0;
        
        for ($x = 0; $x < $nfiles; $x++) {

            $arquivo = basename($allDocs[$key + $x]);
            $fileArr = explode(".", $arquivo);
            $xc = $x + 1;

            $filename = $path . $nome_cadastrante . ' - ' . $tipo_documento . " [$xc]." . $fileArr[1];

            $filesize = $_FILES['documentos']['size'][$key+$x];
            if ($filesize > 0) {
                if (move_uploaded_file($_FILES['documentos']["tmp_name"][$key+$x], $filename)) {
                    $count++;
                } else {
                    echo "Erro1: count($count) $key - $filename<br>";
                }
                //$query2 = "INSERT INTO `variants_photos_queue` (variants_queue_id,filename,size) VALUES ('$value','$filename','$filesize')";
                //$rs2 = mysql_query($query2,$con);
            }
        }
        
    }
    else {
        
        $arquivo = basename($_FILES["documentos"]["name"][$key]);
        $fileArr = explode(".", $arquivo);
        $filename = $path . $nome_cadastrante . ' - ' . $tipo_documento . ' [1].' . $fileArr[1];

        $filesize = $_FILES['documentos']['size'][$key];
        if ($filesize > 0) {
            if (move_uploaded_file($_FILES['documentos']["tmp_name"][$key], $filename)) {
                $count++;
            } else {
                echo "Erro2: count($count) $key - $filename<br>";
            }
            //$query2 = "INSERT INTO `variants_photos_queue` (variants_queue_id,filename,size) VALUES ('$value','$filename','$filesize')";
            //$rs2 = mysql_query($query2,$con);
        }
    }
    //echo "count: $count - $filename <br>";
    //$filename = $path . basename($_FILES["photos"]["name"][$key]);
}
