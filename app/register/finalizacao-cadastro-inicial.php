<?php session_start();
if (!isset($_SESSION['loggedin_cad']) && $_SESSION['loggedin_cad'] !== false) {
    session_destroy();
    header('location: login.php');
    exit;
}

require_once '../libs/farquivos.php';

$listagem_documentos = listar_documentos($myfolder_files);

//print_r($listagem_documentos);


$listaDocOriginal = array();

foreach ($listagem_documentos as $itemDoc) {
    $docSplit = explode(" - ", $itemDoc);
    $nomeDoc = $docSplit[1];
    $nomeDocOrign = explode(" [", $nomeDoc);

    //echo $nomeDocOrign[0] . "<br>";
    array_push($listaDocOriginal, $nomeDocOrign[0]);
}

//echo "<hr>";

require_once '../config/database/conexao.php';

$sql_tipos_docs = "SELECT * FROM tipos_documentos";
$tipos_documentos = mysqli_query($con, $sql_tipos_docs);

$contaDocs = 0;

$ArquivosPendentes = "nao";

echo "<div class='table-responsive' id='container-documentos' style='display: block;'>";
echo "<table id='dataListaDocs' class='display' style='width:100%'><thead><tr><th>Tipo de Documento</th><th>Nº</th></tr></thead><tbody>";

while ($row = mysqli_fetch_array($tipos_documentos, MYSQLI_ASSOC)) :
    $id_doc = $row['id'];
    $nome_doc = $row['documento'];

    foreach ($listaDocOriginal as $docOrign) {
        if ($docOrign == $nome_doc) {
            $contaDocs++;
        }
    }


    if ($contaDocs == 0) {
        $ArquivosPendentes = "sim";
        echo "<tr><td><span style='color:red;'>$nome_doc</span></td><td>$contaDocs</td></tr>";
    } else {
        echo "<tr><td><span style='color:green;'>$nome_doc</span></td><td>$contaDocs</td></tr>";
    }

    $contaDocs = 0;


endwhile;
$con->close();

echo "</tbody></table></div>";


if ($ArquivosPendentes != "sim") {
    echo "<hr><p>Tudo Ok</p>";
} else {
    echo "<hr><p>Faltam Arquivos</p>";
}


?>
<script>
    $(document).ready(function() {

        var table = $('#dataListaDocs').DataTable({
            "responsive": true,
            "autoWidth": false,
            info: false,
            ordering: false,
            paging: false,
            "search": false
        });

        //ajusta as colunas
        $('#container-documentos').css('display', 'block');
        table.columns.adjust().draw();
    });
</script>